@extends('layouts.app_login')

@section('main-content')
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-center links"><center><h5>{{ __('Reset Password') }}</h5><center></div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @include('layouts.components.session_message')
        <form method="POST" action="{{ route('password.email') }}" id="login-form" style="display: block;">
            @csrf
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
				<input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus="autofocus" placeholder="{{ __('E-Mail Address') }}">
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="form-group">       
				<button type="submit" class="btn btn-block btn-info">{{ __('Submit') }}</button>        
            </div>
        </form>
    </div>
    <div class="card-footer">
         @include('auth.password_footer')
    </div>
    @push('scripts')
        
    @endpush
@endsection