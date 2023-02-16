
@extends('layouts.app')

@section('page_title')
TEST OPTIMIZER
@endsection

@section('page_description')
TEST LOGIN
@endsection

@section('main-content')
<body>
      <div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>

         <div class="col-sm-6 col-sm-offset-3">
    
      <form>
        <div id="name-group" class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username"/>
        </div>
        <div id="password-group" class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
        </div>
        <button type="button" id="loginBtn" class="btn btn-success">Login</button>
	
      </form>
    </div>

      
</body>
@endsection

@push('scripts')
        <script>
            $(document).ready(function()
                  {
                  var sessionData =
                  {
                     sessionid: 0,
                     expires: 0
                  };

                  $("#loginBtn").click(function(event)
                  {
                     var username = $("#username").val();
                     var password = $("#password").val();

                     var formData = "username="+username+"&password="+password;
                                 
                     /*
                     {
                        username: $("#username").val(),
                        password: $("#password").val()
                     };
                     */

                     var headerlogin= {
                        "Origin":"http://www.utmzonkargo.vcari.net/",

                     }
                     $.ajax(
                     {
                        method: "POST",
                        url: "http://factohubdemo.azurewebsites.net/api/web/login",
                        data: formData,
                        contentType: "application/x-www-form-urlencoded",
                        headers: headerlogin,
                        dataType: "json",
                        success: function(data)
                        {
                        sessionData.sessionid = data.sessionid;
                        sessionData.expires = data.expires;
                        alert("Successful. sessionid=" + data.sessionid + " and expires=" + data.expires);
                        },
                        error: function(error)
                        {
                        alert("Failed.");
                        },
                        processData: true
                     });
                  });

                  $("#logoutBtn").click(function(event)
                  {
                     var headerBanner =
                     {
                        "X-Sessionid": sessionData.sessionid,
                        "X-Expires": sessionData.expires
                     };

                     $.ajax(
                     {
                        method: "DELETE",
                        url: "http://factohubdemo.azurewebsites.net/api/web/logout",
                        contentType: "application/x-www-form-urlencoded",
                        headers: headerBanner,
                        dataType: "json",
                        success: function(data)
                        {
                        alert("Successful.");
                        },
                        error: function(error)
                        {
                        alert("Failed.");
                        },
                        processData: true
                     });
                  });
                  });
                     
        </script>
@endpush

