<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use App\Models\Masyarakat;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Pengaduan extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
    	'tgl_pengaduan',
		'nik',
		'isi_laporan',
		'foto',
		'status',   
    ];
    protected  $dates = ['tgl_pengaduan'];

    public function user(){
    	return $this->hasOne(Masyarakat::class, 'nik','nik'); 
    }
}
