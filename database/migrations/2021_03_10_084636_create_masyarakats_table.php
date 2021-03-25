<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasyarakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masyarakats', function (Blueprint $table) {
            $table->char('nik',16)->primary();
            $table->string('nama',35);
            $table->string('username',25);
            $table->string('password');
            $table->string('telp',13);
            // $table->enum('jenis_kelamin',['pr','lk']);            
            $table->string('email')->unique();
            $table->dateTime('email_verified_at')->nullable();

            $table->string('provider_id')->nullable();
            $table->string('provider')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
            $table->rememberToken();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masyarakats');
    }
}
