<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Request;

use App\Models\CategoryPpid;
use App\Models\DataDocument;
use App\Models\DataCenter;
use App\Models\DataPengendalianevaluasi;
use App\Models\DataPaparan;

class PpidDataCenterController extends BaseController
{
    public function index(){


        $dataDocument = DataDocument::where('category_information', Request::get('category'))->get();
        $groupDocument = $dataDocument->groupBy('category.name')->mapWithKeys(function ($item, $key) {
            return [$key => [
                'data' => $item->transform(fn($doc) => [
                    'id' => $doc->id,
                    'nama_data' => $doc->title,
                    'file_data' => $doc->file_documents
                ])
            ]];
        })->toArray();
        // return $groupDocument;

        $dataPengendalian = DataPengendalianevaluasi::where('category_information', Request::get('category'))->get();
        $groupPengendalian = $dataPengendalian->groupBy('category.nama_kategori')->mapWithKeys(function ($item, $key) {
            return [
                $key => [
                    'data' => $item
                ]];
        })->toArray();

        $dataCenter = DataCenter::where('category_information', Request::get('category'))->get();
        $groupCenter = $dataCenter->groupBy('category.nama_kategori')->mapWithKeys(function ($item, $key) {
            return [$key => [
                'data' => $item
            ]];
        })->toArray();

        $dataPaparan = DataPaparan::where('category_information', Request::get('category'))->get();
        $groupPaparan = $dataPaparan->groupBy('category.nama_kategori')->mapWithKeys(function ($item, $key) {
            return [
                $key => [
                    'data' => $item
                ]];
        })->toArray();

        

        return $this->sendResponse([
            'perencanaan' => $groupDocument,
            'pengendalian' => $groupPengendalian,
            'paparan' => $groupPaparan,
            'lainnya' => $groupCenter,
        ]);
    }

}
