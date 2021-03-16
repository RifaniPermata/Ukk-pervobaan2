<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Masyarakat extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'nik';

    protected $fillable = [
    	'nik',
    	'nama',
        'email',
    	'username',
    	'password',
    	'telp',

    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
 	protected $cast = [
        'email_verified_at'=>'dateTime',
    ];

}
