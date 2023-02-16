@#extends('layouts.app')

@#section('htmlheader_title')
/{/{__('{{$name}}.title')/}/}
@#endsection

@#section('contentheader_title')
/{/{__('{{$name}}.title')/}/}
@#endsection

@#section('main-content')
@#include('{{$name}}.header')
<div id="pjax-form-content">
	 <div class="col-xs-12 text-center">
		<div class="alert alert-success">
			<h4><i class="icon fa fa-check"></i> /{/{__('general.success')/}/}!</h4>
			/{/{__('general.record_updated')/}/}
        </div>
	</div>
	<br><br><br><br><br>
	<script>
	setTimeout(function()/{
		@#if($request->header('X-PJAX'))
		$('#myModal').modal('hide');
		pjax.invoke('/{/{url('{{$newpath}}/')/}/}','pjax-container');
		@#else
		location.href='/{/{url('{{$newpath}}/')/}/}';
		@#endif
	/}, 2000);
	</script>
</div>
@#endsection
