<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Masyarakat;

class MasyarakatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Masyarakat::create([
        	'nik' => '3213150703000001',
        	'nama' => 'Masyarakat 1',
			'username' => 'masyarakat',
			'password' => Hash::make('masyarakat153'),
			'telp' => '087612312312',
			'email' => 'masyarakat@gmail.com'
        ]);
    }
}
