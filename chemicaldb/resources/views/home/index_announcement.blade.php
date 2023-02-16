@foreach($announcements as $announcement)
<div class="card card-widget">
  <div class="card-header" style="background-color: #DFDFDF">
	<div class="user-block">
      <img class="img-circle" src="{{url('img/announcement.png')}}">
      <span class="username">{{$announcement->title}}</span>
	  <span class="description">{{ \Carbon\Carbon::parse($announcement->updated_at)->isoFormat('Do MMMM YYYY, h:mm:ss a')}}</span>
	</div>
	<!-- /.user-block -->
  </div>

  <!-- /.card-header -->
  <div class="card-body">
  <!-- post text -->
  @php
        $anc_content=str_ireplace("\n","<br>",$announcement->content);
        $anc_content=str_ireplace("\r\n","<br>",$anc_content);
  @endphp
	{!! $anc_content !!}
    </div>           
  <!-- /.card-body -->
</div>
@endforeach