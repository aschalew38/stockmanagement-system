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
                <h3 class="card-title">Register Stock Name</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('registerstock_name')}}" method="post" name="form1">
                      {{ csrf_field() }}
                <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                       {{Session::get('success')}}
                    </div>
                @endif
                               @if(Session::has('error'))
                    <div class="alert alert-danger">
                       {{Session::get('error')}}
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
                 <input type="text" class="form-control" id="stockname" name="stockname">
             
                          @if ($errors->has('stockname'))
                        <span class="text-danger">{{ $errors->first('stockname') }}</span>
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
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>  
<script type="text/javascript">
  $(function() {
     $( "#stockname" ).autocomplete({
       source: 'ajax-db-search_stockname.php',
     });     

  });
</script>
    <!-- /.content -->
</body>

</div>

</html>

  @include('dashboardfooter')	

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
 