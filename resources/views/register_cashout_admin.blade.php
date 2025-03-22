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
                <h3 class="card-title">Register Cash Out</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('record_cashout')}}" method="post" name="form1">
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
                      <label>Cash Out Name</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <input type="text" class="form-control" id="name" name="name">
             
                          @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
						</div>
					</div>
				 </div> 

				 
 
		  <div class="row">
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Total Cash</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <input type="text" class="form-control" id="totalcash" name="totalcash">
             
                          @if ($errors->has('totalcash'))
                        <span class="text-danger">{{ $errors->first('totalcash') }}</span>
                    @endif
						</div>
					</div>
				 </div> 	 
	
			<div class="row">
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Remark</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <input type="text" class="form-control" name="remark"  >
                          @if ($errors->has('remark'))
                        <span class="text-danger">{{ $errors->first('remark') }}</span>
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
 