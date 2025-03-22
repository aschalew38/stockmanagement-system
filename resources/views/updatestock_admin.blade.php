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
                <h3 class="card-title">Update Stock</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('update_stock_save')}}" method="post" name="form1">
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
                      <label>Stock name</label>
					 </div> 
					</div>
				<div class="col-sm-8">	
					   <div class="form-group">
                 <select class="form-control" name="stockname">
                     <option value="{{$post['name'] }}">{{$post['name'] }}</option>
                         @foreach($stockname as $names)
                        
                          <option value="{{$names['name']}}">{{$names['name']}}</option>
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
                    <label for="quantity">Quantity</label>
					</div>
				</div>
				  <div class="col-sm-8">
				  <div class="form-group">
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="ብዛት" value="{{ $post['quantity'] }}">
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
                      <input type="text" class="form-control" name="price" placeholder="ነጠላ ዋጋ" value="{{ $post['price'] }}">
                         @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
					  </div>
					  </div>
				    </div>
				<div class="row">
				  <div class="col-sm-2">
				  <div class="form-group">
				   <label>Unit</label>
				   </div>
				   </div>
				     <div class="col-sm-8">
					   <div class="form-group">
        
	                <select class="form-control" name="unit">  
	                <option value="{{ $post['unit'] }}">{{ $post['unit'] }}</option>
                         @foreach($unit as $unit_data)
                       
                        <option value="{{$unit_data['name']}}">{{$unit_data['name']}}</option>
                    @endforeach
                    </select>
                      @if ($errors->has('unit'))
                            <span class="text-danger">{{ $errors->first('unit') }}</span>
                        @endif
						</div>
						</div>
				   </div>	    

			  <div class="row">   
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Unit Selling Price</label>
					  </div>     
					  </div>
					    <div class="col-sm-8">
						<div class="form-group">
                      <input type="text" class="form-control" name="sellingprice" placeholder="ነጠላ ዋጋ" value="{{ $post['sellingprice'] }}">
                         @if ($errors->has('sellingprice'))
                            <span class="text-danger">{{ $errors->first('sellingprice') }}</span>
                        @endif
					  </div>
					  </div>
				    </div>

				  <div class="row">   
				  <div class="col-sm-2">
                  <div class="form-group">
                    <label for="quantity">Supplier Name</label>
					</div>
				</div>
				  <div class="col-sm-8">
				  <div class="form-group">
                 <select class="form-control" name="supplier_fullname" >
                     <option value="{{ $post['supplier_fullname'] }}">{{ $post['supplier_fullname'] }}</option>
         @foreach($supplier as $suppname)
        <option value="{{$suppname['fullname']}}({{$suppname['id']}})">{{$suppname['fullname']}}</option>
    @endforeach
    </select>
              @if ($errors->has('supplier'))
                <span class="text-danger">{{ $errors->first('supplier') }}</span>
            @endif
					</div>
				</div>
				  </div>
				  
					<div class="row">
				  <div class="col-sm-2">
				  <div class="form-group">
				   <label>PurchaseType</label>
				   </div>
				   </div>
				     <div class="col-sm-8">
					   <div class="form-group">
        
	                <select class="form-control" name="purchase_type">  
	                <option value="{{ $post['purchase_type'] }}">{{ $post['purchase_type'] }}</option>  
	                <option value="cash">Cash</option>
	                <option value="credit">Credit</option>
                   
             
                    </select>
                      @if ($errors->has('purchasetype'))
                            <span class="text-danger">{{ $errors->first('purchasetype') }}</span>
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
				      <input type="text" class="form-control" value="Null" id="remark" name="description" placeholder="remark" value="{{ $post['description'] }}"> 
				    </div>  
				     </div>
                </div>  
                
                <div class="row">
				  <div class="col-sm-2">
				  <div class="form-group">
				   <label for="location">Location</label>
				   </div>
				   </div>
				  <div class="col-sm-8">
			       <div class="form-group">
                        <input type="text" class="form-control" name="location" value="{{ $post['location'] }}">
                          
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
 