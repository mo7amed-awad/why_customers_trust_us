<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Ads\Entities\Favorite;
use Modules\Ads\Entities\Model as Ad;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        $adId = $request->ad_id;
        $user = Auth::user();

        $ad = Ad::findOrFail($adId);

        $favorite = Favorite::where('user_id', $user->id)
            ->where('ad_id', $adId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $status = 'removed';
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'ad_id' => $adId,
            ]);
            $status = 'added';
        }

        return response()->json(['status' => $status]);
    }
}
