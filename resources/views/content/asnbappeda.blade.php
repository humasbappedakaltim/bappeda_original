@extends('layouts.master')
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h4 class="text-white">{{$title}}</h4>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">{{$title}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="city_blog2_wrap " style="padding-top: 20px; padding-bottom:20px; margin-bottom: 90px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <p style="text-align: center;font-size: 25px;margin-bottom: 15px;font-weight: bold;">Pejabat ASN BAPPEDA Prov. Kaltim</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="5%">Foto</th>
                                <th>Nama / Golongan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pejabat as $pe)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center"><img class="img-rounded" src="{{asset('storage/'.$pe->foto_second)}}" alt="Foto {{$pe->nama}}" style="width: 140px; height: 150px; max-width: none; max-height: none;"></td>
                                {{-- <td><b>{{$pe->nip}}</b><br><b>{{$pe->nama}}</b><br>Pangkat/Golongan : {{Myhelpers::pangkatasn($pe->golongan)}}<br>Jabatan : {{$pe->jabatan}}<br>Kelas Jabatan : {{$pe->kelas_jabatan}}</td> --}}
                                {{-- diatas beserta nip --}}
                                <td><b>{{$pe->nama}}</b><br>Pangkat/Golongan : {{Myhelpers::pangkatasn($pe->golongan)}}<br>Jabatan : {{$pe->jabatan}}<br>Kelas Jabatan : {{$pe->kelas_jabatan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <p style="text-align: center;font-size: 25px;margin-bottom: 15px;font-weight: bold;">ASN BAPPEDA Prov. Kaltim</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="5%">Foto</th>
                                <th>Nama / Golongan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawaiasn as $dataasn)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center"><img class="img-rounded" src="{{asset('storage/'.$dataasn->foto_second)}}" alt="Foto {{$dataasn->nama}}" style="width: 140px; height: 150px; max-width: none; max-height: none;"></td>
                                <td><b>{{$dataasn->nip}}</b><br><b>{{$dataasn->nama}}</b><br>Pangkat/Golongan : {{Myhelpers::pangkatasn($dataasn->golongan)}}<br>Jabatan : {{$dataasn->jabatan}}<br>Kelas Jabatan : {{$dataasn->kelas_jabatan}}</td>
                                {{-- diatas beserta nip --}}
                                {{-- <td><b>{{$dataasn->nama}}</b><br>Pangkat/Golongan : {{Myhelpers::pangkatasn($dataasn->golongan)}}<br>Jabatan : {{$dataasn->jabatan}}<br>Kelas Jabatan : {{$dataasn->kelas_jabatan}}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>					
    </div>
</div>
@endsection