<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{

    public function toggleLike(Request $request)
{
    $userUid = $request->input('user_uid');
    if (!$userUid) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $balasanId = $request->input('balasan_id');

    $vote = Vote::where('id_balasan', $balasanId)
                ->where('uid', $userUid)
                ->first();

    if ($vote) {
        $vote->delete();
        $liked = false;
    } else {
        Vote::create([
            'id_balasan' => $balasanId,
            'uid'        => $userUid,
            'isi_vote'   => true,
        ]);
        $liked = true;
    }

    $likeCount = Vote::where('id_balasan', $balasanId)->count();

    return response()->json([
        'liked'     => $liked,
        'likeCount' => $likeCount,
    ]);
}

}
