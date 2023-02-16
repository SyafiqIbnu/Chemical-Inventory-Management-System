@#extends('layouts.app')

@#section('page_title')
/{/{__('general.show')/}/}
@#endsection

@#section('page_description')
/{/{__('general.show')/}/}
@#endsection

@#section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">/{/{__('general.home')/}/}</a></li>
    <li class="breadcrumb-item active">/{/{__('general.show')/}/}</li>
@#endsection


@#section('main-content')
	@#component('layouts.components.crud_card')
		@#slot('cardTitle') /{/{__('general.<?php echo e($name); ?>')/}/} @#endslot
		@#slot('cardColor') card-success @#endslot
		
		@#slot('cardBody')
			/{!! Form::model($model<?php echo e($modelName); ?>, ['route' => ['<?php echo e($name); ?>.update', $model<?php echo e($modelName); ?>->id],'method'=>'PUT','id'=>'<?php echo e($name); ?>Form']) !!/}
				@#include('<?php echo e($name); ?>.show_form')
		@#endslot

		@#slot('cardFooter')
			<a type="button" class="btn btn-danger"	onClick="location.href='/{/{url('<?php echo e($name); ?>')/}/}'"><i class="fa fa-close"></i> /{/{__('general.cancel')/}/}</a>
			/{!! Form::close() !!/}
		@#endslot
	@#endcomponent
@#endsection

@#include('<?php echo e($name); ?>.menu_active')<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/generator/show.blade.php ENDPATH**/ ?>