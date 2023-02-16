@foreach($filteredColumns as $col)
    @#component('layouts.components.edit_modal_one_column',['for' => '{{$col->COLUMN_NAME}}','required' => '1','label'=>__('{{$name}}.{{$col->COLUMN_NAME}}')]) @#slot('field')
        /{!! Form::text('{{$col->COLUMN_NAME}}',null,['class'=>'form-control','required','placeholder'=>__('{{$name}}.{{$col->COLUMN_NAME}}_placeholder'),'maxlength'=>254]) !!/}
    @#endslot @#endcomponent
@endforeach