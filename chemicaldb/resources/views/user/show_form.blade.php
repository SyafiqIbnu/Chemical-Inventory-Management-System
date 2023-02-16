@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('user.name')]) 
	@slot('field')
		{!! Form::text('name',$modelUser->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'uid','required' => '1','label'=>__('user.uid')]) 
	@slot('field')
		{!! Form::text('uid',$modelUser->uid,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('user.email')]) 
	@slot('field')
		{!! Form::text('email',$modelUser->email,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('user.phone')]) 
	@slot('field')
		{!! Form::text('phone',$modelUser->phone,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'role_id','required' => '1','label'=>__('user.role_id')]) 
	@slot('field')
		{!! Form::text('role_id',$modelUser->role_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'verified','required' => '1','label'=>__('user.verified')]) 
	@slot('field')
		{!! Form::text('verified',$modelUser->verified,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'email_verified_at','required' => '1','label'=>__('user.email_verified_at')]) 
	@slot('field')
		{!! Form::text('email_verified_at',$modelUser->email_verified_at,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]) 
	@slot('field')
		{!! Form::text('password',$modelUser->password,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'remember_token','required' => '1','label'=>__('user.remember_token')]) 
	@slot('field')
		{!! Form::text('remember_token',$modelUser->remember_token,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('user.active')]) 
	@slot('field')
		{!! Form::text('active',$modelUser->active,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'passwordmd5','required' => '1','label'=>__('user.passwordmd5')]) 
	@slot('field')
		{!! Form::text('passwordmd5',$modelUser->passwordmd5,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'is_admin','required' => '1','label'=>__('user.is_admin')]) 
	@slot('field')
		{!! Form::text('is_admin',$modelUser->is_admin,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'user_group_id','required' => '1','label'=>__('user.user_group_id')]) 
	@slot('field')
		{!! Form::text('user_group_id',$modelUser->user_group_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'password_change_at','required' => '1','label'=>__('user.password_change_at')]) 
	@slot('field')
		{!! Form::text('password_change_at',$modelUser->password_change_at,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'user_type_id','required' => '1','label'=>__('user.user_type_id')]) 
	@slot('field')
		{!! Form::text('user_type_id',$modelUser->user_type_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'google2fa_secret','required' => '1','label'=>__('user.google2fa_secret')]) 
	@slot('field')
		{!! Form::text('google2fa_secret',$modelUser->google2fa_secret,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'use2fa','required' => '1','label'=>__('user.use2fa')]) 
	@slot('field')
		{!! Form::text('use2fa',$modelUser->use2fa,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'xsessionid','required' => '1','label'=>__('user.xsessionid')]) 
	@slot('field')
		{!! Form::text('xsessionid',$modelUser->xsessionid,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'xexpires','required' => '1','label'=>__('user.xexpires')]) 
	@slot('field')
		{!! Form::text('xexpires',$modelUser->xexpires,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

