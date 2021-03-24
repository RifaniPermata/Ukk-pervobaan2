<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Petugas;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 

	    	Petugas::create([
	        	'nama_petugas' => 'Administrator',
	        	'username' => 'admin',
	        	'password' => Hash::make('admin153'),
	        	'telp' => '082320218524',
	        	'level' => 'admin',
	        ]);
            Petugas::create([
                'nama_petugas' => 'Petugas 1',
                'username' => 'petugas',
                'password' => Hash::make('petugas153'),
                'telp' => '08232021647',
                'level' => 'petugas',
            ]);
        
    }
}
