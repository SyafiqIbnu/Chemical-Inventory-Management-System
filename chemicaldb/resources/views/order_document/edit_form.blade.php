@component('layouts.components.edit_two_column',['for' => 'order_id','required' => '1','label'=>__('order_document.order_id')]) @slot('field')
        {!! Form::text('order_id',null,['class'=>'form-control','required','placeholder'=>__('order_document.order_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('order_document.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('order_document.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'document_types_id','required' => '1','label'=>__('order_document.document_types_id')]) @slot('field')
        {!! Form::text('document_types_id',null,['class'=>'form-control','required','placeholder'=>__('order_document.document_types_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'path','required' => '1','label'=>__('order_document.path')]) @slot('field')
        {!! Form::text('path',null,['class'=>'form-control','required','placeholder'=>__('order_document.path_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'original_name','required' => '1','label'=>__('order_document.original_name')]) @slot('field')
        {!! Form::text('original_name',null,['class'=>'form-control','required','placeholder'=>__('order_document.original_name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'active','required' => '1','label'=>__('order_document.active')]) @slot('field')
        {!! Form::text('active',null,['class'=>'form-control','required','placeholder'=>__('order_document.active_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
