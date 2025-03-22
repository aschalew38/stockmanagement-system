@include('purchaserheader')

    <!-- /.content-header -->

    <!-- Main content -->
<div class="content-wrapper">
<body>
    <div class="container">
        <!-- Small boxes (Stat box) -->
          <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('changepassword')}}" method="post" name="form1">
                      {{ csrf_field() }}
                <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                       {{Session::get('success')}}
                    </div>
                @endif

                 @if($errors->has('error'))
                    <div class="alert alert-danger">
                       {{$errors->first('error')}}
                    </div>
                @endif
                
				<div class="row">
				      <input type="hidden" class="form-control" id="email" name="email" value="@if(Session::has('email')){{ session('email')}}@endif" >
				<div class="col-sm-2">
				                 @if($errors->has('email'))
                    <div class="alert alert-success">
                       {{$errors->first('email')}}
                    </div>
                @endif
                  <div class="form-group">
                      <label>Old Password</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <input type="text" class="form-control" id="password" name="password" placeholder="old password" >
                           @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
						</div>
					</div>
				 </div>	
			
				  <div class="row">   
				  <div class="col-sm-2">
                  <div class="form-group">
                    <label for="quantity">New Password1</label>
					</div>
				</div>
				  <div class="col-sm-8">
				  <div class="form-group">
                    <input type="text" class="form-control" id="newpassword1" name="newpassword1" placeholder="enter newpassword">
                                          @if ($errors->has('newpassword1'))
                                            <span class="text-danger">{{ $errors->first('newpassword1') }}</span>
                                        @endif
					</div>
				</div>
				</div>
				  
	    				  
			<div class="row">   
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>New Password2</label>
					  </div>     
					  </div>
					    <div class="col-sm-8">
						<div class="form-group">
                      <input type="text" class="form-control" name="newpassword2" placeholder="enter newpassword again" >
                         @if ($errors->has('newpassword2'))
                            <span class="text-danger">{{ $errors->first('newpassword2') }}</span>
                        @endif
					  </div>
					  </div>
				    </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
      </div>
         </div>
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    <!-- /.content -->
</body>
</div>
</html>
  @include('dashboardfooter')
 