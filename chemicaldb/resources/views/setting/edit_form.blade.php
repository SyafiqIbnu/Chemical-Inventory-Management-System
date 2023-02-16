@component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('setting.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('setting.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'label','required' => '1','label'=>__('setting.label')]) @slot('field')
        {!! Form::text('label',null,['class'=>'form-control','required','placeholder'=>__('setting.label_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'value','required' => '1','label'=>__('setting.value')]) @slot('field')
        {!! Form::text('value',null,['class'=>'form-control','required','placeholder'=>__('setting.value_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'uitype','required' => '1','label'=>__('setting.uitype')]) @slot('field')
        {!! Form::text('uitype',null,['class'=>'form-control','required','placeholder'=>__('setting.uitype_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
