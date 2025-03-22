@include('adminheader')

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
                <h3 class="card-title">Update Account</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('update_account_save_admin')}}" method="post" name="form1">
                      {{ csrf_field() }}
                <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                       {{Session::get('success')}}
                    </div>
                @endif
                <div class="row">
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>ID</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                <input type="text" class="form-control" id="id" name="id"  readonly value="{{ $post['id'] }}">
						</div>
					</div>
             
				 </div>
				<div class="row">
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>First name</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <input type="text" class="form-control" id="fname" name="fname" placeholder="first name" value="{{ $post['fname'] }}" >
                           @if ($errors->has('suppliername'))
                        <span class="text-danger">{{ $errors->first('suppliername') }}</span>
                    @endif
						</div>
					</div>
             
				 </div>	
						<div class="row">
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Middle Name</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <input type="text" class="form-control" id="mname" name="mname" placeholder="middle name" value="{{ $post['mname'] }}" >
                           @if ($errors->has('mname'))
                        <span class="text-danger">{{ $errors->first('mname') }}</span>
                    @endif
						</div>
					</div>
             
				 </div>	
				  <div class="row">   
				  <div class="col-sm-2">
                  <div class="form-group">
                    <label for="quantity">Phone Number</label>
					</div>
				</div>
				  <div class="col-sm-8">
				  <div class="form-group">
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="phonenumber" value="{{ $post['phonenumber'] }}">
                                          @if ($errors->has('quantity'))
                                            <span class="text-danger">{{ $errors->first('phonenumber') }}</span>
                                        @endif
					</div>
				</div>
				  </div>
				  		  <div class="row">   
				  <div class="col-sm-2">
                  <div class="form-group">
                    <label for="quantity">Email</label>
					</div>
				</div>
				  <div class="col-sm-8">
				  <div class="form-group">
                    <input type="text" class="form-control" id="phonenumber" name="email" placeholder="email" value="{{ $post['email'] }}">
                                          @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
					</div>
				</div>
				  </div>
				   <div class="row">   
				  <div class="col-sm-2">
                  <div class="form-group">
                    <label for="quantity">Password</label>
					</div>
				</div>
				  <div class="col-sm-8">
				  <div class="form-group">
                    <input type="text" class="form-control" id="phonenumber" name="password" placeholder="password" >
                                          @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
					</div>
				</div>
				  </div>
				  <div class="row">   
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Role</label>
					  </div>     
					  </div>
					    <div class="col-sm-8">
						<div class="form-group">
                      <select class="form-control" name="role" placeholder="role" value="">
                          <option value="{{ $post['role'] }}">{{ $post['role'] }}</option>
                          <option value="sales">Sales</option>
                          <option value="admin">Admin</option>
                          <option value="purchaser">StoreKeeper</option>
                          
                          </select>
                         @if ($errors->has('role'))
                            <span class="text-danger">{{ $errors->first('role') }}</span>
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
 