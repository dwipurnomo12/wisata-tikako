<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Fasilitas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 1
        ]);
        User::create([
            'name'      => 'mujiyono',
            'email'     => 'mujiyono@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 2
        ]);

        Role::create([
            'role'  => 'admin'
        ]);
        Role::create([
            'role'  => 'pengunjung'
        ]);

        Fasilitas::create([
            'fasilitas'     => 'Penginapan',
            'deskripsi'     => 'Wisata Tikako menyediakan penginapan yang cocok untuk bersantai bersama keluarga'
        ]);
        Fasilitas::create([
            'fasilitas'     => 'Pemandu Wisata',
            'deskripsi'     => 'Wisata Tikako menyediakan pemandu wisata yang akan menemani liburan anda'
        ]);
        Fasilitas::create([
            'fasilitas'     => 'Toilet',
            'deskripsi'     => 'Toilet Wisata Tikako yang kami sediakan ada banyak dan terjaga kebersihannya'
        ]);
        Fasilitas::create([
            'fasilitas'     => 'Mushola',
            'deskripsi'     => 'Wisata Tikako menyediakan Mushola untuk beribadah yang terjaga juga kebersihannya'
        ]);
        Fasilitas::create([
            'fasilitas'     => 'Pemandian',
            'deskripsi'     => 'Wisata Tikako menyediakan pemandian air hangat maupun air dingin'
        ]);
        Fasilitas::create([
            'fasilitas'     => 'kuliner',
            'deskripsi'     => 'Terdapat aneka kuliner tradisional di gazebo rumah mini atau meja kursi di atas sungai'
        ]);
    }
}
