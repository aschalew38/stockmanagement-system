<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
@page {
  size: A8;
  margin: 0;
}
@media print {
  html, body {
    width: 57mm;
    height: 83mm;
     margin: 0;
  }
  </style>

</head>
<body>

    <div class="row">
        <div class="well col-xs-10 col-sm-6 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                   <div class="text-center">
                    <p><b>Cash Receipt</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <p>Shop Name</p>
                    </address>
                </div>
                   <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <p>Yonas ceramics shop</p>
                    </address>
                </div>
            </div>
                        <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                          <address><p>Date</p>  </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 ">
                
                         <address> <p>@php echo date('Y-m-d')@endphp</p>  </address>
                   
                </div>
            </div>
   
      
                <table class="table table-sm">
                    <thead class="small">
                        <tr>
                            <td><p><small>Item</small></p></td>
                             <!--<div class="w-5"><td><small>#</small></td></div>-->
                             <div ><td ><p><small>Price</small></p></td></div>
                        </tr>
                    </thead>
                    <tbody>
          @php
   $total_sum = 0;  
   $printed_by_array =  Array();
   $customername_array =  Array(); 
    foreach($post as $mypost) 
    {
         $printed_by_array[] = $mypost['printed_by'];
         $customername_array[] = $mypost['customer_name'];
   }
    @endphp 
 
   
    @foreach($post as $posts)    
    
        <tr class="bg-success fs-2">
            
  
            <td><p><small>{{$posts['stockname']}} (x {{$posts['quantity']}})</small></p></td>
          <!--  <td><p><small>{{$posts['quantity']}}</small></p></td>-->
            <td><p><small>{{$posts['price']}}</small></p></td>
       
        @php $total_sum = $total_sum + ($posts['price'] * $posts['quantity']) @endphp 
    @endforeach 
  
 
         @php  $total_withtax = $total_sum + ($total_sum*0.15) @endphp
    <tr><td><p>SubTotal</p></td><td> @php echo number_format($total_sum,2) @endphp </td></tr> 
   
    <tr><td> <p>Tax(15%)</p></td><td> @php echo number_format($total_sum*0.15,2) @endphp </td></tr> 
     <tr><td><p><strong>Total</p></strong></td>
         <td><p><strong> @php echo number_format($total_withtax,2) @endphp
         </p></strong>
         </td>

    <tr><td><p><strong>Printed By</p></strong></td> <td><p><small> @php echo $printed_by_array[0]; @endphp</small></p></td></tr>
        <tr><td><p><strong>Customer Name</p></strong></td> <td><p><small> @php echo $customername_array[0]; @endphp</small></p></td></tr>
     </tr> 

                    </tbody>
                </table>
  <!--    -->
            
            </div>
        </div>
  
    </body>