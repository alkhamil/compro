<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // init user
        DB::table('users')->insert([
            'fullname' => 'Admin',
            'email' => 'admin@email.com',
            'nik' => 'ADMIN',
            'password' => Hash::make('ADMIN'),
            'role' => 'ADMIN',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // init setting

        $settings = [
            [
                'key' => 'APP_NAME',
                'value' => 'SMK Gema Bangsa',
            ],
            [
                'key' => 'LOGO',
                'value' => 'url',
            ],
            [
                'key' => 'PAVICON',
                'value' => 'url',
            ],
            [
                'key' => 'ABOUT',
                'value' => '<p><strong>SMK GEMA BANGSA</strong> didirikan oleh bapak Endih Muhlis S.Pd.I.,MM pada tahun 2015 tepatnya tanggal 16 Maret 2015. Karena Perkembangan Teknologi Yang Semakin Berkembang Dan Belum Adanya SMK Yang Memiliki Jurusan Multimedia Bapak Endih Muhlis S.Pd.I.,MM Berinisiatif Untuk Mendirikan <strong>SMK GEMA BANGSA</strong> Yang Merupakan SMK Satu – Satunya Yang Memiliki Jurusan Multimedia Di Kecamatan Tenjolaya. Keberadaan <strong>SMK GEMA BANGSA </strong>Merupakan Sebuah Solusi Bagi Masyarakat Agar Dapat Merasakan Manfaat Teknologi di Era Globalisasi.</p><p><br></p><p><strong>Tujuan :</strong></p><p>Ikut serta dalam layanan pendidikan generasi bangsa dengan membekali peserta didik dengan keterampilan dan pengetahuan agar kompeten di bidang multimedia.</p><p><br></p><p><strong>Visi :</strong></p><p>Terwujudnya kompetensi keahlian Multimedia Berpendidikan Vokasi yang Bermutu,</p><p>Menghasilkan Suber daya manusia yang berakhlak mulia, memiliki karakter wirausaha dan kompe-ten di Bidang Multimedia.</p><p><br></p><p><strong>Misi :</strong></p><p>1. Melakasanakan kegiatan pembelajaran berbasis kompetensi di bidang multimedia</p><p>2. Menciptakan lulusan dibidang kejuruan dan teknologi untuk menyiapkan tamatan yang kompeten dibidang nya serta memiliki jiwa kewiraushaan yang tinggi sehingga mampu bersaing diera globalisasi.</p><p>3. Menciptakan lulusan yang berilmu,beriman,beramal dan bertaqwa </p><p>4. Membangun jaringan komunikasi yang seluas-luasnya dengan dunia usaha/Dunia Industri dalam rangka pengembangan keahlian Multimedia </p>',
            ],
            [
                'key' => 'STRUCTURAL',
                'value' => 'url',
            ],
            [
                'key' => 'PHONE',
                'value' => '088888999182',
            ],
            [
                'key' => 'EMAIL',
                'value' => 'smkgemabangsa@email.com',
            ],
            [
                'key' => 'ADDRESS',
                'value' => 'Jl. Abd Fatah Km 7 Kp. Cibitung RT 003/001 Desa Cibitung Tengah Kecamatan Tenjolaya Kabupaten Bogor 16371 Provinsi Jawa Barat',
            ],
            [
                'key' => 'MAPS',
                'value' => 'https://maps.google.com/maps?q=jl%20abdul%20fatah%20cibitung&t=&z=13&ie=UTF8&iwloc=&output=embed',
            ],
            [
                'key' => 'FB',
                'value' => 'facebook.com/smkgemabangsa',
            ],
            [
                'key' => 'IG',
                'value' => 'instagram.com/smkgemabangsa',
            ],
            [
                'key' => 'TW',
                'value' => 'twitter.com/smkgemabangsa',
            ],
        ];
        foreach ($settings as $setting) {
            DB::table('setting_informations')->insert([
                'key' => $setting['key'],
                'value' => $setting['value'],
            ]);
        }
    }
}
