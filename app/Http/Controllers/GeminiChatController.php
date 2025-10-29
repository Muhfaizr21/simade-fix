<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class GeminiChatController extends Controller
{
    public function stream(Request $request)
    {
        $question = $request->input('question', '');

        if (trim($question) === '') {
            return response()->json(['error' => 'Pertanyaan kosong.'], 400);
        }

        $apiKey = env('GEMINI_API_KEY');

        $response = new StreamedResponse(function () use ($question, $apiKey) {
            $ch = curl_init();

            $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:streamGenerateContent?key=' . urlencode($apiKey);

            $body = json_encode([
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => "Kamu adalah asisten virtual ramah bernama SIMADE, asisten resmi Desa Dongkal, Indramayu. Jawab dengan gaya sopan, ringkas, dan akurat. Pertanyaan: {$question}"
                            ]
                        ]
                    ]
                ]
            ]);

            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_WRITEFUNCTION => function ($ch, $data) {
                    // Gemini streaming kirim data dalam beberapa baris JSON
                    $lines = explode("\n", trim($data));

                    foreach ($lines as $line) {
                        if (empty($line)) continue;
                        $decoded = json_decode($line, true);
                        if (isset($decoded['candidates'][0]['content']['parts'][0]['text'])) {
                            $chunk = $decoded['candidates'][0]['content']['parts'][0]['text'];
                            echo "data: " . $chunk . "\n\n";
                            @ob_flush();
                            @flush();
                        }
                    }
                    return strlen($data);
                },
            ]);

            curl_exec($ch);
            curl_close($ch);
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');
        $response->headers->set('X-Accel-Buffering', 'no'); // disable nginx buffering

        return $response;
    }
}
