@foreach($items as $item)
<li class="foot-menu-item mbr-fonts-style display-7">
<a class="text-white" href="{{$item->url}}" target="{{$item->target}}">{{ $item->title }}</a>
</li>
@endforeach