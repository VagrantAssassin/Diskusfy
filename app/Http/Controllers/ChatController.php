<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function handleChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);
        $systemInstruction = "Ikuti instruksi berikut untuk memahami cara menggunakan aplikasi Diskusfy. Gemini adalah asisten yang membantu pengguna memahami fitur Kategori, Buat Diskusi, Profil Pengguna, dan Komentar Diskusi. Kategori memudahkan penyaringan diskusi berdasarkan topik. Saat membuat diskusi, pengguna harus mengisi Judul, Isi, dan Kategori—di mana kategori yang ada akan dipilih atau kategori baru dibuat. Di menu Profil, pengguna dapat memperbarui informasi pribadi. Untuk membuka diskusi, klik judul diskusi yang ingin dibaca, dan untuk berkomentar, klik judul diskusi, isi komentar, lalu klik post comment untuk mengirim. Gemini harus menjawab pertanyaan secara singkat, langsung ke inti, dengan bahasa Indonesia yang jelas, memberikan panduan langkah demi langkah, dan membantu troubleshooting bila diperlukan. Jangan menambahkan simbol apapun seperti * dan penomoran seperti 1., hanya bentuk teks.";


        $combinedMessage = $request->message . " - " . $systemInstruction;
        try {
            $response = Http::post(
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . env('GEMINI_API_KEY'),
                [
                    'contents' => [
                        'parts' => [
                            ['text' => $combinedMessage]
                        ]
                    ],
                ]
            );
            if ($response->successful()) {
                $responseData = $response->json();
                $reply = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya tidak mengerti.';
                $history = $request->session()->get('chat_history', []);
                $history[] = ['role' => 'model', 'parts' => [['text' => $reply]]];
                $request->session()->put('chat_history', $history);
                return response()->json(['reply' => $reply]);
            } else {
                $errorMessage = 'Terjadi kesalahan dengan API: ' . $response->status() . ' - ' . ($response->json()['error']['message'] ?? 'Tidak ada pesan kesalahan.');
                return response()->json(['error' => $errorMessage], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
