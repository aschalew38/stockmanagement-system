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
                <h3 class="card-title">Register Damged Stock</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('record_damage')}}" method="post" name="form1">
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
                      <label>Stock name</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <select class="form-control" name="stockname">
                     <option></option>
                         @foreach($post as $posts)
                        
                          <option>{{$posts['name']}}</option>
                    @endforeach
                    </select>
                           @if ($errors->has('stockname'))
                        <span class="text-danger">{{ $errors->first('stockname') }}</span>
                    @endif
						</div>
					</div>
             
				 </div>			 
				<div class="row">
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Quantity</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <input type="text" class="form-control" id="quantity" onkeyup="myFunction()" name="quantity">
             
                          @if ($errors->has('quantity'))
                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                    @endif
						</div>
					</div>
				 </div>	
				 
			 <div class="row">
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Unit Buying Price</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <input type="text" class="form-control" id="buyingprice" onkeyup="myFunction()" name="buyingprice">
             
                          @if ($errors->has('buyingprice'))
                        <span class="text-danger">{{ $errors->first('buyingprice') }}</span>
                    @endif
						</div>
					</div>
				 </div> 
		  <div class="row">
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Total Buying Price</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <input type="text" class="form-control" id="totalbuyingprice" name="totalbuyingprice">
             
                          @if ($errors->has('totalbuyingprice'))
                        <span class="text-danger">{{ $errors->first('totalbuyingprice') }}</span>
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
                 <input type="text" class="form-control" name="remark"  readonly value="Damaged">
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
          <script>
function myFunction() {
  var unitprice = document.getElementById("buyingprice").value;
  var quantity = document.getElementById("quantity").value;

  document.getElementById("totalbuyingprice").value = Math.ceil((quantity*unitprice) * 100) / 100;;
}
</script>
</body>
</div>
</html>
  @include('dashboardfooter')
 