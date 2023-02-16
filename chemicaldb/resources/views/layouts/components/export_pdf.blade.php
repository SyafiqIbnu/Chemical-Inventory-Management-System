<!DOCTYPE html>
<html>
    <head>
        <title>{{$title}}</title>
    </head>
    <style>
        body{
            font-size: 10px;
            font-family: sans-serif;

        }
    </style>
    <body>
        @include('layouts.components.export_pdf_banner')
        @if (isset($company))
        @include('exportlist.company_info')
        @endif
        <h4>{{$title}}</h4>
        <table id="user_table" class="table table-bordered table-hover" width="100%">
            <thead>
                <tr bgcolor="#DFE4ED" style="font-weight: bold;">
                    <td>Bil.</td>
                    @foreach($headings as $h)
                    <td>{{$h}}</td>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($results as $ex)
                <tr>
                    <td>{{$i++}}</td>
                    @foreach($fields as $f)
                    <td>{{ $ex->getOriginal($f) }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br><b>{{__('general.generated_by')}} : </b> @if(Auth::check()) {{Auth::user()->name}} @endif
        <br><b>{{__('general.generated_date')}} : </b> <?php echo date('d/m/Y H:i'); ?>
    </body>
</html>