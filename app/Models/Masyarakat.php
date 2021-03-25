<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes;

    use HasFactory, Notifiable;

    protected $primaryKey = 'nik';

    protected $fillable = [
    	'nik',
    	'nama',
    	'username',
    	'password',
    	'telp',
        // 'jenis_kelamin',
        'email',
        'email_verified_at',
        'provider_id',
        'provider',

    ];
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
 	// protected $cast = [
  //       'email_verified_at'=>'dateTime',
  //   ];

}
