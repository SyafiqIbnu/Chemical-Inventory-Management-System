@component('layouts.components.edit_two_column',['for' => 'title','required' => '1','label'=>__('announcement.title')]) @slot('field')
        {!! Form::text('title',null,['class'=>'form-control','required','placeholder'=>__('announcement.title_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'content','required' => '1','label'=>__('announcement.content')]) @slot('field')
        {!! Form::text('content',null,['class'=>'form-control','required','placeholder'=>__('announcement.content_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'active','required' => '1','label'=>__('announcement.active')]) @slot('field')
        {!! Form::text('active',null,['class'=>'form-control','required','placeholder'=>__('announcement.active_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
