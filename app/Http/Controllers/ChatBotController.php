<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    // Untuk jaga-jaga jika ada route ke /chatbot
    public function index()
    {
        return response()->json(['message' => 'Chatbot SIMADE aktif 👋']);
    }

    public function ask(Request $request)
    {
        $question = strtolower(trim($request->input('question')));

        // --- Daftar respons ---
        $responses = [
            // 👋 Sapaan umum
            'halo' => 'Halo! 👋 Ada yang bisa saya bantu tentang Desa Dongkal?',
            'hai' => 'Hai juga! Apa yang ingin kamu ketahui tentang desa ini?',
            'hi' => 'Hai juga! Apa yang ingin kamu ketahui tentang desa ini?',
            'assalamualaikum' => 'Waalaikumsalam! Semoga harimu menyenangkan 🌿',
            'selamat pagi' => 'Selamat pagi! Semoga hari kamu penuh semangat ☀️',
            'selamat malam' => 'Selamat malam 🌙, semoga harimu menyenangkan!',

            // 🏡 Tentang Desa
            'visi' => 'Visi Desa Dongkal adalah menjadi desa yang mandiri, maju, dan sejahtera berbasis gotong royong.',
            'misi' => 'Misi Desa Dongkal mencakup peningkatan pelayanan publik, pembangunan berkelanjutan, dan pemberdayaan masyarakat.',
            'sejarah' => 'Desa Dongkal berdiri sejak masa pemerintahan kolonial Belanda dan terus berkembang hingga kini dengan masyarakat yang harmonis.',
            'wilayah' => 'Desa Dongkal terletak di Kecamatan Dongkal, Kabupaten Indramayu. Luas wilayah sekitar ... hektar.',
            'perangkat' => 'Perangkat desa terdiri dari Kepala Desa, Sekretaris Desa, Kasi Pemerintahan, Kasi Kesejahteraan, dan lainnya.',
            'peta' => 'Kamu bisa melihat peta lengkap desa di halaman /peta-desa 🌍',
            'data' => 'Data Desa Dongkal mencakup jumlah penduduk, pekerjaan, dan pendidikan — bisa dilihat di halaman /data-desa.',

            // 📢 Informasi
            'berita' => 'Berita terbaru tentang Desa Dongkal dapat kamu baca di halaman /berita.',
            'pengumuman' => 'Pengumuman resmi desa tersedia di halaman /pengumuman.',
            'gallery' => 'Kamu bisa lihat dokumentasi kegiatan desa di /gallery.',
            'apbdesa' => 'Informasi APBDesa bisa kamu lihat di /apbdesa.',

            // 💼 Layanan & UMKM
            'umkm' => 'Desa Dongkal mendukung UMKM lokal. Lihat di halaman /umkm untuk tahu lebih banyak!',
            'layanan' => 'Ada banyak layanan online desa seperti surat pengantar dan KK. Cek di aplikasi mobile ya!! ',
            'kontak' => 'Untuk menghubungi perangkat desa, buka halaman /kontak.',
            'bagaimana cara mengajukan?' => 'Kamu bisa mengajukan permohonan surat melalui layanan mobile atau langsung ke kantor desa.',

            // 🤔 Pertanyaan umum / liar
            'siapa kades' => 'Kepala Desa Dongkal saat ini dijabat oleh Bapak Faiz.',
            'desa ini pernah banjir gak' => 'Beberapa tahun lalu pernah terjadi banjir ringan, tapi sekarang sistem drainase sudah lebih baik 💧',
            'ada wifi' => 'Beberapa titik publik menyediakan WiFi desa gratis, terutama di balai desa dan area sekitar.',
            'penduduk ramah' => 'Banget! Masyarakat Dongkal dikenal dengan keramahan dan gotong royongnya 🤝',
            'event' => 'Biasanya setiap tahun ada acara bersih desa dan festival budaya lokal 🎉',
            'cafe' => 'Ada beberapa warung kopi lokal yang sering jadi tempat nongkrong anak muda desa ☕',
            'sekolah' => 'Tentu, di Desa Dongkal terdapat SD dan juga SMP di sekitar wilayah desa.',
            'terkenal' => 'Desa Dongkal terkenal dengan semangat gotong royong dan hasil pertaniannya yang melimpah 🌾',
            'kapan berdiri' => 'Desa Dongkal berdiri sejak sekitar tahun 1800-an, dan resmi secara administratif setelah kemerdekaan Indonesia.',

            // 🧠 Meta / Chatbot awareness
            'kamu siapa' => 'Aku asisten virtual Desa Dongkal 🤖, siap bantu kamu 24 jam!',
            'bisa apa' => 'Aku bisa bantu kasih info tentang desa, layanan, berita, atau sekadar ngobrol ringan 😉',
            'terima kasih' => 'Sama-sama! Senang bisa bantu kamu 🙌',
            'sip' => 'You\'re welcome! Glad to assist you 🙌',
        ];

        // --- Matching logika lebih cerdas ---
        $answer = collect($responses)->first(function ($value, $key) use ($question) {
            // match jika kata kunci ada di pertanyaan user
            return str_contains($question, $key);
        });

        if (!$answer) {
            // fallback random biar terasa alami
            $fallbacks = [
                "Hmm... aku belum punya jawaban untuk itu 😅. Coba tanya hal lain tentang Desa Dongkal!",
                "Menarik juga pertanyaannya, tapi aku belum tahu jawabannya 🤔.",
                "Aku belum punya data soal itu, tapi bisa kamu tanyakan langsung ke kantor desa 💬.",
                "Hi aku Simade Virtual yang dikembangkan oleh Kelompok 3, silakan ajukan pertanyaan terkait Simade! aku dapat diakses juga melalui Mobile dan Whatsapp 0838-6662-3090"
            ];
            $answer = $fallbacks[array_rand($fallbacks)];
        }

        return response()->json(['answer' => $answer]);
    }
}
