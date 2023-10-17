@foreach($items as $item)
@if($item->children->count())
                                <li class="menu-item kode-parent-menu"><a href="{{ $item->link() }}">{{ $item->title }}</a>
                                        <ul class="dl-submenu">
                                        @foreach($item->children as $subItem)
                                        <li><a target="{{ $subItem->target }}" href="{{ url($subItem->url) }}">{{ $subItem->title }}</a></li>
                                        @endforeach
                                        </ul>
                                </li>      
                            @else
                            <li><a href="{{ $item->link() }}">{{ $item->title }}</a></li>
                            @endif
                        @endforeach