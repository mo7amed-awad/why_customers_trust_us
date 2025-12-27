<?php

namespace App\Functions;

class WhatsApp
{
    public static function SendOTP($phone, $code = null)
    {
        $otp = $code ?? rand(100000, 999999);

        $lang = lang();

        $payload = [
            'APP_NAME' => env('APP_NAME'),
            'APP_LOGO' => asset('logo.png'),
            'APP_PHONE' => setting('phone'),
            'APP_EMAIL' => setting('email'),
            'APP_URL' => env('APP_URL'),
            'type' => 'otp',
            'phone' => $phone,
            'otp' => $otp,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://emcan.emwhats.com/api/en/whatsapp/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $otp;
    }

    public static function SendWhatsApp($phone, $message)
    {
        $lang = lang();

        $payload = [
            'APP_NAME' => env('APP_NAME'),
            'APP_LOGO' => asset('logo.png'),
            'APP_PHONE' => setting('phone'),
            'APP_EMAIL' => setting('email'),
            'APP_URL' => env('APP_URL'),
            'type' => 'text',
            'phone' => $phone,
            'text' => $message,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://emcan.emwhats.com/api/en/whatsapp/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public static function SendWhatsAppPdf($title, $phone, $url)
    {
        $lang = lang();

        $payload = [
            'APP_NAME' => env('APP_NAME'),
            'APP_LOGO' => asset('logo.png'),
            'APP_PHONE' => setting('phone'),
            'APP_EMAIL' => setting('email'),
            'APP_URL' => env('APP_URL'),
            'type' => 'document',
            'phone' => $phone,
            'document' => $url,
            'title' => $title,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://emcan.emwhats.com/api/en/whatsapp/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
