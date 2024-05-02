<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MicrosoftAuthController extends Controller
{
    public function microsoftOAuthLogin(Request $request)
    {
        $appid = env('CLIENT_ID');
        $tennantid = env('TENANT_ID');
        $login_url = "https://login.microsoftonline.com/".$tennantid."/oauth2/v2.0/authorize";
        session_start();
        $_SESSION['state'] = session_id();
        $params = [
            'client_id' => $appid,
            'redirect_uri' => 'https://72ba-2001-ee0-5435-1780-8457-bd47-ae5f-6cba.ngrok-free.app/microsoft-oauth-callback',
            'response_type' => 'code',
            'scope' => 'https://graph.microsoft.com/User.Read https://graph.microsoft.com/Directory.ReadWrite.All',
            'state' => $_SESSION['state']
        ];
        return redirect()->away($login_url.'?'.http_build_query($params));  
    }

    public function microsoftOAuthCallback(Request $request)
    {
        if ($request->has('code')) {
            $code = $request->input('code');
            
            // Gọi API để trao đổi code lấy access token
            $response = Http::asForm()->post('https://login.microsoftonline.com/'.env('TENANT_ID').'/oauth2/v2.0/token', [
                'client_id' => env('CLIENT_ID'),
                'client_secret' => env('CLIENT_SECRET'),
                'redirect_uri' => 'https://72ba-2001-ee0-5435-1780-8457-bd47-ae5f-6cba.ngrok-free.app/microsoft-oauth-callback',
                'code' => $code,
                'grant_type' => 'authorization_code',
            ]);

            // Kiểm tra xem có kết quả hợp lệ không
            if ($response->successful()) {
                $access_token = $response->json()['access_token'];
                
                // Gọi Microsoft Graph API để lấy thông tin người dùng
                $userResponse = Http::withToken($access_token)->get('https://graph.microsoft.com/v1.0/me');

                if ($userResponse->successful()) {
                    $user = $userResponse->json();

                    // Kiểm tra email của người dùng có đúng định dạng vanlanguni.vn hay không
                    if (isset($user['mail']) && Str::endsWith($user['mail'], '@vanlanguni.vn')) {
                        // Lưu thông tin người dùng trong session
                        session(['user' => $user]);
                        $userEmail = $user['mail'];

                        // Chuyển hướng đến trang chào mừng và truyền thông tin người dùng
                        return redirect()->route('handle-dang-nhap-van-lang', ['userEmail' => $userEmail]);
                    } else {
                        // Nếu email không hợp lệ, chuyển hướng về trang microsoft-oauth
                        return redirect()->route('https://72ba-2001-ee0-5435-1780-8457-bd47-ae5f-6cba.ngrok-free.app/microsoft-oauth');
                    }
                }
            }
        }

        // Nếu không có mã từ callback hoặc xử lý không thành công, chuyển hướng về trang microsoft-oauth
        return redirect()->route('https://72ba-2001-ee0-5435-1780-8457-bd47-ae5f-6cba.ngrok-free.app/microsoft-oauth');
    }


}
