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
                'value' => 'Tentang SMK Gema Bangsa',
            ],
            [
                'key' => 'STRUCTURAL',
                'value' => 'url',
            ],
            [
                'key' => 'CALENDAR',
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
