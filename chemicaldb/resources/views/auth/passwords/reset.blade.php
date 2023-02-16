@extends('layouts.app_login')

@section('main-content')
    <div class="card-header">
            <div class="col-sm-12">
                <div class="d-flex justify-content-center links"><center><h5>{{ __('Reset Password') }}</h5><center></div>
            </div>
    </div>
    <div class="card-body">
        @include('layouts.components.session_message')
        <form method="POST"action="{{ route('password.update') }}" id="login-form" style="display: block;">
            @csrf
			 <input type="hidden" name="token" value="{{ $token }}">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
				<input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus="autofocus" placeholder="{{ __('E-Mail Address') }}">
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
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus="autofocus" placeholder="{{ __('Password') }}">
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

			 <div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary">
						{{ __('Reset Password') }}
					</button>
				</div>
			</div>
        </form>



       
    </div>
    <div class="card-footer">
        @include('auth.password_footer')
    </div>
    @push('scripts')
        
    @endpush
@endsection