@include('salesheader')

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
                <h3 class="card-title">Sell Stock</h3><br>
                <h6 class="card-title float-right">Unit Selling Price: {{ $post['sellingprice'] }}</h6>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('sell_stock_save')}}" method="post" name="form1">
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
      <input type="text" class="form-control" id="stockname" name="stockname" readonly value="{{ $post['name'] }}">
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
                    <input type="text" class="form-control" id="quantity" name="quantity" onkeyup="myFunction()" placeholder="ብዛት" value="">
                                          @if ($errors->has('quantity'))
                                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
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
                      <input type="text" class="form-control" id="price" name="price" onkeyup="myFunction()" placeholder="የ አንዱ ፍሬ መሸጫ ዋጋ "value="">
                         @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
					  </div>
					  </div>
				    </div>
	    				  <div class="row">   
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Total Price</label>
					  </div>     
					  </div>
					    <div class="col-sm-8">
						<div class="form-group">
                      <input type="text" class="form-control" id="totalprice" name="totalprice" readonly placeholder="አጠቃላይ ዋጋ "value="">
                         @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
					  </div>
					  </div>
				    </div>
				  <div class="row">   
				  <div class="col-sm-2">
                  <div class="form-group">
                    <label for="quantity">Buyer Full Name</label>
					</div>
				</div>
				  <div class="col-sm-8">
				  <div class="form-group">
  <input type="text" class="form-control" name="buyerfullname"  placeholder="የገዥ ሙሉ ስም">
              @if ($errors->has('supplier'))
                <span class="text-danger">{{ $errors->first('buyerfullname') }}</span>
            @endif
					</div>
				</div>
				  </div>
		 <div class="row">   
				  <div class="col-sm-2">
                  <div class="form-group">
                    <label for="quantity">Buyer Phone Number</label>
					</div>
				</div>
				  <div class="col-sm-8">
				  <div class="form-group">
  <input type="text" class="form-control" name="buyerphone"   placeholder="የገዥ  ስልክ ቁጥር">
              @if ($errors->has('supplier'))
                <span class="text-danger">{{ $errors->first('buyerphone') }}</span>
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
                        <label>Returndate</label>
                      </div>
				  </div>
				  <div class="col-sm-8">
				    <div class="form-group">
				      <input type="text" class="form-control"  id="returndate" name="returndate" placeholder="@php echo date('Y-m-d'); @endphp " > 
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
				      <input type="text" class="form-control" value="Null" id="remark" name="description" placeholder="ምርመራ "  value="{{ $post['description'] }}"> 
				    </div>  
				     </div>
                </div>  
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Sell</button>
                </div>
              </form>
            </div>
      </div>
         </div>
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      <script>
function myFunction() {
  var unitprice = document.getElementById("price").value;
  var quantity = document.getElementById("quantity").value;

  document.getElementById("totalprice").value = Math.ceil((quantity*unitprice) * 100) / 100;;
}
</script>
 <!-- /.content -->
</body>
</div>
</html>
  @include('dashboardfooter')
 