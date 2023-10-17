<div id="printArea" style="display: none;">
<h4 class="text-center">DAFTAR NOMINATIF TENAGA NON PNS<br />BADAN PERENCANAAN PEMBANGUNAN DAERAH PROVINSI KALIMANTAN TIMUR</h4>
<p class="text-center">Periode: Tanggal {{Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d F Y')}}<br />
Total : {{App\Models\Nonpns::count()}} Orang</p>
<table class="table table-bordered">
    <tr>
        <td width="20" class="text-center">No</td>
        <td width="150" class="text-center">Foto</td>
        <td class="text-center">Nama</td>
	<td class="text-center">Bidang</td>
	<td class="text-center">Sub Bidang</td>
	<td class="text-center">Jabatan</td>
	<td class="text-center">Pendidikan</td>
    </tr>
@php
$no = 1;    
@endphp
@foreach (App\Models\Nonpns::orderBy('id','asc')->get() as $p)
<tr>
    <td class="text-center">{{$no}}</td>
    <td class="text-center"><img src="{{asset('storage/'.$p->foto_non)}}" style="width:300px;height:150px;" alt="Foto"></td>
    <td>{{$p->nama_non}}</td>
	<td>{{$p->bidang}}</td>
	<td>{{$p->sub_bidang}}</td>
	<td>{{$p->jabatan}}</td>
	<td>{{$p->pendidikan}}</td>
</tr>
@php
$no++;    
@endphp
@endforeach

</table>
</div>