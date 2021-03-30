<?php

namespace App\Models;

// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Models\Masyarakat;
// use App\Models\Tanggapan;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    protected $table = 'pengaduan';

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
