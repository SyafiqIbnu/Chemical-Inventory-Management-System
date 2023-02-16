<section class="content-header">
		<h1>
			@#yield('contentheader_title', '')
			<small>@#yield('contentheader_description')</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/{/{url('/home')/}/}"><i class="fa fa-gears"></i>/{/{__('general.home')/}/}</a></li>
			<li><a href="#">@#yield('contentheader_title')</a></li>
		</ol>
</section>
@#section('box-color')
box-danger
@#endsection
<br><?php /**PATH C:\wamp64\www\permitkhas\resources\views/generator/header.blade.php ENDPATH**/ ?>