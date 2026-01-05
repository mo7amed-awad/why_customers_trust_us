<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Ads\Entities\Like;
use Modules\Ads\Entities\Model as Ad;

class LikeController extends Controller
{
    public function toggle(Request $request)
    {
        $adId = $request->ad_id;
        $user = Auth::user();

        $ad = Ad::findOrFail($adId);

        $like = Like::where('user_id', $user->id)
            ->where('ad_id', $adId)
            ->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            Like::create([
                'user_id' => $user->id,
                'ad_id' => $adId,
            ]);
            $liked = true;
        }

        return response()->json(['liked' => $liked]); // غيّر الـ response
    }
}
