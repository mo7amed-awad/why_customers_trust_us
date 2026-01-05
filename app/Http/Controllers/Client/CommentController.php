<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Modules\Ads\Entities\Model as Ad;

class CommentController extends Controller
{
    public function store(Request $request,$lang, Ad $ad)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = $ad->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return response()->json([
            'id' => $comment->id,
            'user_name' => $comment->user->name,
            'content' => $comment->content,
            'created_at_human' => $comment->created_at->locale(app()->getLocale())->diffForHumans(),
        ]);
    }
}
