@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('user.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('user.name_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'uid','required' => '1','label'=>__('user.uid')]) 
@slot('field')
	{!! Form::text('uid',null,['class'=>'form-control','required','placeholder'=>__('user.uid_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('user.email')]) 
@slot('field')
	{!! Form::text('email',null,['class'=>'form-control','required','placeholder'=>__('user.email_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('user.phone')]) 
@slot('field')
	{!! Form::text('phone',null,['class'=>'form-control','required','placeholder'=>__('user.phone_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]) 
@slot('field')
	{!! Form::text('password',null,['class'=>'form-control','required','placeholder'=>__('user.password_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'passwordmd5','required' => '1','label'=>__('user.passwordmd5')]) 
@slot('field')
	{!! Form::text('passwordmd5',null,['class'=>'form-control','required','placeholder'=>__('user.passwordmd5_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'is_admin','required' => '1','label'=>__('user.is_admin')]) 
@slot('field')
	{!! Form::text('is_admin',null,['class'=>'form-control','required','placeholder'=>__('user.is_admin_placeholder')])  !!}
@endslot 
@endcomponent

