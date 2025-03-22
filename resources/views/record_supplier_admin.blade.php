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
                <h3 class="card-title">Register Supplier</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('registersupplier')}}" method="post" name="form1">
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
                      <label>Supplier name</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <input type="text" class="form-control" id="suppliername" name="suppliername" placeholder="supplier full name" >
                           @if ($errors->has('suppliername'))
                        <span class="text-danger">{{ $errors->first('suppliername') }}</span>
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
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="phonenumber">
                                          @if ($errors->has('quantity'))
                                            <span class="text-danger">{{ $errors->first('phonenumber') }}</span>
                                        @endif
					</div>
				</div>
				  </div>
				  
				  <div class="row">   
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Product</label>
					  </div>     
					  </div>
					    <div class="col-sm-8">
						<div class="form-group">
                      <input type="text" class="form-control" name="product" placeholder="product" >
                         @if ($errors->has('product'))
                            <span class="text-danger">{{ $errors->first('product') }}</span>
                        @endif
					  </div>
					  </div>
				    </div>
	    				  
			<div class="row">   
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>City</label>
					  </div>     
					  </div>
					    <div class="col-sm-8">
						<div class="form-group">
                      <input type="text" class="form-control" name="city" placeholder="city" >
                         @if ($errors->has('city'))
                            <span class="text-danger">{{ $errors->first('city') }}</span>
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
 