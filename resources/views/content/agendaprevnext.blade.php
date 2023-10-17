<div class="prevnext_agendabutton">
    <button class="agenda-prev-button agendabutton" id="agenda-prev" data-tanggal="{{ date('Y-m-d', strtotime($tanggalnya .'-1 day')) }}" type="button">
        <span class="fc-icon fc-icon-chevron-left"></span>
    </button>
    <button class="agenda-next-button agendabutton" id="agenda-next" data-tanggal="{{ date('Y-m-d', strtotime($tanggalnya .'+1 day')) }}" type="button">
        <span class="fc-icon fc-icon-chevron-right"></span>
    </button>
</div>
@if(!empty($querynya))
<div class="panel panel-default">
    <div class="panel-heading text-center">
        {{ Myhelpers::tglind($tanggalnya) }}
    </div>
</div>
@foreach ($querynya as $data)
<div class="panel panel-default">
    <div class="panel-heading text-center">
        {{ $data->caption }}
    </div>
    <ul class="list-group">
        <li class="list-group-item">Jam : {{ $data->times }}</li>
        <li class="list-group-item">Tempat : {{ $data->location }}</li>
        @if($data->description != '')
        <li class="list-group-item">Dihadiri : {{ $data->description }}</li>
        @else
        <li class="list-group-item">Dihadiri : -</li>
        @endif
    </ul>
    {{-- <div class="panel-footer text-center">{{ Myhelpers::tglind($data->schedule) }}, Jam : {{ $data->times }}</div> --}}
</div>
@endforeach
@else
<div class="panel panel-default">
    <div class="panel-heading text-center">
        {{ Myhelpers::tglind($tanggalnya) }}
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading text-center">
        Tidak ada Agenda
    </div>
</div>
@endif