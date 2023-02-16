<!-- <div class="d-flex justify-content-center links">
	<a href="{{url('/')}}"><i class="fas fa-home" style="font-size: 12px;"></i> Home</a>
</div> -->


@if (Route::has('password.request'))
<div class="d-flex justify-content-center links">
{{ __('Forgot Your Password?') }}<a href="{{ route('password.request') }}">Reset</a>
</div>
@endif 

{{--
<div class="d-flex justify-content-center links">
	Don't have an account?<a href="{{url('/register')}}">Sign Up</a>
</div>

<div class="d-flex justify-content-center links">
	Get User Manual <a href="{{url('/user_manual.pdf')}}">Here</a>
</div>

<div class="d-flex justify-content-center links">
	Download Mobile Apps <a href="{{url('/mokats.apk')}}">Here</a>
</div>
--}}