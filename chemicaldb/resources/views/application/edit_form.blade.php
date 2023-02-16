@component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('application.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('application.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'code','required' => '1','label'=>__('application.code')]) @slot('field')
        {!! Form::text('code',null,['class'=>'form-control','required','placeholder'=>__('application.code_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'icon','required' => '1','label'=>__('application.icon')]) @slot('field')
        {!! Form::text('icon',null,['class'=>'form-control','required','placeholder'=>__('application.icon_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'key','required' => '1','label'=>__('application.key')]) @slot('field')
        {!! Form::text('key',null,['class'=>'form-control','required','placeholder'=>__('application.key_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'target_url','required' => '1','label'=>__('application.target_url')]) @slot('field')
        {!! Form::text('target_url',null,['class'=>'form-control','required','placeholder'=>__('application.target_url_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'active','required' => '1','label'=>__('application.active')]) @slot('field')
        {!! Form::text('active',null,['class'=>'form-control','required','placeholder'=>__('application.active_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
