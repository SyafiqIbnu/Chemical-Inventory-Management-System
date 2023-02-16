@component('layouts.components.table', ['tname' => 'permission_table']) 
		@slot('options')
			searching: false, paging: false, sorting: false,
		@endslot

		@slot('thead')
			<th style='width: 30px;'>{{__('general.number')}}</th>
			<th>{{__('permission_group.name')}}</th>
			<th>{{__('permission_group.is_view')}}</th>
			<th>{{__('permission_group.is_create')}}</th>
			<th>{{__('permission_group.is_edit')}}</th>
			<th>{{__('permission_group.is_delete')}}</th>
		@endslot 

		@slot('tbody')
			@foreach($permissionGroups as $modelPermissionGroup)
			<tr>
				<td> </td>
				<td>{{$modelPermissionGroup->name}}</td>
				
					<td>
						@if(isset($modelPermissionGroup->is_view))
							@if($modelPermissionGroup->is_view==1)		
								{!! Form::checkbox($modelPermissionGroup->prefix."_view",1,isset($modelRoleHasPermission[$modelPermissionGroup->prefix.'_view'])) !!}
							@endif
						@endif
					</td>
					<td>
						@if(isset($modelPermissionGroup->is_create))
							@if($modelPermissionGroup->is_create==1)
								{!! Form::checkbox($modelPermissionGroup->prefix."_create",1,isset($modelRoleHasPermission[$modelPermissionGroup->prefix.'_create'])) !!}
							@endif
						@endif
					</td>
					<td>
						@if(isset($modelPermissionGroup->is_edit))
							@if($modelPermissionGroup->is_edit==1)
								{!! Form::checkbox($modelPermissionGroup->prefix."_edit",1,isset($modelRoleHasPermission[$modelPermissionGroup->prefix.'_edit'])) !!}
							@endif
						@endif									
					</td>
					<td>
						@if(isset($modelPermissionGroup->is_delete))
							@if($modelPermissionGroup->is_delete==1)
								{!! Form::checkbox($modelPermissionGroup->prefix."_delete",1,isset($modelRoleHasPermission[$modelPermissionGroup->prefix.'_delete'])) !!}
							@endif
						@endif									
					</td>
			</tr>
			@endforeach
		@endslot @slot('firstScript')
	"paging": false,
@endslot @endcomponent
