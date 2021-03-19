<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Pengaduan extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
    	'tgl_pengaduan',
		'nik',
		'isi_laporan',
        'lokasi_kejadian',
        'kategori_kejadian',
		'foto',
		'status',   
    ];
    protected  $dates = ['tgl_pengaduan'];

    public function user(){
    	return $this->hasOne(Masyarakat::class, 'nik','nik'); 
    }
        public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }
}
