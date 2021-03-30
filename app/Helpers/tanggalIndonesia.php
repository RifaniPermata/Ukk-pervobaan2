<?php 

function tanggalIndonesia($tanggal = '', $tampilHari = true)
{
	if($tanggal == ''){
		return '-';
	}
	// Contoh inputan parameter 2020-09-28 15:18:27
	$namaHari = ["Minggu","Senin","Selasa","Rabu","Kamis","Ju'mat","Sabtu"];
	$namaBulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
	$tanggal = explode(' ', $tanggal);
	// buat jadi '2020-09-28' '15:18:27'
	$tahun = substr($tanggal[0], 0,4); //2020
	$bulan = substr($tanggal[0], 5,2);

	if(strlen($bulan) == 2 && $bulan[0] == '0'){
		$bulan = $bulan[1];  // 9
	}
	// else 19
	$bulan = $namaBulan[$bulan - 1];
	$tanggal = substr($tanggal[0], 8,2);
	$text = "";
	
	if($tampilHari){
		$urutanHari = date('w',mktime(0,0,0, substr($tanggal, 5,2),$tanggal,$tahun));
		$hari = $namaHari[$urutanHari];
		$text .= $hari . ", ";
	}
	$text .= $tanggal . " " . $bulan . " " . $tahun;
	return $text;
}