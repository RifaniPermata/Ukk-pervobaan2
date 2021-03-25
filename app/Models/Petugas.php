<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Authenticatable
{
    use SoftDeletes;

    use HasFactory;

    protected $primaryKey = 'id_petugas';

    protected $fillable = [
    	'nama_petugas',
		'username',
		'password',
		'telp',
		'level',

    ];
        protected $hidden = [
        'password'
    ];

}
