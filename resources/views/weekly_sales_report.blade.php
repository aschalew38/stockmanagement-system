@include('adminheader')

  <div class="content-wrapper">
    
 <section class="content">

    <h1> Weekly Sales List</h1>
             @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
<table id="table"  class="table table-striped  table-dark table-hover" 
  data-show-export="true"
  data-pagination="true"
  data-click-to-select="true"
  data-show-toggle="true"
  data-show-columns="true">
    
    <thead>
    <tr>
    
        <th data-field="ItemId" data-sortable="true" data-align="center">Stock Id</th>
        <th data-field="firstname" data-filter-control="input" data-sortable="true" >Name</th>
      <th  data-field="middlename" data-filter-control="input"  data-align="center" data-sortable="true" >Quantity</th>
        <th  data-field="lastname" data-filter-control="input"  data-align="center" data-sortable="true" >Unit Buying Price</th>
        <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >Unit Selling Price</th>   
        <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >total Selling Price</th>
       <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >Profit</th>
        <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >Remark</th>
       <th data-field="date"  data-sortable="true" data-class="col-sm-3" data-filter-type="datepicker_range">Date</th> 
 
        
    </tr>
    </thead>
    @php $totalprofit=0.0; 
    $stockname_array = array();
    $stockquantity_array = array();
    $stockprofit_array = array();
    
    $stockname_array_loss = array();
    $stockquantity_array_loss = array();
    $stockprofit_array_loss = array();
    @endphp

    @foreach($post as $posts)
        <tr>
            
                <td>{{$posts['stockid']}}</td>
                <td>{{$posts['stockname']}}</td>
                <td>{{$posts['quantity']}}</td>
                <td>{{$posts['unit_buying_price']}}</td>
                <td>{{$posts['unit_selling_price']}}</td>
                <td>{{$posts['total_selling_price']}}</td>
                
              <td>@php 
                $totalprofit = $totalprofit + $posts['profit'];
                echo $posts['profit'];
                @endphp  </td>
                <td>{{$posts['remark']}}</td>
                  <td>{{$posts['created_at']}}</td>
        </tr>
    
    @endforeach
    <tr>
         <td>TotalProfit</td>  <td> @php echo number_format($totalprofit,2); @endphp</td> 
        </tr>
</table>
{{ $post->links() }}
@foreach($piechartweekly as $piechart)
 @php $stockname_array[]= $piechart['stockname']; 
  $stockquantity_array[]= $piechart['quantity']; 
  $stockprofit_array[] =  $piechart['profit']; 
 @endphp
@endforeach

@foreach($lossweekly as $piechart2)
 @php $stockname_array_loss[]= $piechart2['stockname']; 
  $stockquantity_array_loss[]= $piechart2['quantity']; 
  $stockprofit_array_loss[] =  $piechart2['profit']; 
 @endphp
@endforeach
          <!-- PIE CHART -->

         <!-- STACKED BAR CHART 
<canvas id="barchartid" style="width:50%;max-width:600px"></canvas>-->

          <div class="row">    
         <div class="col-md-6">             
         <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Weekly Sales Quantity </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
        <canvas id="myChart" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>     
          </div>
          </div>
          </div>
          <div class="col-md-6">
                        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Weekly Sales Profit</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                  <canvas id="barchartid" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                </div>
              <!-- /.card-body -->
            </div> 
          </div>
          </div> 
          
          <div class="row">    
         <div class="col-md-6">             
         <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Weekly Loss</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
        <canvas id="losschartid" style="width:50%;max-width:600px"></canvas>     
          </div>
          </div>
          </div>
          </div>          
          
     <!--   <script src="{{asset('js/Chart.min.js')}}"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>-->
<script>
/*var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];*/
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];
new Chart("barchartid", {
  type: "bar",
  data: {
    labels: @php echo json_encode($stockname_array); @endphp,
    datasets: [{
      backgroundColor: barColors,
      data: @php echo json_encode($stockprofit_array); @endphp
    }]
  },
  options: {
    title: {
      display: true,
      text: "Weekly sales profit"
    }
  }
});
new Chart("myChart", {
  type: "pie",
  data: {
    labels: @php echo json_encode($stockname_array); @endphp,
    datasets: [{
      backgroundColor: barColors,
      data: @php echo json_encode($stockquantity_array); @endphp
    }]
  },
  options: {
    title: {
      display: true,
      text: "Weekly sales quantity"
    }
  }
});
new Chart("losschartid", {
  type: "pie",
  data: {
    labels: @php echo json_encode($stockname_array_loss); @endphp,
    datasets: [{
      backgroundColor: barColors,
      data: @php echo json_encode($stockprofit_array_loss); @endphp
    }]
  },
  options: {
    title: {
      display: true,
      text: "Weekly loss"
    }
  }
});
/*new Chart("linechartid", {
  type: "line",
  data: {
    labels: @php echo json_encode($stockname_array); @endphp,
    datasets: [{
      backgroundColor: barColors,
      data: @php echo json_encode($stockquantity_array); @endphp
    }]
  },
  options: {
    title: {
      display: true,
      text: "Daily sales by quantity"
    }
  }
});

new Chart("linechartid", {
  type: "line",
  data: {
    labels: @php echo json_encode($stockname_array); @endphp,
    datasets: [{
      data: @php echo json_encode($stockquantity_array); @endphp,
      borderColor: "red",
      fill: false
    },{
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    },{
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});*/
</script>        


</section>




@include('dashboardfooter')
