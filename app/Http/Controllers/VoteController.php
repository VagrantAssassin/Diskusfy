<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Toggle like (upvote) untuk sebuah balasan.
     *
     * Request mengirimkan parameter 'balasan_id'
     */
    public function toggleLike(Request $request)
    {
        // Pastikan pengguna sudah login
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Dapatkan id balasan dari request
        $balasanId = $request->input('balasan_id');

        // Cek apakah vote sudah ada untuk balasan dan user tersebut
        $vote = Vote::where('id_balasan', $balasanId)
                    ->where('uid', $user->uid)
                    ->first();

        if ($vote) {
            // Jika sudah ada, hapus vote (berarti un-like)
            $vote->delete();
            $liked = false;
        } else {
            // Jika belum ada, buat vote baru
            Vote::create([
                'id_balasan' => $balasanId,
                'uid'        => $user->uid,
                'isi_vote'   => true, // Menandakan like (true/1)
            ]);
            $liked = true;
        }

        // Hitung total like untuk balasan tersebut
        $likeCount = Vote::where('id_balasan', $balasanId)->count();

        return response()->json([
            'liked'     => $liked,
            'likeCount' => $likeCount,
        ]);
    }
}
