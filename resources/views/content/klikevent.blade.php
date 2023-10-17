<form>
    <div class="form-group">
        <label>Nama Agenda</label>
        <textarea id="nama_agenda" class="form-control" rows="5" disabled>{{ $agendawhere->caption }}</textarea>
    </div>
    <div class="form-group">
        <label>Tempat</label>
        <input id="tempat_agenda" type="text" class="form-control" disabled value="{{ $agendawhere->location }}
        ">
    </div>
    <div class="form-group">
        <label>Dihadiri</label>
        @if($agendawhere->description != '')
        <input id="tempat_agenda" type="text" class="form-control" disabled value="{{ $agendawhere->description }}">
        @else
        <input id="tempat_agenda" type="text" class="form-control" disabled value="-">
        @endif
    </div>
    <div class="form-group">
        <label>Tanggal & Jam</label>
        <input id="tempat_agenda" type="text" class="form-control" disabled value="{{ Myhelpers::tglind($agendawhere->schedule) }}, Jam : {{ $agendawhere->times }}">
    </div>
</form>