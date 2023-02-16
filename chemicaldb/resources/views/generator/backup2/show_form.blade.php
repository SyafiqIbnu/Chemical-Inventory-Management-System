@foreach($filteredColumns as $col)
    @#component('layouts.components.show_two_column',['label'=>__('{{$name}}.{{$col->COLUMN_NAME}}')]) @#slot('field')
        /{/{$model{{$modelName}}->{{$col->COLUMN_NAME}}/}/}
    @#endslot @#endcomponent
@endforeach
