<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Page;
class SettingController extends BaseController
{
    public function socialMedia() {
        $social = DB::table('settings')
        ->where(
            ['key' => 'media-social.link_fb'],
        )->orWhere(
            ['key' => 'media-social.link_twitter']
        )->orWhere(
           ['key' => 'media-social.link_yb'],
        )->orWhere(
          ['key' => 'media-social.link_ig'],
        )->orWhere(
          ['key' => 'media-social.link_wa'],
        )->get();
        return $this->sendResponse($social);
    }
     public function profile() {
      $profile = Page::where('slug', 'profil-bappeda')->first();
      $visimisi = Page::where('slug', 'visi-dan-misi')->first();
      $struktur = Page::where('slug', 'struktur-organisasi')->first();
      $tupoksi = Page::where('slug', 'tupoksi-bappeda')->first();

      return $this->sendResponse([
        'profile' => $profile ?? null,
        'visimisi' => $visimisi ?? null,
        'struktur' => $struktur ?? null,
        'tupoksi' =>  $tupoksi ?? null
      ]);
    }
    public function profilePPID(){
      $hukumPPID = DB::table('post_ppids')->where('category_id', 1)->get();
      $sopPPID = DB::table('post_ppids')->where('category_id', 2)->get();

      $profile = Page::where('slug', 'profil-ppid')->first();
      $visimisi = Page::where('slug', 'visi-dan-misi-ppid')->first();
      $struktur = Page::where('slug', 'struktur-organisasi-ppid')->first();
      $dasarhukum = $hukumPPID;
      $maklumat = Page::where('slug', 'maklumat-pelayanan-ppid')->first();
      $sop = $sopPPID;
      $tatacara = Page::where('slug', 'tata-cara-ppid')->first();
      $tugasfungsi = Page::where('slug', 'tugas-dan-fungsi-ppid')->first();
      
      return $this->sendResponse([
        'profile' => $profile ?? null,
        'visimisi' => $visimisi ?? null,
        'struktur' => $struktur ?? null,
        'maklumat' => $maklumat ?? null,
        'tatacara' => $tatacara ?? null,
        'tugasfungsi' => $tugasfungsi ?? null,
        'dasarhukum' => $dasarhukum ?? null,
        'sop' => $sop ?? null,
      ]);
    }


}
