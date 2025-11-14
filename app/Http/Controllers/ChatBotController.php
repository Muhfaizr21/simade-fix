<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client as GuzzleClient;

class ChatBotController extends Controller
{
    // Model Gemini yang digunakan
    protected const GEMINI_MODEL = 'gemini-2.5-flash';
    protected $geminiApiKey;

    public function __construct()
    {
        $this->geminiApiKey = env('GEMINI_API_KEY');
        if (empty($this->geminiApiKey)) {
            Log::error("GEMINI_API_KEY tidak ditemukan di .env. Chatbot akan dinonaktifkan.");
        }
    }

    public function index()
    {
        return response()->json(['message' => 'Chatbot SIMADE aktif 👋']);
    }

    /**
     * Logika utama untuk menerima dan memproses pertanyaan, HANYA menggunakan Gemini.
     */
    public function ask(Request $request)
    {
        $request->validate(['question' => 'required|string']);
        $answer = '';

        // -------------------------------------------------------------
        // 1. DATA DATABASE (Konteks Detail untuk Gemini)
        //    *Data ini diambil dari simade.sql dan di-hardcode di sini.
        // -------------------------------------------------------------
        $databaseContext = "DATA LENGKAP DESA DONGKAL (Sumber Database SIMADE):\n";
        $databaseContext .= "--------------------------------------------------------\n";

        // Data Pemerintahan & Kontak
        $databaseContext .= "1. PEMERINTAHAN & KONTAK:\n";
        $databaseContext .= "- Kepala Desa: Haya.\n"; // Diambil dari perangkat_desas
        $databaseContext .= "- Sekretaris Desa: Hardi.\n"; // Diambil dari perangkat_desas
        $databaseContext .= "- Kontak Email: kelompok3@gmail.com.\n"; // Diambil dari kontaks
        $databaseContext .= "- Kontak HP: 0882260686031.\n"; // Diambil dari kontaks

        // Data Demografi
        $databaseContext .= "2. DEMOGRAFI DESA:\n";
        $databaseContext .= "- Total Penduduk: 17368 jiwa (Laki-laki: 8902, Perempuan: 8466).\n"; // Diambil dari jenis_kelamins
        $databaseContext .= "- Mayoritas Pekerjaan: Petani (13026 jiwa).\n"; // Diambil dari pekerjaans
        $databaseContext .= "- Mayoritas Agama: Islam (9594 penganut).\n"; // Diambil dari agamas

        // Visi Misi
        $databaseContext .= "3. VISI & MISI:\n";
        $databaseContext .= "- Visi: Terwujudnya Desa Dongkal yang maju, mandiri, dan berbudaya, dengan masyarakat sejahtera dan lingkungan yang lestari.\n"; // Diambil dari visi_misis
        $databaseContext .= "- Misi: Meningkatkan kualitas pendidikan, kesehatan, dan kesejahteraan; Mengembangkan potensi ekonomi lokal; Melestarikan budaya; Meningkatkan partisipasi masyarakat; Mewujudkan tata kelola pemerintahan yang transparan.\n"; // Diambil dari visi_misis

        // Informasi & Layanan
        $databaseContext .= "4. INFORMASI TERKINI & LAYANAN:\n";
        $databaseContext .= "- Pengumuman Penting: Penyaluran Bantuan Langsung Tunai (BLT) Dana Desa Bulan November 2025, Pelaksanaan Gotong Royong Bersih-Bersih Lingkungan Desa Dongkal.\n"; // Diambil dari announcements
        $databaseContext .= "- Berita Utama: Pengembangan Wisata Pertanian dan Edukasi, Gotong Royong Massal Bersihkan Lingkungan Menjelang Musim Hujan.\n"; // Diambil dari beritas
        $databaseContext .= "- Layanan Online: Pembuatan Surat Keterangan Domisili Secara Online, Pendaftaran Layanan Kesehatan di Puskesmas Anjatan Secara Online.\n"; // Diambil dari layanans
        $databaseContext .= "- Produk UMKM: Kerajinan Rajut Eceng Gondok, Dorokdokcu (sejenis kerupuk kulit sapi).\n"; // Diambil dari umkms
        $databaseContext .= "--------------------------------------------------------\n\n";


        $systemInstruction = "Anda adalah Asisten Virtual bernama Simade dari Desa Dongkal, Indramayu.
        Tugas Anda adalah menjawab pertanyaan user dengan ramah dan informatif, utamakan menggunakan data yang telah disediakan di bawah ini.
        Jika pertanyaan tentang data demografi (penduduk, agama, pekerjaan), visi, misi, kades, layanan, atau berita, JAWAB WAJIB menggunakan data di bawah.
        Jika pertanyaan tidak relevan dengan data atau topik umum, berikan jawaban sopan dan alihkan kembali ke topik desa.

        " . $databaseContext . "

        Pertanyaan User: " . $request->input('question');

        // -------------------------------------------------------------
        // 2. PROSES KE GEMINI (dengan perbaikan error 400 dan cURL 56)
        // -------------------------------------------------------------
        if (empty($this->geminiApiKey)) {
            $answer = "Fitur Chatbot AI tidak aktif karena kunci API belum diatur. Silakan hubungi admin.";
        } else {
            try {
                $client = new GuzzleClient();
                $url = "https://generativelanguage.googleapis.com/v1beta/models/" . self::GEMINI_MODEL . ":generateContent?key=" . $this->geminiApiKey;

                $response = $client->post($url, [
                    'json' => [
                        'contents' => [
                            ['parts' => [['text' => $systemInstruction]]], // Menggunakan $systemInstruction sebagai prompt
                        ],
                        'generationConfig' => [ // Perbaikan Error 400: Mengganti 'config' menjadi 'generationConfig'
                            'temperature' => 0.6,
                        ],
                    ],
                    'timeout' => 30, // Perbaikan cURL 56: Menambahkan timeout
                ]);

                $responseData = json_decode($response->getBody()->getContents(), true);
                $geminiText = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? null;

                if ($geminiText) {
                    $answer = trim($geminiText);
                } else {
                    throw new \Exception("Gemini tidak dapat menghasilkan respons (konten mungkin tidak sesuai).");
                }

            } catch (\Exception $e) {
                Log::error("Gemini API Error: " . $e->getMessage());

                $answer = "Maaf, terjadi masalah koneksi dengan sistem AI. Coba tanyakan hal lain atau hubungi kontak resmi desa.";
            }
        }

        return response()->json(['answer' => $answer]);
    }
}
