@php
	$bShow=App\Helpers\PermissionHelper::checkMenuPermission($permission);
@endphp


@if($bShow)
    @if(Request()->session()->get('platform') == 'mobile')
            <li class="nav-item">
                <a href="{{ $url }}" class="nav-link" id="{{ $id }}">
                    <i class="{{ $icon }} nav-icon"></i>
                    <p>{{ $title }}</p>
                </a>
            </li>
    @else
        <li id="{{ $id ?? null}}">
            <a href="{{ $url ?? null}}"><span style="display:inline-table;"><i class="{{ $icon ?? null}}"></i><span style="padding-left:10px;padding-right:25px;white-space:normal;display:table-cell;">{{ $title ?? null}}</span></span>
                @if(isset($counter))
                    <span class="pull-right-container"><span class="label label-{{$color ?? null}} pull-right">
                        {{ $counter ?? null}}
                    </span></span>
                @endif
            </a>
        </li>
    @endif
@endif