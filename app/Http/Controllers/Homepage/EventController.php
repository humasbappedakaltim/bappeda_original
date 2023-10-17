<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Agenda;
use App\Models\Pejabat;
use App\Models\Visitors;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $data['title'] = "Agenda";
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $agenda = Agenda::orderBy('id', 'desc')->paginate(5);
        $data['agenda'] = $agenda;
        if ($agenda) {
            // $data['agenda_terkini'] = Agenda::orderBy('schedule','desc')->take(5)->get();
            $tanggal_now = date('Y-m-d');
            $data['agendahariini'] = DB::select("SELECT * FROM agendas WHERE DATE(schedule) = '$tanggal_now' ORDER BY schedule,caption ASC");
            return view('content.event', $data);
        } else {
            return view('error-404');
        }
    }

    public function agendabidang($bidang)
    {
        $tanggal_now = date('Y-m-d');
        DB::enableQueryLog();
        if ($bidang == 'p2epd') {
            $bidangnya = 'Bidang Perencanaan, Pengendalian dan Evaluasi Pembangunan Daerah';
            $id_bidangnya = 2;
            $agenda = Agenda::whereDate('schedule', '=', $tanggal_now)
            ->where(function($query){
                $query->orWhere('description', 'LIKE', '%P2EPD%')
                ->orWhere('description', 'LIKE', '%Kabid%')
                ->orWhere('description', 'LIKE', '%Perencana Ahli Muda%');
            })->orderByRaw('schedule ASC, caption ASC')->get();
        } elseif ($bidang == 'ppm') {
            $bidangnya = 'Bidang Pemerintahan dan Pembangunan Manusia';
            $id_bidangnya = 3;
            $agenda = Agenda::whereDate('schedule', '=', $tanggal_now)
            ->where(function($query){
                $query->orWhere('description', 'LIKE', '%PPM%')
                ->orWhere('description', 'LIKE', '%Kabid%')
                ->orWhere('description', 'LIKE', '%Perencana Ahli Muda%');
            })->orderByRaw('schedule ASC, caption ASC')->get();
        } elseif ($bidang == 'ekonomi') {
            $bidangnya = 'Bidang Perekonomian dan Sumber Daya Alam';
            $id_bidangnya = 4;
            $agenda = Agenda::whereDate('schedule', '=', $tanggal_now)
            ->where(function($query){
                $query->orWhere('description', 'LIKE', '%Ekonomi%')
                ->orWhere('description', 'LIKE', '%Kabid%')
                ->orWhere('description', 'LIKE', '%Perencana Ahli Muda%');
            })->orderByRaw('schedule ASC, caption ASC')->get();
        } elseif ($bidang == 'infraswil') {
            $bidangnya = 'Bidang Infrastruktur dan Kewilayahan';
            $id_bidangnya = 5;
            $agenda = Agenda::whereDate('schedule', '=', $tanggal_now)
            ->where(function($query){
                $query->orWhere('description', 'LIKE', '%Infraswil%')
                ->orWhere('description', 'LIKE', '%Kabid%')
                ->orWhere('description', 'LIKE', '%Perencana Ahli Muda%');
            })->orderByRaw('schedule ASC, caption ASC')->get();
        } elseif ($bidang == 'umum') {
            $bidangnya = 'Sekretariat';
            $id_bidangnya = 1;
            $agenda = Agenda::whereDate('schedule', '=', $tanggal_now)
            ->where(function($query){
                $query->orWhere('description', 'LIKE', '%Sekretaris%')
                ->orWhere('description', 'LIKE', '%Kasubbag Umum%')
                ->orWhere('description', 'LIKE', '%Kasubbag Program%')
                ->orWhere('description', 'LIKE', '%Sekretariat%');
            })->orderByRaw('schedule ASC, caption ASC')->get();
        } elseif ($bidang == 'kepala') {
            $bidangnya = 'Kepala Bappeda';
            $id_bidangnya = 6;
            $agenda = Agenda::whereDate('schedule', '=', $tanggal_now)
            ->where(function($query){
                $query->orWhere('description', 'LIKE', '%Ka. Bappeda%')
                ->orWhere('description', 'LIKE', '%Plt. Asisten 2%');
            })->orderByRaw('schedule ASC, caption ASC')->get();
        }

        $data['title'] = "Agenda " . $bidangnya;
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['agenda'] = $agenda;
        $data['pejabat'] = Pejabat::where('status_pns', 'Pejabat')->where('bidang_id', $id_bidangnya)->get();

        if ($agenda) {
            return view('content.agendabidang', $data);
        } else {
            return view('error-404');
        }
    }

    public function agendaruangrapat($rapat)
    {
        if ($rapat == 'repetada') {
            $rapatnya = 'Repetada';
        } elseif ($rapat == 'propeda') {
            $rapatnya = 'Propeda';
        } elseif ($rapat == 'poldas') {
            $rapatnya = 'Poldas';
        } elseif ($rapat == 'gscc') {
            $rapatnya = 'GSCC';
        } elseif ($rapat == 'renja') {
            $rapatnya = 'Renja';
        } elseif ($rapat == 'renstra') {
            $rapatnya = 'Renstra';
        }

        $data['title'] = "Agenda Ruang " . $rapatnya;
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $tanggal_now = date('Y-m-d');
        $agenda = Agenda::where('location', 'LIKE', '%' . $rapat . '%')->whereDate('schedule', $tanggal_now)->orderByRaw('schedule ASC, caption ASC')->get();
        $data['agenda'] = $agenda;

        if ($agenda) {
            return view('content.agendaruangrapat', $data);
        } else {
            return view('error-404');
        }
    }

    public function searchEvent(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'required|regex:/^[a-zA-Z]+$/u|max:150',
        ]);
        $data['title'] = 'Pencarian Agenda';
        $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        if ($request->has('keyword')) {
            $agendas = Agenda::orderBy('id', 'desc')->where("caption", 'like', '%' . $request->keyword . '%')->get();
            $data['agendas'] = $agendas;
            // $data['agenda_terkini'] = Agenda::orderBy('schedule','desc')->take(5)->get();
            $tanggal_now = date('Y-m-d');
            $data['agendahariini'] = DB::select("SELECT * FROM agendas WHERE DATE(schedule) = '$tanggal_now' ORDER BY schedule,caption ASC");
            if ($agendas) {
                return view('content.search_event', $data);
            } else {
                return view('error-404');
            }
        } else {
            return view('error-404');
        }
    }

    public function clickEvent(Request $request)
    {
        if ($request->like) {
            DB::table('agendas')->increment('views', 1);
            return true;
        } else {
            return false;
        }
    }
}
