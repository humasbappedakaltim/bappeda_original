<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Agenda;
use App\Models\DataDocument;
use App\Models\DataPengendalianevaluasi;
use App\Models\DataPaparan;
use App\Models\DataCenter;
use App\Models\Slider;
use App\Models\Video;
use App\Models\AlbumFoto;
use App\Models\Visitors;
use App\Models\SurveiWebsite;
use App\Penghargaan;
use App\Map;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['slider'] = Slider::orderBy('orders', 'asc')->whereActive(1)->get();
        $data['agendas'] = Agenda::orderBy('id', 'desc')->take(3)->get();
        $data['agendas2'] = Agenda::orderBy('id', 'desc')->skip(3)->take(3)->get();
        $data['videos'] = Video::orderBy('id', 'desc')->where('status', '1')->take(6)->get();
        $data['dokumens'] = DataDocument::orderBy('id', 'desc')->take(10)->get();
        $data['post_news'] = Post::orderBy('published_at', 'desc')->orderBy('title', 'asc')->where('image', '!=', null)->where('category_id', 2)->where('status', '1')->take(6)->get();
        $data['post_news2'] = Post::orderBy('published_at', 'desc')->orderBy('title', 'asc')->where('image', '!=', null)->where('category_id', 2)->where('status', '1')->skip(6)->take(4)->get();
        $data['berita_nasional'] = Post::orderBy('published_at', 'desc')->orderBy('title', 'asc')->where('category_id', 6)->where('image', '!=', null)->where('status', '1')->take(6)->get();
        $data['kinerja_pembangunan_big'] = Post::orderBy('id', 'desc')->where('category_id', 5)->where('image', '!=', null)->first();
        $data['kinerja_pembangunan'] = Post::orderBy('id', 'desc')->where('category_id', 5)->where('image', '!=', null)->skip(1)->take(3)->get();
        $data['berita_foto'] = AlbumFoto::orderBy('id', 'desc')->take('2')->get();
        $data['berita_foto2'] = AlbumFoto::orderBy('id', 'desc')->skip(2)->take('2')->get();
        return view('content.home', $data);
    }

    public function headerbaru(Request $request)
    {
        $ip = $request->getClientIp(true);
        $visitors = new Visitors();

        if (!$request->session()->has('person')) {
            $request->session()->put('person', $ip);
            $visitors->ip_address = $ip;
            $visitors->save();
        }

        $cektablesurvey = SurveiWebsite::where('ip_address', $ip)->count();
        $hasilsurvery = $cektablesurvey;

        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['slider'] = Slider::orderBy('orders', 'asc')->whereActive(1)->get();
        $data['videos'] = Video::orderBy('id', 'desc')->where('status', '1')->take(2)->get();
        $data['data_documents'] = DataDocument::orderBy('id', 'desc')->take(5)->get();
        $data['data_pengendalianevaluasis'] = DataPengendalianevaluasi::orderBy('id', 'desc')->take(5)->get();
        $data['data_paparans'] = DataPaparan::orderBy('id', 'desc')->take(5)->get();
        $data['data_centers'] = DataCenter::orderBy('id', 'desc')->take(5)->get();
        $data['post_news'] = Post::orderBy('published_at', 'desc')->orderBy('title', 'asc')->where('image', '!=', null)->where('category_id', 2)->where('status', '1')->take(3)->get();
        $data['post_news2'] = Post::orderBy('published_at', 'desc')->orderBy('title', 'asc')->where('image', '!=', null)->where('category_id', 2)->where('status', '1')->skip(3)->take(3)->get();
        $data['berita_nasional'] = Post::orderBy('published_at', 'desc')->orderBy('title', 'asc')->where('image', '!=', null)->where('category_id', 6)->where('status', '1')->take(6)->get();
        $data['penghargaan'] = Penghargaan::orderBy('id', 'desc')->get();
        $data['peta'] = Map::orderBy('id', 'desc')->get();
        // $data['kinerja_pembangunan_big'] = Post::orderBy('id','desc')->where('category_id',5)->where('image','!=',null)->first();
        // $data['kinerja_pembangunan'] = Post::orderBy('id','desc')->where('category_id',5)->where('image','!=',null)->skip(1)->take(3)->get();   
        // $data['berita_foto'] = AlbumFoto::orderBy('id','desc')->take('4')->get();
        $data['agendas'] = Agenda::orderBy('id', 'desc')->get();
        $tanggal_now = date('Y-m-d');
        $data['agendahariini'] = DB::select("SELECT * FROM agendas WHERE DATE(schedule) = '$tanggal_now' ORDER BY schedule,caption ASC");
        return view('content.headerbaru', $data)->with(compact('hasilsurvery'));
    }

    public function allagenda()
    {
        $agendas = Agenda::orderBy('id', 'desc')->get();
        $test = [];
        foreach ($agendas as $show) {
            $test[] = [
                'id' => $show->id,
                'title' => $show->caption,
                'start' => str_replace(' ', 'T', $show->schedule)
            ];
        }
        return response()->json($test);
    }

    public function kliktanggal($slug)
    {
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        $date = date('Y-m-d', strtotime($slug . '+1 day'));
        $data['querynya'] = DB::select("SELECT * FROM agendas WHERE DATE(schedule) = '$date' ORDER BY schedule,caption ASC");
        $data['tanggalnya'] = $date;
        return view('content.kliktanggal', $data);
    }

    public function klikevent($slug)
    {
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        $data['agendawhere'] = Agenda::where('id', $slug)->first();
        return view('content.klikevent', $data);
    }

    public function testinputdatasurvei(Request $request)
    {
        $ip = $request->getClientIp(true);
        $visitors = new Visitors();
        // return $ip;
        // exit;
        if (!$request->session()->has('person')) {
            $request->session()->put('person', $ip);
            $visitors->ip_address = $ip;
            $visitors->save();
        }

        $cektablesurvey = SurveiWebsite::where('ip_address', $ip)->count();
        $hasilsurvery = $cektablesurvey;

        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        return view('content.testinputdatasurvei', $data)->with(compact('hasilsurvery'));
    }

    public function agendaprevnext($slug)
    {
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        $data['querynya'] = DB::select("SELECT * FROM agendas WHERE DATE(schedule) = '$slug' ORDER BY schedule,caption ASC");
        $data['tanggalnya'] = $slug;
        return view('content.agendaprevnext', $data);
    }

    public function ProsesInputDataSurvei(Request $request)
    {
        $ip = $request->getClientIp(true);
        $visitors = new Visitors();

        if (!$request->session()->has('person')) {
            $request->session()->put('person', $ip);
            $visitors->ip_address = $ip;
            $visitors->save();
        }

        $messages = [
            'required' => ':attribute Harus diisi!!!',
            'min' => ':attribute harus diisi minimal 5 karakter!!!'
        ];
        $this->validate($request, [
            'nama_survei' => 'required',
            'alamat_survei' => 'required',
            'pekerjaan_survei' => 'required',
            'email_survei' => 'required',
            'pertanyaan1' => 'required',
            'pertanyaan2' => 'required',
            'pertanyaan3' => 'required',
            'pertanyaan4' => 'required',
            'pertanyaan5' => 'required',
            'masukansaran' => 'required',
        ], $messages);

        $querytest = DB::table('survei_websites')->insert([
            'nama_survei' => $request->nama_survei,
            'alamat_survei' => $request->alamat_survei,
            'pekerjaan_survei' => $request->pekerjaan_survei,
            'email_survei' => $request->email_survei,
            'jawaban1' => $request->pertanyaan1,
            'jawaban2' => $request->pertanyaan2,
            'jawaban3' => $request->pertanyaan3,
            'jawaban4' => $request->pertanyaan4,
            'jawaban5' => $request->pertanyaan5,
            'masukansaran' => $request->masukansaran,
            'ip_address' => $ip,
            'created_at' =>  \Carbon\Carbon::now(),
        ]);
        Session::flash('sukses', 'Terimakasih atas Survei anda');
        return redirect('/beranda');
    }

    public function detailPost()
    {
    }

    public function detailCategory()
    {
    }
}
