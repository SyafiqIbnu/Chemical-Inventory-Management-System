@if($errors->any())
<div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
</div>
@endif
@if(Session::has('success'))
    <p id="successMessage" class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
	<script>
	$(".alert").fadeTo(5000, 500).slideUp(500, function(){
		$(".alert").slideUp(500);
	});
	</script>
@endif
@if(Session::has('warning'))
    <p id="successMessage" class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('warning') }}</p>
@endif
@if(Session::has('error'))
    <p id="successMessage" class="alert {{ Session::get('alert-class', 'alert-danger') }}">{!! Session::get('error') !!}</p>
@endif
@if(Session::has('validator-error'))
    <p id="successMessage" class="alert {{ Session::get('alert-class', 'alert-danger') }}">
        @foreach (Session::get('validator-error')->all() as $error)
            {!! $error !!}<br>
        @endforeach
    </p>
@endif