@component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('user.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('user.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'uid','required' => '1','label'=>__('user.uid')]) @slot('field')
        {!! Form::text('uid',null,['class'=>'form-control','required','placeholder'=>__('user.uid_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'email','required' => '1','label'=>__('user.email')]) @slot('field')
        {!! Form::text('email',null,['class'=>'form-control','required','placeholder'=>__('user.email_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'phone','required' => '1','label'=>__('user.phone')]) @slot('field')
        {!! Form::text('phone',null,['class'=>'form-control','required','placeholder'=>__('user.phone_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'role_id','required' => '1','label'=>__('user.role_id')]) @slot('field')
        {!! Form::text('role_id',null,['class'=>'form-control','required','placeholder'=>__('user.role_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'verified','required' => '1','label'=>__('user.verified')]) @slot('field')
        {!! Form::text('verified',null,['class'=>'form-control','required','placeholder'=>__('user.verified_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'email_verified_at','required' => '1','label'=>__('user.email_verified_at')]) @slot('field')
        {!! Form::text('email_verified_at',null,['class'=>'form-control','required','placeholder'=>__('user.email_verified_at_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'password','required' => '1','label'=>__('user.password')]) @slot('field')
        {!! Form::text('password',null,['class'=>'form-control','required','placeholder'=>__('user.password_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'remember_token','required' => '1','label'=>__('user.remember_token')]) @slot('field')
        {!! Form::text('remember_token',null,['class'=>'form-control','required','placeholder'=>__('user.remember_token_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'active','required' => '1','label'=>__('user.active')]) @slot('field')
        {!! Form::text('active',null,['class'=>'form-control','required','placeholder'=>__('user.active_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'passwordmd5','required' => '1','label'=>__('user.passwordmd5')]) @slot('field')
        {!! Form::text('passwordmd5',null,['class'=>'form-control','required','placeholder'=>__('user.passwordmd5_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'is_admin','required' => '1','label'=>__('user.is_admin')]) @slot('field')
        {!! Form::text('is_admin',null,['class'=>'form-control','required','placeholder'=>__('user.is_admin_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'user_group_id','required' => '1','label'=>__('user.user_group_id')]) @slot('field')
        {!! Form::text('user_group_id',null,['class'=>'form-control','required','placeholder'=>__('user.user_group_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'password_change_at','required' => '1','label'=>__('user.password_change_at')]) @slot('field')
        {!! Form::text('password_change_at',null,['class'=>'form-control','required','placeholder'=>__('user.password_change_at_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'user_type_id','required' => '1','label'=>__('user.user_type_id')]) @slot('field')
        {!! Form::text('user_type_id',null,['class'=>'form-control','required','placeholder'=>__('user.user_type_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'google2fa_secret','required' => '1','label'=>__('user.google2fa_secret')]) @slot('field')
        {!! Form::text('google2fa_secret',null,['class'=>'form-control','required','placeholder'=>__('user.google2fa_secret_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'use2fa','required' => '1','label'=>__('user.use2fa')]) @slot('field')
        {!! Form::text('use2fa',null,['class'=>'form-control','required','placeholder'=>__('user.use2fa_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'xsessionid','required' => '1','label'=>__('user.xsessionid')]) @slot('field')
        {!! Form::text('xsessionid',null,['class'=>'form-control','required','placeholder'=>__('user.xsessionid_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'xexpires','required' => '1','label'=>__('user.xexpires')]) @slot('field')
        {!! Form::text('xexpires',null,['class'=>'form-control','required','placeholder'=>__('user.xexpires_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
