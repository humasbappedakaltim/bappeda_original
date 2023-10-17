<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPaparan;
use App\Models\CategoryPaparan;
use App\Models\Visitors;

class KumpulanPaparanController extends Controller
{
    public function index(){
	$visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['title'] = 'Kumpulan Paparan';
        $data['paparan'] = DataPaparan::orderBy('id','desc');
        return view('content.kumpulanpaparan',$data);
    }

    public function slug_link($slug){
        $visitors = new Visitors();
            $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
            $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
            $data['title'] = 'Kumpulan Paparan';

            if ($slug == 'P2EPD') {
                $data['bidang'] = 'Bidang Perencanaan, Pengendalian dan Evaluasi Pembangunan Daerah (Bidang P2EPD)';
                $wherequery = 'P2EPD';
            } elseif ($slug == 'p2epd') {
                $data['bidang'] = 'Bidang Perencanaan, Pengendalian dan Evaluasi Pembangunan Daerah (Bidang P2EPD)';
                $wherequery = 'P2EPD';
            } elseif ($slug == 'PPM') {
                $data['bidang'] = 'Bidang Pemerintahan dan Pembangunan Manusia (Bidang PPM)';
                $wherequery = 'PPM';
            } elseif ($slug == 'Ekonomi') {
                $data['bidang'] = 'Bidang Perekonomian dan Sumber Daya Alam (Bidang Ekonomi)';
                $wherequery = 'Ekonomi';
            } elseif ($slug == 'ekonomi') {
                $data['bidang'] = 'Bidang Perekonomian dan Sumber Daya Alam (Bidang Ekonomi)';
                $wherequery = 'Ekonomi';
            } elseif ($slug == 'Infraswil') {
                $data['bidang'] = 'Bidang Infrastruktur dan Kewilayahan (Bidang Infraswil)';
                $wherequery = 'Infraswil';
            } elseif ($slug == 'infraswil') {
                $data['bidang'] = 'Bidang Infrastruktur dan Kewilayahan (Bidang Infraswil)';
                $wherequery = 'Infraswil';
            } elseif ($slug == 'Umum') {
                $data['bidang'] = 'Umum';
                $wherequery = 'Umum';
            } elseif ($slug == 'umum') {
                $data['bidang'] = 'Umum';
                $wherequery = 'Umum';
            } 

            $data['paparan'] = CategoryPaparan::where('bidang',$wherequery)->orderBy('id','desc');
            $data['slugnya'] = $slug;
            return view('content.kumpulanpaparanslug',$data);
        }
}
