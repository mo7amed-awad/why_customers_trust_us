<?php

namespace Modules\Setting\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;

class APIController extends BasicController
{
    public function GoogleAds()
    {
        return ResponseHelper::make(true);
    }

    public function support()
    {
        return ResponseHelper::make(setting('support'));
    }

    public function video()
    {
        return ResponseHelper::make(asset(setting('video')));
    }

    public function google_ads()
    {
        return ResponseHelper::make(true);
    }

    public function contact()
    {
        return ResponseHelper::make([
            'contacts' => [
                [
                    'key' => 'phone',
                    'link' => setting('phone'),
                    'icon' => asset('icons/phone.png'),
                ],
                [
                    'key' => 'email',
                    'link' => setting('email'),
                    'icon' => asset('icons/email.png'),
                ],
                [
                    'key' => 'location',
                    'link' => setting('location_'.lang()),
                    'icon' => asset('icons/location.png'),
                ],
            ],
            'social' => [
                [
                    'key' => 'facebook',
                    'link' => setting('facebook'),
                    'icon' => asset('icons/facebook.png'),
                ],
                [
                    'key' => 'instagram',
                    'link' => setting('instagram'),
                    'icon' => asset('icons/instagram.png'),
                ],
                [
                    'key' => 'tiktok',
                    'link' => setting('tiktok'),
                    'icon' => asset('icons/tiktok.png'),
                ],
                [
                    'key' => 'twitter',
                    'link' => setting('twitter'),
                    'icon' => asset('icons/twitter.png'),
                ],
                [
                    'key' => 'snapchat',
                    'link' => setting('snapchat'),
                    'icon' => asset('icons/snapchat.png'),
                ],
            ],
        ]);
    }
}
