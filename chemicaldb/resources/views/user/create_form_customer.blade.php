
@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('user.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('user.name_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent


@component('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('user.email')]) 
@slot('field')
	{!! Form::text('email',null,['class'=>'form-control','required','placeholder'=>'','maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('user.phone')]) 
@slot('field')
	{!! Form::text('phone',null,['class'=>'form-control','required','placeholder'=>__('user.phone_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent



@if(Route::currentRouteName()=='user.create_customer')
	@component('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]) 
	@slot('field')
		<input id="password" type="password" class="form-control" name="password" required autofocus="autofocus" placeholder="{{__('user.password_placeholder')}}" maxlength="16">
	@endslot 
	@endcomponent


	@component('layouts.components.edit_modal_one_column',['for' => 'password_confirm','required' => '1','label'=>__('user.password_confirm')]) 
	@slot('field')
	<input id="password_confirm" type="password" class="form-control" name="password_confirm" required autofocus="autofocus" placeholder="{{__('user.password_confirm_placeholder')}}" maxlength="16">
	@endslot 
	@endcomponent
@endif





