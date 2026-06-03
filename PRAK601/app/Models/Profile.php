<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public static function getStudentData()
    {
        return [
            'nama' => 'Akhmad Daffa Azzikri',
            'nim' => '2410817110002',
            'prodi' => 'Teknologi Informasi',
            'hobi' => 'Bermain Game, TTRPG',
            'skill' => 'PHP, Laravel, Python',
            'informasi_tambahan' => 'Top Kalsel franco 32, Top Kalsel Leomord 93, Alucard 88 ranked match WR 90%.'
        ];
    }

    public static function getExperiences()
    {
        return [
            1 => ['id' => 1, 'judul' => 'PKKMB Angkatan 2024 Yel-yel dan Cosplay',  'pengalaman' => 'Nyanyi yel-yel bareng sampai suara serak dan melihat Rakha dan Eris cosplay maskot angkatan, seru banget. Pulangnya tewas mengenaskan karena kepanasan. Apesnya lagi waktu pergi buat acara Closingan Eftefest malah kecelakaan. Hebat kamu daf.', 'gambar' => asset('images/PKKMB.jpg')],
            2 => ['id' => 2, 'judul' => 'Lomba basket by orbit 2024',  'pengalaman' => 'Maen basket bareng temen-temen, nonton dari bangku cadangan, sorak menyorak, game makin panas, literally bahu membahu, badan ke badan, dan adu taunting, seru walaupun kalah. Tapi yang penting seru-seruan bareng dan ketawa-ketiwi gak jelas.', 'gambar' => asset('images/basket.jpg')],
            3 => ['id' => 3, 'judul' => 'Kuliah pakai baju SMA', 'pengalaman' => 'Kuliah pakai baju gamis memanglah epic. Tapi Kuliah seragam pakai baju batik SMA dengan teman-teman SMA lebih seru karena merasa nostalgia balik jaman sekolah. Meskipun malu dikit dan ditanyain ada acara dalam rangka apa sama dosen. hufft...', 'gambar' => asset('images/baju_batik.jpg')],
            4 => ['id' => 4, 'judul' => 'Foto bersama dosen setelah UAS',  'pengalaman' => 'Foto bersama bu Eliatun setelah selesai Ujian Akhir Semester. Sangat berkenang karena bu Eliatun baik banget dan juga mata kuliah sulit nya nauzubillah. Tapi menyenangkan karena dosennya bu Eliatun, love you 1000 bu.', 'gambar' => asset('images/fotbar.jpg')]
        ];
    }
}