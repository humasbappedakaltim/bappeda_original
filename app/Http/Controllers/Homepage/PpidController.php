<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visitors;
use App\Models\PostPpid;
use App\Models\CategoryPpid;
use App\Models\DataDocument;
use App\Models\DataCenter;
use App\Models\DataPengendalianevaluasi;
use App\Models\DataPaparan;
use App\Models\Slider;

class PpidController extends Controller
{
    public function index(Request $request){
        $ip = $request->getClientIp(true);
        $visitors = new Visitors();

        if(!$request->session()->has('person')) {
            $request->session()->put('person', $ip);
            $visitors->ip_address = $ip;
            $visitors->save();
        }
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['slider'] = Slider::orderBy('orders','asc')->whereActive(1)->get();
        return view('content.ppid',$data);
   }

   public function aplikasibappeda(){
        $data['title'] = 'Aplikasi Bappeda';
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();

        return view('content.aplikasibappeda',$data);
}

   public function postppidDasarHukum(){
        $data['title'] = 'Dasar Hukum';
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        // $posts = PostPpid::orderBy('published_at','desc')->orderBy('id','desc')->where('category_id',1)->paginate(5);
        $posts = PostPpid::orderBy('id','desc')->where('category_id',1)->paginate(5);
        $data['posts'] = $posts;
        if($posts){
            return view('content.postppid',$data);
        }
        else{
            return view('error-404'); 
        }
   }

    public function postppidSop(){
        $data['title'] = 'Standar Operasional Prosedur';
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        // $posts = PostPpid::orderBy('published_at','desc')->orderBy('id','desc')->where('category_id',2)->paginate(5);
        $posts = PostPpid::orderBy('id','desc')->where('category_id',2)->paginate(5);
        $data['posts'] = $posts;
        if($posts){
            return view('content.postppid',$data);
        }else{
            return view('error-404'); 
        }
    }

    public function postppidDetail(Request $request, $slug){
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $row = PostPpid::where('slug',$slug);

        $post = $row->first();
        $data['title'] = $post->title;
        $data['slug'] = $slug;
        $next_post_news = PostPpid::where('id',$post->id + 1)->first();
        $prev_post_news = PostPpid::where('id',$post->id - 1)->first();   
        if($post){
            return view('content.postppid-detail',$data)->with(compact('post','next_post_news','prev_post_news'));
        }
        else{
            return view('error-404'); 
        }
   }

   public function PpidDataCenter(Request $request, $slug){
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();

        if($slug == 'info-berkala'){
            $category_information = 'infoberkala';
            $title = 'Info Berkala';
        }elseif($slug == 'info-serta-merta'){
            $category_information = 'infosertamerta';
            $title = 'Info Serta Merta';
        }elseif($slug == 'info-tersedia-setiap-saat'){
            $category_information = 'infotersediasetiapsaat';
            $title = 'Info Tersedia Setiap Saat';
        }elseif($slug == 'laporan-akses-informasi-publik'){
            $category_information = 'laporanaksesinformasipublik';
            $title = 'Laporan Akses Informasi Publik';
        }elseif($slug == 'laporan-layanan-informasi-publik'){
            $category_information = 'laporanlayananinformasipublik';
            $title = 'Laporan Layanan Informasi Publik';
        }elseif($slug == 'laporan-survei-layanan-informasi'){
            $category_information = 'laporansurveilayananinformasi';
            $title = 'Laporan Survei Layanan Informasi';
        }elseif($slug == 'laporan-realisasi-anggaran'){
            $category_information = 'laporanrealisasianggaran';
            $title = 'Laporan Realisasi Anggaran';
        }elseif($slug == 'maklumat'){
            $category_information = 'maklumat';
            $title = 'Maklumat';
        }elseif($slug == 'prosedur-permohonan-informasi'){
            $category_information = 'prosedurpermohonaninformasi';
            $title = 'Prosedur Permohonan Informasi';
        }elseif($slug == 'prosedur-pengajuan-keberatan'){
            $category_information = 'prosedurpengajuankeberatan';
            $title = 'Prosedur Pengajuan Keberatan';
        }elseif($slug == 'prosedur-sengketa-informasi'){
            $category_information = 'prosedursengketainformasi';
            $title = 'Prosedur Sengketa Informasi';
        }elseif($slug == 'jalur-waktu-dan-biaya-layanan'){
            $category_information = 'jalurwaktudanbiayalayanan';
            $title = 'Jalur, Waktu dan Biaya Layanan';
        }

        $dataDocument = DataDocument::where('category_information', $category_information)->get();
        $groupDocument = $dataDocument->groupBy('category.name')->mapWithKeys(function ($item, $key) {
            return [$key => [
                'data' => $item
            ]];
        })->toArray();
        // return $groupDocument;

        $dataPengendalian = DataPengendalianevaluasi::where('category_information', $category_information)->get();
        $groupPengendalian = $dataPengendalian->groupBy('category.nama_kategori')->mapWithKeys(function ($item, $key) {
            return [
                $key => [
                    'data' => $item
                ]];
        })->toArray();

        $dataCenter = DataCenter::where('category_information', $category_information)->get();
        $groupCenter = $dataCenter->groupBy('category.nama_kategori')->mapWithKeys(function ($item, $key) {
            return [$key => [
                'data' => $item
            ]];
        })->toArray();

        $dataPaparan = DataPaparan::where('category_information', $category_information)->get();
        $groupPaparan = $dataPaparan->groupBy('category.nama_kategori')->mapWithKeys(function ($item, $key) {
            return [
                $key => [
                    'data' => $item
                ]];
        })->toArray();

        return view('content.ppid-data-center',$data)->with(compact('groupDocument', 'groupCenter','groupPengendalian','groupPaparan','title'));
    }
}
