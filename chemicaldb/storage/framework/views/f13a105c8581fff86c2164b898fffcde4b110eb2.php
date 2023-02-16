@#extends('layouts.app')

@#section('page_title')
/{/{__('general.create')/}/}
@#endsection

@#section('page_description')
/{/{__('general.create')/}/}
@#endsection

@#section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">/{/{__('general.home')/}/}</a></li>
    <li class="breadcrumb-item active">/{/{__('general.create')/}/}</li>
@#endsection

@#section('main-content')
	@#component('layouts.components.crud_card')
		@#slot('cardTitle') /{/{__('general.<?php echo e($name); ?>')/}/} @#endslot
		@#slot('cardColor') card-success @#endslot
		
		@#slot('cardBody')
			/{!! Form::open(['route'=>'<?php echo e($name); ?>.store','id'=>'myAppForm']) !!/}
				@#include('<?php echo e($name); ?>.create_form')
		@#endslot

		@#slot('cardFooter')
			<a type="button" class="btn btn-danger"	onClick="location.href='/{/{url('<?php echo e($name); ?>')/}/}'"><i class="fa fa-close"></i> /{/{__('general.cancel')/}/}</a>
			/{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!/} 
			/{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!/}
			/{!! Form::close() !!/}
		@#endslot
	@#endcomponent

@#endsection

@#include('<?php echo e($name); ?>.menu_active')<?php /**PATH D:\xampp\htdocs\zonkargo\resources\views/generator/create.blade.php ENDPATH**/ ?>