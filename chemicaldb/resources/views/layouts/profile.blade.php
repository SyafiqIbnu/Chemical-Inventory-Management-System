<li class="nav-item dropdown d-sm-inline-block">
        <a title="{{__('general.profile')}}" 
        class="nav-link" data-toggle="dropdown" href="#">
		<i class="fas fa-user-circle fa-2x"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-item">
            <div class="col-md-16">
            <!-- Profile Image -->
            <div class="card card-info card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <i class="fas fa-user-circle fa-5x"></i>
                  <!--<img class="profile-user-img img-fluid img-circle" src="dist/img/user1-128x128.jpg" alt="User profile picture">-->
                </div>
                <p class="text-center"> @if(Auth::check()) {{Auth::user()->name}} @else Guest @endif</p>
                <p class="text-muted text-center">{{Auth::user()->email}}</p>
				<br>
				<div class="row">
					<div class="col-md-12">
						<a href="{{url('/profile/changepwd')}}" class="btn btn-info btn-block"><b>{{__('general.change_password')}}</b></a>
						<a href="{{url('/logout')}}" class="btn btn-danger btn-block"><b>Logout</b></a>
					</div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          </div>         
        </div>
      </li>