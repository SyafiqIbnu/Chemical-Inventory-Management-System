@#extends('layouts.app')

@#section('page_title')
/{/{$title/}/}
@#endsection

@#section('page_description')
/{/{$title/}/}
@#endsection

@#section('breadcrumb')
    <li><a href="/{/{ url('/')/}/}"><i class="fa fa-gears"></i>/{/{__('general.home')/}/}</a></li>
    <li><a href="#">/{/{$title/}/}</a></li>
@#endsection

@#section('buttonBack')
    <div class='pull-left'>
        <button type="button" class="btn btn-danger" onClick="location.href ='javascript:history.back()'"><i class="fa fa-undo"></i> /{/{__('general.back')/}/}</button>
    </div>
@#endsection

@#section('main-content')
    @#include('layouts.components.session_message')
    
    @#component('layouts.components.tab',['id'=>'{{$name}}']) 
        @#push('{{$name}}_nav')
            @#component('layouts.components.tab_nav',['id'=>'detail','idEdit'=>'detail_edit','permission'=>'edit_functional_{{$name}}','class'=>'active','title'=>'Details']) @#endcomponent
        @#endpush @#push('{{$name}}_content')
            @#component('layouts.components.tab_content',['id'=>'detail','class'=>'active']) @#slot('content')
                <div class='box-body'>
                    @#include('{{$name}}.show_form')
                </div>
                <div class='box-footer'>
                    @#yield('buttonBack')
                </div>
            @#endslot @#endcomponent
            @#if(Auth::user()->can('edit_functional_{{$name}}'))
                @#component('layouts.components.tab_content',['id'=>'detail_edit','class'=>'']) @#slot('content')
                    <div class='box-body'>
                        /{!! Form::model($model{{$modelName}}, ['route' => ['{{$name}}.update', $model{{$modelName}}->getKey()],'method'=>'PUT']) !!/}
                        @#include('{{$name}}.edit_form')
                        /{!! Form::hidden('urlReturn','#detail') !!/}
                    </div>
                    <div class='box-footer'>
                        @#if(Auth::user()->can('edit_functional_{{$name}}'))
                            <div class='pull-right'>
                                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o">&nbsp;Save</i></button>
                            </div>
                        @#endif
                        /{!! Form::close() !!/}
                        @#yield('buttonBack')
                    </div>
                @#endslot @#endcomponent
            @#endif
        @#endpush
    @#endcomponent
@#endsection