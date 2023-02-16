@extends('layouts.app_login')

@section('main-content')
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-center links"><center><h5>New Registration</h5><center></div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @include('layouts.components.session_message')
        <form method="POST" action="{{ route('register') }}" style="display: block;" autocomplete="off">
            @csrf

			<div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
				<input autocomplete="off" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus="autofocus" placeholder="{{ __('general.name') }}">
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
				<input autocomplete="off" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus="autofocus" placeholder="{{ __('general.email') }}">
                @if ($errors->has('my_kad'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('my_kad') }}</strong>
                </span>
                @endif
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus="autofocus" placeholder="{{ __('general.password') }}">
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif				
            </div>

			<div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus="autofocus" placeholder="{{ __('general.password_confirmation') }}">
				@if ($errors->has('password-confirm'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password-confirm') }}</strong>
                </span>
                @endif				
            </div>

			<div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                </div>
                <input id="mykad" type="text" class="form-control{{ $errors->has('mykad') ? ' is-invalid' : '' }}" maxlength="15" name="mykad" required autofocus="autofocus" placeholder="MyKad">
                @if ($errors->has('mykad'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mykad') }}</strong>
                </span>
                @endif				
            </div>

			<div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" maxlength="15" name="phone" required autofocus="autofocus" placeholder="{{ __('general.phone') }}">
                @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif				
            </div>

            <div class="form-group">       
				<button type="submit" class="btn btn-block btn-info">{{ __('Register') }}</button>        
            </div>
        </form>

        <form method="POST" action="{{ route('password.email') }}" id="register-form" style="display: none;">
            @csrf
            <div class="input-group form-group">
                <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}">
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
    <div class="card-footer">
         @include('auth.password_footer')
    </div>
    @push('scripts')
        
    @endpush
@endsection