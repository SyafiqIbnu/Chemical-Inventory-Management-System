@component('layouts.components.edit_two_column',['for' => 'code','required' => '1','label'=>__('branch.code')]) @slot('field')
        {!! Form::text('code',null,['class'=>'form-control','required','placeholder'=>__('branch.code_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('branch.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('branch.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'state_id','required' => '1','label'=>__('branch.state_id')]) @slot('field')
        {!! Form::text('state_id',null,['class'=>'form-control','required','placeholder'=>__('branch.state_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'shortname','required' => '1','label'=>__('branch.shortname')]) @slot('field')
        {!! Form::text('shortname',null,['class'=>'form-control','required','placeholder'=>__('branch.shortname_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'is_hq','required' => '1','label'=>__('branch.is_hq')]) @slot('field')
        {!! Form::text('is_hq',null,['class'=>'form-control','required','placeholder'=>__('branch.is_hq_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'addr1','required' => '1','label'=>__('branch.addr1')]) @slot('field')
        {!! Form::text('addr1',null,['class'=>'form-control','required','placeholder'=>__('branch.addr1_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'addr2','required' => '1','label'=>__('branch.addr2')]) @slot('field')
        {!! Form::text('addr2',null,['class'=>'form-control','required','placeholder'=>__('branch.addr2_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'addr3','required' => '1','label'=>__('branch.addr3')]) @slot('field')
        {!! Form::text('addr3',null,['class'=>'form-control','required','placeholder'=>__('branch.addr3_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'postcode','required' => '1','label'=>__('branch.postcode')]) @slot('field')
        {!! Form::text('postcode',null,['class'=>'form-control','required','placeholder'=>__('branch.postcode_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'city','required' => '1','label'=>__('branch.city')]) @slot('field')
        {!! Form::text('city',null,['class'=>'form-control','required','placeholder'=>__('branch.city_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'phone','required' => '1','label'=>__('branch.phone')]) @slot('field')
        {!! Form::text('phone',null,['class'=>'form-control','required','placeholder'=>__('branch.phone_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'fax','required' => '1','label'=>__('branch.fax')]) @slot('field')
        {!! Form::text('fax',null,['class'=>'form-control','required','placeholder'=>__('branch.fax_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'email','required' => '1','label'=>__('branch.email')]) @slot('field')
        {!! Form::text('email',null,['class'=>'form-control','required','placeholder'=>__('branch.email_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'active','required' => '1','label'=>__('branch.active')]) @slot('field')
        {!! Form::text('active',null,['class'=>'form-control','required','placeholder'=>__('branch.active_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
