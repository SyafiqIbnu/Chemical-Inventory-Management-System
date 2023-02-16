@component('layouts.components.edit_two_column',['for' => 'pickup_date','required' => '1','label'=>__('order.pickup_date')]) @slot('field')
        {!! Form::text('pickup_date',null,['class'=>'form-control','required','placeholder'=>__('order.pickup_date_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'linked_user','required' => '1','label'=>__('order.linked_user')]) @slot('field')
        {!! Form::text('linked_user',null,['class'=>'form-control','required','placeholder'=>__('order.linked_user_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'link_used','required' => '1','label'=>__('order.link_used')]) @slot('field')
        {!! Form::text('link_used',null,['class'=>'form-control','required','placeholder'=>__('order.link_used_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'status','required' => '1','label'=>__('order.status')]) @slot('field')
        {!! Form::text('status',null,['class'=>'form-control','required','placeholder'=>__('order.status_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'totalamount','required' => '1','label'=>__('order.totalamount')]) @slot('field')
        {!! Form::text('totalamount',null,['class'=>'form-control','required','placeholder'=>__('order.totalamount_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'submitted_at','required' => '1','label'=>__('order.submitted_at')]) @slot('field')
        {!! Form::text('submitted_at',null,['class'=>'form-control','required','placeholder'=>__('order.submitted_at_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'submitted_by','required' => '1','label'=>__('order.submitted_by')]) @slot('field')
        {!! Form::text('submitted_by',null,['class'=>'form-control','required','placeholder'=>__('order.submitted_by_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'checked_at','required' => '1','label'=>__('order.checked_at')]) @slot('field')
        {!! Form::text('checked_at',null,['class'=>'form-control','required','placeholder'=>__('order.checked_at_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'checked_by','required' => '1','label'=>__('order.checked_by')]) @slot('field')
        {!! Form::text('checked_by',null,['class'=>'form-control','required','placeholder'=>__('order.checked_by_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'approved_at','required' => '1','label'=>__('order.approved_at')]) @slot('field')
        {!! Form::text('approved_at',null,['class'=>'form-control','required','placeholder'=>__('order.approved_at_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'approved_by','required' => '1','label'=>__('order.approved_by')]) @slot('field')
        {!! Form::text('approved_by',null,['class'=>'form-control','required','placeholder'=>__('order.approved_by_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'received_at','required' => '1','label'=>__('order.received_at')]) @slot('field')
        {!! Form::text('received_at',null,['class'=>'form-control','required','placeholder'=>__('order.received_at_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'received_by','required' => '1','label'=>__('order.received_by')]) @slot('field')
        {!! Form::text('received_by',null,['class'=>'form-control','required','placeholder'=>__('order.received_by_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
