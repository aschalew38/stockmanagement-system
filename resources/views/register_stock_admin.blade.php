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
                <h3 class="card-title">Register Stock</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('registerstock')}}" method="post" name="form1">
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
                    <label for="quantity">Quantity</label>
					</div>
				</div>
				  <div class="col-sm-8">
				  <div class="form-group">
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="ብዛት" value="{{ old('title') }}">
                                          @if ($errors->has('quantity'))
                                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                        @endif
					</div>
				</div>
				  </div>
				  <div class="row">   
				<div class="col-sm-2">
                  <div class="form-group">
                      <label>Price</label>
					  </div>     
					  </div>
					    <div class="col-sm-8">
						<div class="form-group">
                      <input type="text" class="form-control" name="price" placeholder="ነጠላ መግዣ ዋጋ" value="{{ old('title') }}">
                         @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
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
                      <input type="text" class="form-control" name="sellingprice" placeholder="ነጠላ የመሸጫ ዋጋ"  value="{{ old('title') }}">
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
	                <option></option>
                         @foreach($unit as $unit_data)
                       
                        <option>{{$unit_data['name']}}</option>
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
				   <label>Store Name</label>
				   </div>
				   </div>
				     <div class="col-sm-8">
					   <div class="form-group">
        
	                <select class="form-control" name="store">  
	                <option></option>
                         @foreach($store as $store_data)
                       
                        <option>{{$store_data['storename']}}</option>
                    @endforeach
                    </select>
                      @if ($errors->has('store'))
                            <span class="text-danger">{{ $errors->first('store') }}</span>
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
                 <select class="form-control" name="supplier" >
                     <option></option>
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
        
	                <select class="form-control" name="purchasetype">  
	                <option value=""></option>  
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
                        <label>Debit Return Date</label>
                      </div>
				  </div>
				  <div class="col-sm-8">
				    <div class="form-group">
				      <input type="text" class="form-control"  id="debit_return_date" name="debit_return_date" placeholder="@php echo('Y-m-d'); @endphp" value=""> 
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
				      <input type="text" class="form-control" value="Null" id="remark" name="remark" placeholder="remark" value="{{ old('title') }}"> 
				    </div>  
				     </div>
                </div>  
                
                <div class="row">
				  <div class="col-sm-2">
				  <div class="form-group">
				   <label for="location">Location</label>
				   </div>
				   </div>
				  <div class="col-sm-4">
			       <div class="form-group">
                        <label>Row</label>
                        <select class="form-control" name="row">
                          <option>A</option>
                          <option>B</option>
                          <option>C</option>
                          <option>D</option>
                          <option>E</option>
						  <option>F</option>
                          <option>G</option>
                          <option>H</option>
                          <option>I</option>
                          <option>J</option>
						  <option>K</option>
                          <option>L</option>
                          <option>M</option>
                          <option>N</option>
                          <option>O</option>
						  <option>P</option>
                          <option>Q</option>
                          <option>R</option>
                          <option>S</option>
                          <option>T</option>
                          <option>U</option>
                          <option>V</option>
                          <option>W</option>
						  <option>S</option>
                          <option>T</option>
                          <option>U</option>
                          <option>V</option>
                          <option>W</option>
                          <option>X</option>
                          <option>Y</option>
                          <option>Z</option>
						  
                        </select>
                      </div>
				  </div>
				  <div class="col-sm-4">
					<div class="form-group">
                        <label>Column</label>
                        <select class="form-control" name="column">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option> 
						  <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>                  
                          <option>11</option>
                          <option>12</option>
                          <option>13</option>
                          <option>14</option>
                        </select>
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
 