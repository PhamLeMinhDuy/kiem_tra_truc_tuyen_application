<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MicrosoftAuthController extends Controller
{
    public function microsoftOAuthLogin(Request $request)
    {
        $clientId = env('CLIENT_ID');
        $redirectUri = env('REDIRECT_URI');
        $scope = 'openid profile offline_access'; // Thêm scope 'offline_access' để nhận refresh_token

        $loginUrl = "https://login.microsoftonline.com/common/oauth2/v2.0/authorize";

        $params = [
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code', // Sử dụng 'code' cho Authorization Code Grant
            'scope' => $scope,
            'state' => Str::random(40), // Tạo state ngẫu nhiên
            'nonce' => Str::random(40), // Tạo nonce ngẫu nhiên
        ];

        // Redirect người dùng đến URL đăng nhập
        return redirect()->away($loginUrl . '?' . http_build_query($params));
    }

    public function microsoftOAuthCallback(Request $request)
    {
        if ($request->filled('code')) {
            $code = $request->input('code');
    
            // Gọi API để trao đổi code lấy access token và id token
            $tokenEndpoint = "https://login.microsoftonline.com/common/oauth2/v2.0/token";
            $tokenResponse = Http::asForm()->post($tokenEndpoint, [
                'client_id' => env('CLIENT_ID'),
                'client_secret' => env('CLIENT_SECRET'),
                'redirect_uri' => env('REDIRECT_URI'),
                'code' => $code,
                'grant_type' => 'authorization_code',
                'scope' => 'openid profile', // Scope yêu cầu cho token
            ]);
    
            if ($tokenResponse->successful()) {
                $tokens = $tokenResponse->json();
                $idToken = $tokens['id_token'];
                // Không cần lấy access_token trong trường hợp này
    
                // Giải mã id_token để lấy thông tin người dùng
                $decodedToken = base64_decode(explode('.', $idToken)[1]);
                $tokenData = json_decode($decodedToken, true);
                
                // Kiểm tra email có đúng định dạng @vanlanguni.vn không
                $userEmail = $tokenData['preferred_username'];
                $domain = '@vanlanguni.vn';
                
                if (Str::endsWith($userEmail, $domain)) {
                    // Lưu thông tin người dùng vào session
                    session(['user' => $tokenData]);
                    $userName = $tokenData['name'];
                    // Chuyển hướng đến trang chào mừng và truyền thông tin người dùng
                    return redirect()->route('handle-dang-nhap-van-lang', ['userEmail' => $userEmail]);
                } else {
                    // Quay trở lại trang đăng nhập vì email không hợp lệ
                    return redirect()->route('/')->withErrors('Only @vanlanguni.vn accounts are allowed.');
                }
            }
        }
    
        // Xử lý khi đăng nhập không thành công
        return redirect()->route('/')->withErrors('Authentication failed.');
    }


}
