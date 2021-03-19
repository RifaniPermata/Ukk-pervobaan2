<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Masyarakat extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
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
