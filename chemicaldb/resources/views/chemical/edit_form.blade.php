@component('layouts.components.edit_two_column',['for' => 'laboratory_id','required' => '1','label'=>__('chemical.laboratory_id')]) @slot('field')
        {!! Form::text('laboratory_id',null,['class'=>'form-control','required','placeholder'=>__('chemical.laboratory_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'item_name','required' => '1','label'=>__('chemical.item_name')]) @slot('field')
        {!! Form::text('item_name',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'item_brand','required' => '1','label'=>__('chemical.item_brand')]) @slot('field')
        {!! Form::text('item_brand',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_brand_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'item_cas','required' => '1','label'=>__('chemical.item_cas')]) @slot('field')
        {!! Form::text('item_cas',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_cas_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'item_catalog','required' => '1','label'=>__('chemical.item_catalog')]) @slot('field')
        {!! Form::text('item_catalog',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_catalog_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'item_location','required' => '1','label'=>__('chemical.item_location')]) @slot('field')
        {!! Form::text('item_location',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_location_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'item_price','required' => '1','label'=>__('chemical.item_price')]) @slot('field')
        {!! Form::text('item_price',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_price_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'item_quantity','required' => '1','label'=>__('chemical.item_quantity')]) @slot('field')
        {!! Form::text('item_quantity',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_quantity_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'item_amount','required' => '1','label'=>__('chemical.item_amount')]) @slot('field')
        {!! Form::text('item_amount',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_amount_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'item_supplier','required' => '1','label'=>__('chemical.item_supplier')]) @slot('field')
        {!! Form::text('item_supplier',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_supplier_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'date_opened','required' => '1','label'=>__('chemical.date_opened')]) @slot('field')
        {!! Form::text('date_opened',null,['class'=>'form-control','required','placeholder'=>__('chemical.date_opened_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'expiration_date','required' => '1','label'=>__('chemical.expiration_date')]) @slot('field')
        {!! Form::text('expiration_date',null,['class'=>'form-control','required','placeholder'=>__('chemical.expiration_date_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'staff_id','required' => '1','label'=>__('chemical.staff_id')]) @slot('field')
        {!! Form::text('staff_id',null,['class'=>'form-control','required','placeholder'=>__('chemical.staff_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'item_sheet','required' => '1','label'=>__('chemical.item_sheet')]) @slot('field')
        {!! Form::text('item_sheet',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_sheet_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
