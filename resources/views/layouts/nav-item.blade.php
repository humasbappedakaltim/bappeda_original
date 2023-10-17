@foreach($items as $item)
@if($item->children->count())
                                <li><a href="{{ $item->link() }}">{{ $item->title }} </a> <i class="fa fa-angle-down fa-white"></i>
                                        <ul class="child">
                                        @foreach($item->children as $subItem)
                                        <li><a target="{{ $subItem->target }}" href="{{ url($subItem->url) }}">{{ $subItem->title }}</a></li>
                                        @endforeach
                                        </ul>
                                </li>      
                            @else
                            <li><a href="{{ $item->link() }}">{{ $item->title }}</a></li>
                            @endif
                        @endforeach