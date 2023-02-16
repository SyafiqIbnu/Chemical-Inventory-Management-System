@extends('portal.login')

@section('main-content')
    <div class="card-body">
        @include('layouts.components.session_message')
        <form method="POST" action="{{ route('login') }}" id="login-form" style="display: block;">
            @csrf
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope" style="color:white;"></i></span>
                </div>
				<input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus="autofocus" placeholder="{{ __('Email') }}">
                @if ($errors->has('my_kad'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('my_kad') }}</strong>
                </span>
                @endif
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key" style="color:white;"></i></span>
                </div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus="autofocus" placeholder="{{ __('Password') }}">
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <div class="row align-items-center remember">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
            </div>
            <div class="form-group">       
				<button type="submit" class="button">{{ __('Log In') }}</button>        
            </div>
            
            
        </form>
        {{-- <div class="form-group">       
				<button onclick="window.location='{{ URL::route('user.create_customer') }}'" type="submit" class="button">{{ __('Register') }}</button>        
        </div>
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
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>				
            </div>
            
        </form>         --}}

    </div>
    <div class="card-footer">
        @include('auth.password_footer')
    </div>

    @push('scripts')
        <script>
            $(document).ready(function()
                  {
                  var sessionData =
                  {
                     sessionid: 0,
                     expires: 0
                  };

                  $("#loginBtn").click(function(event)
                  {
                     var username = "testnew";
                     var password = "testnew";

                     var formData = 
                                 
                     
                     {
                        username: username,
                        password: password
                     };
                     

                    
                     $.ajax(
                     {
                        method: "POST",
                        url: "http://factohubdemo.azurewebsites.net/api/web/login",
                        data: formData,
                        contentType: "application/x-www-form-urlencoded",
                        dataType: "json",
                        success: function(data)
                        {
                            //store dalam user table
							var sessionid=data.sessionid;
							var expires=data.expires;
							$("#sessionid").val=data.sessionid;
							$("#expires").val=data.expires;
							alert("Successful. sessionid=" + data.sessionid + " and expires=" + data.expires);
							
								
								
                        },
						
                        error: function(error)
                        {
                        alert("Failed.");
                        },
                        processData: true
                     });
                  });

                  
                  });
                     
        </script>
@endpush
@endsection