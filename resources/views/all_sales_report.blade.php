@include('adminheader')

  <div class="content-wrapper">
    
 <section class="content">

    <h1> All Sales Report</h1>
             @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
<form action="{{route('all_sales_post')}}" method="post">
    {{ csrf_field() }}
<div class="row">
				<div class="col-sm-2">
                  <div class="form-group">
                      <input type="text" class="form-control" name="date1" value=" @php echo date('Y-m-d'); @endphp"  placeholder="enter begin date">
					 </div> 
					</div> 
					<div class="col-sm-2">
                  <div class="form-group">
                      <input type="text" class="form-control" name="date2" value=" @php echo date('Y-m-d'); @endphp" placeholder="enter end date">
					 </div> 
					</div>  
				<div class="col-sm-2">
                  <div class="form-group">
                       <button type="submit" class="btn btn-primary" name="submit">Submit</button>
					 </div> 
					</div> 
		</div>			
</form>                        
</section>




@include('dashboardfooter')
