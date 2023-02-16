@component('layouts.components.edit_two_column',['for' => 'product_type','required' => '1','label'=>__('product.product_type')]) @slot('field')
        {!! Form::text('product_type',null,['class'=>'form-control','required','placeholder'=>__('product.product_type_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'product_category','required' => '1','label'=>__('product.product_category')]) @slot('field')
        {!! Form::text('product_category',null,['class'=>'form-control','required','placeholder'=>__('product.product_category_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('product.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('product.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'price','required' => '1','label'=>__('product.price')]) @slot('field')
        {!! Form::text('price',null,['class'=>'form-control','required','placeholder'=>__('product.price_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'description','required' => '1','label'=>__('product.description')]) @slot('field')
        {!! Form::text('description',null,['class'=>'form-control','required','placeholder'=>__('product.description_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'image','required' => '1','label'=>__('product.image')]) @slot('field')
        {!! Form::text('image',null,['class'=>'form-control','required','placeholder'=>__('product.image_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'image_path','required' => '1','label'=>__('product.image_path')]) @slot('field')
        {!! Form::text('image_path',null,['class'=>'form-control','required','placeholder'=>__('product.image_path_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'pax_no','required' => '1','label'=>__('product.pax_no')]) @slot('field')
        {!! Form::text('pax_no',null,['class'=>'form-control','required','placeholder'=>__('product.pax_no_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'active','required' => '1','label'=>__('product.active')]) @slot('field')
        {!! Form::text('active',null,['class'=>'form-control','required','placeholder'=>__('product.active_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
