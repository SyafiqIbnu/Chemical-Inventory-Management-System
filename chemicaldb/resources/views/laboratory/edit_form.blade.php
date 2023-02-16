@component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('laboratory.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('laboratory.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'location','required' => '1','label'=>__('laboratory.location')]) @slot('field')
        {!! Form::text('location',null,['class'=>'form-control','required','placeholder'=>__('laboratory.location_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'code','required' => '1','label'=>__('laboratory.code')]) @slot('field')
        {!! Form::text('code',null,['class'=>'form-control','required','placeholder'=>__('laboratory.code_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'faculty','required' => '1','label'=>__('laboratory.faculty')]) @slot('field')
        {!! Form::text('faculty',null,['class'=>'form-control','required','placeholder'=>__('laboratory.faculty_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'type','required' => '1','label'=>__('laboratory.type')]) @slot('field')
        {!! Form::text('type',null,['class'=>'form-control','required','placeholder'=>__('laboratory.type_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
