<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class MyHelpers {
	public static function pangkatasn($gol)
	{
		if($gol == '0') {
			return '';
		}elseif($gol == 'I/a') {
			return 'Juru Muda (I/a)';
		}elseif($gol == 'I/b') {
			return 'Juru Muda Tingkat 1 (I/b)';
		}elseif($gol == 'I/c') {
			return 'Juru (I/c)';
		}elseif($gol == 'I/d') {
			return 'Juru Tingkat 1 (I/d)';
		}elseif($gol == 'II/a') {
			return 'Pengatur Muda (II/a)';
		}elseif($gol == 'II/b') {
			return 'Pengatur Muda Tingkat 1 (II/b)';
		}elseif($gol == 'II/c') {
			return 'Pengatur (II/c)';
		}elseif($gol == 'II/d') {
			return 'Pengatur Tingkat 1 (II/d)';
		}elseif($gol == 'III/a') {
			return 'Penata Muda (III/a)';
		}elseif($gol == 'III/b') {
			return 'Penata Muda Tingkat 1 (III/b)';
		}elseif($gol == 'III/c') {
			return 'Penata (III/c)';
		}elseif($gol == 'III/d') {
			return 'Penata Tingkat 1 (III/d)';
		}elseif($gol == 'IV/a') {
			return 'Pembina (IV/a)';
		}elseif($gol == 'IV/b') {
			return 'Pembina Tingkat 1 (IV/b)';
		}elseif($gol == 'IV/c') {
			return 'Pembina Utama Muda (IV/c)';
		}elseif($gol == 'IV/d'){
			return 'Pembina Utama Madya (IV/d)';
		}elseif($gol == 'IV/e'){
			return 'Pembina Utama (IV/e)';
		}
	}

    public static function tglind($tgl, $tampil_hari=true)
    {
        $nama_hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");	
        $nama_bulan = array(1=>"Januari","Februari","Maret","April","Mei",
        "Juni","Juli","Agustus","September","Oktober","November","Desember");	
        $tahun = substr($tgl,0,4);
        $bulan = $nama_bulan[(int)substr($tgl,5,2)];
        $tanggal = substr($tgl,8,2);	
        $text = "";	
        if($tampil_hari){
            $urutan_hari = date('w', mktime(0,0,0, substr($tgl,5,2),        
            $tanggal, $tahun));
            $hari = $nama_hari[$urutan_hari];
            $text .= $hari.", ";
        }	
        $text .=$tanggal ." ". $bulan ." ". $tahun;
        return $text;
    }

    public static function tglindPer($tgl, $pilihan)
    {
        $nama_hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");	
        $nama_bulan = array(1=>"Januari","Februari","Maret","April","Mei",
        "Juni","Juli","Agustus","September","Oktober","November","Desember");	
        $tahun = substr($tgl,0,4);
        $bulan = $nama_bulan[(int)substr($tgl,5,2)];
        $tanggal = substr($tgl,8,2);	
        $text = "";	

        if($pilihan == 'hari') {
            $urutan_hari = date('w', mktime(0,0,0, substr($tgl,5,2),        
            $tanggal, $tahun));
            $hari = $nama_hari[$urutan_hari];
            $text .= $hari;
            return $text;
        }elseif($pilihan == 'tanggal') {
            $text .= $tanggal;
            return $text;
        }elseif($pilihan == 'bulan') {
            $text .= $bulan;
            return $text;
        }else{
            $text .= $tahun;
            return $text;
        }
    }
}

?>