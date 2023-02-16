@php
    $route=\App\Helpers\AppHelper::getCurrentBaseRoute();
    //dd($route);
@endphp

@if($route=="profile")
    @include('shared.profile_tabs')
@else
    @include('shared.staff_tabs')
@endif