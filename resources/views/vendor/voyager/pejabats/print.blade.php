<div id="printArea" style="display: none;">
<h4 class="text-center">DAFTAR PEGAWAI NEGERI SIPIL (PNS)<br />BADAN PERENCANAAN PEMBANGUNAN DAERAH <br />BERDASARKAN DAFTAR URUT KEPANGKATAN (DUK)</h4>
<p class="text-center">Periode: Tanggal {{Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d F Y')}}<br />
Total : {{App\Models\Pejabat::count()}} Orang</p>
<table class="table table-bordered">
    <tr>
        <td width="20" class="text-center">No.</td>
        <td width="150" class="text-center">Foto</td>
        <td class="text-center">Nama/NIP/Golongan</td>
    </tr>
@foreach (App\Models\Pejabat::orderBy('id','asc')->take(21)->get() as $p)
@php
$gol = $p->golongan;
if($gol == '0') {
	$return_gol = '';
}elseif($gol == 'I/a') {
	$return_gol = 'Juru Muda (I/a)';
}elseif($gol == 'I/b') {
	$return_gol = 'Juru Muda Tingkat 1 (I/b)';
}elseif($gol == 'I/c') {
	$return_gol = 'Juru (I/c)';
}elseif($gol == 'I/d') {
	$return_gol = 'Juru Tingkat 1 (I/d)';
}elseif($gol == 'II/a') {
	$return_gol = 'Pengatur Muda (II/a)';
}elseif($gol == 'II/b') {
	$return_gol = 'Pengatur Muda Tingkat 1 (II/b)';
}elseif($gol == 'II/c') {
	$return_gol = 'Pengatur (II/c)';
}elseif($gol == 'II/d') {
	$return_gol = 'Pengatur Tingkat 1 (II/d)';
}elseif($gol == 'III/a') {
	$return_gol = 'Penata Muda (III/a)';
}elseif($gol == 'III/b') {
	$return_gol = 'Penata Muda Tingkat 1 (III/b)';
}elseif($gol == 'III/c') {
	$return_gol = 'Penata (III/c)';
}elseif($gol == 'III/d') {
	$return_gol = 'Penata Tingkat 1 (III/d)';
}elseif($gol == 'IV/a') {
	$return_gol = 'Pembina (IV/a)';
}elseif($gol == 'IV/b') {
	$return_gol = 'Pembina Tingkat 1 (IV/b)';
}elseif($gol == 'IV/c') {
	$return_gol = 'Pembina Utama Muda (IV/c)';
}elseif($gol == 'IV/d'){
	$return_gol = 'Pembina Utama Madya (IV/d)';
}elseif($gol == 'IV/e'){
	$return_gol = 'Pembina Utama (IV/e)';
}
@endphp
<tr>
    <td class="text-center">{{$loop->iteration}}</td>
    <td class="text-center"><img src="{{asset('storage/'.$p->foto_second)}}" alt="Foto"></td>
    <td>
        {{$p->nama}}<br />
        {{$p->nip}}<br />
        Pangkat/Golongan : {{$return_gol}}<br />
        Jabatan : {{$p->jabatan}}<br />
        Kelas jabatan : {{$p->kelas_jabatan}}
    </td>
</tr>
@endforeach
@php
$no = 22;    
@endphp
@foreach (App\Models\Pejabat::where('status_pns', '=', NULL)->orderBy('golongan','desc')->get() as $q)
@php
$gol2 = $q->golongan;
if($gol2 == '0') {
	$return_gol2 = '';
}elseif($gol2 == 'I/a') {
	$return_gol2 = 'Juru Muda (I/a)';
}elseif($gol2 == 'I/b') {
	$return_gol2 = 'Juru Muda Tingkat 1 (I/b)';
}elseif($gol2 == 'I/c') {
	$return_gol2 = 'Juru (I/c)';
}elseif($gol2 == 'I/d') {
	$return_gol2 = 'Juru Tingkat 1 (I/d)';
}elseif($gol2 == 'II/a') {
	$return_gol2 = 'Pengatur Muda (II/a)';
}elseif($gol2 == 'II/b') {
	$return_gol2 = 'Pengatur Muda Tingkat 1 (II/b)';
}elseif($gol2 == 'II/c') {
	$return_gol2 = 'Pengatur (II/c)';
}elseif($gol2 == 'II/d') {
	$return_gol2 = 'Pengatur Tingkat 1 (II/d)';
}elseif($gol2 == 'III/a') {
	$return_gol2 = 'Penata Muda (III/a)';
}elseif($gol2 == 'III/b') {
	$return_gol2 = 'Penata Muda Tingkat 1 (III/b)';
}elseif($gol2 == 'III/c') {
	$return_gol2 = 'Penata (III/c)';
}elseif($gol2 == 'III/d') {
	$return_gol2 = 'Penata Tingkat 1 (III/d)';
}elseif($gol2 == 'IV/a') {
	$return_gol2 = 'Pembina (IV/a)';
}elseif($gol2 == 'IV/b') {
	$return_gol2 = 'Pembina Tingkat 1 (IV/b)';
}elseif($gol2 == 'IV/c') {
	$return_gol2 = 'Pembina Utama Muda (IV/c)';
}elseif($gol2 == 'IV/d'){
	$return_gol2 = 'Pembina Utama Madya (IV/d)';
}elseif($gol2 == 'IV/e'){
	$return_gol2 = 'Pembina Utama (IV/e)';
}
@endphp
<tr>
    <td class="text-center">{{$no}}</td>
    <td class="text-center"><img src="{{asset('storage/'.$q->foto_second)}}" alt="Foto"></td>
    <td>
        {{$q->nama}}<br />
        {{$q->nip}}<br />
        Pangkat/Golongan : {{$return_gol2}}<br />
        Jabatan : {{$q->jabatan}}<br />
        Kelas jabatan : {{$q->kelas_jabatan}}
    </td>
</tr>
@php
$no++;    
@endphp

@endforeach

</table>
</div>