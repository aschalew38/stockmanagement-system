@include('adminheader')

  <div class="content-wrapper">
    
 <section class="content">

    <h1> Sales Order List</h1>
             @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
 <form action="{{route('printstockdata')}}" method="post" >
     {{ csrf_field() }}
<table id="table"  class="table table-striped" 
  data-show-export="true"
  data-pagination="true"
  data-click-to-select="true"
  data-show-toggle="true"
  data-show-columns="true">
    
    <thead>
    <tr>
    
        <th data-field="ItemId" data-sortable="true" data-align="center">Id</th>
        <th data-field="firstname" data-filter-control="input" data-sortable="true" >StockName</th>
      <th  data-field="middlename" data-filter-control="input"  data-align="center" data-sortable="true" >Quantity</th>
        <th  data-field="amount" data-filter-control="input" data-align="center" data-sortable="true" >Price</th>
        <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >Printed</th>
        <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >Sales Officer Name</th> 
        <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >Customer Name</th> 
       <th data-field="date"  data-sortable="true" data-class="col-sm-3" data-filter-type="datepicker_range">Date</th> 
     <!--  <th id="created_at">-->
    </tr>
    </thead>
 @php
   $total_sum = 0; 
   $num=0;
   @endphp 

  

    @foreach($post as $posts)    
   


        <tr class="bg-success">
            
             <td><input type="hidden" name="id@php$num@endphp" value"{{$posts['id']}}">{{$posts['id']}}</td>
            <td><input type="hidden" name="stockname" value"{{$posts['stockname']}}">{{$posts['stockname']}}</td>
            <td><input type="hidden" name="quantity" value"{{$posts['quantity']}}">{{$posts['quantity']}}</td>
            <td><input type="hidden" name="price" value"{{$posts['price']}}">{{$posts['price']}}</td>
              <td><input type="hidden" name="printed" value"{{$posts['printed']}}">{{$posts['printed']}}</td>
              
                <td><input type="hidden" name="printed_by" value"{{$posts['printed_by']}}">{{$posts['printed_by']}}</td>
                  <td><input type="hidden" name="customer_name" value"{{$posts['customer_name']}}">{{$posts['customer_name']}}</td>
              
                <td><input type="hidden" name="created_at" value"{{$posts['created_at']}}">{{$posts['created_at']}}</td>
     <td><a href={{"dontprint-stock/".$posts['id']}}><button type="button" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure it is printed?');">
                Printed</button></a></td>
        <td><a href={{"cancel-order/".$posts['id'].'/'.$posts['stock_id']}}><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this order?');">
                Cancel</button></a></td> 
             

        </tr>
        @php $total_sum = $total_sum + ( $posts['price'] * $posts['quantity']);
         $num = $num +1 ;
        @endphp 
    @endforeach 
  
    <tr>
    <tr><td>Total</td><td> @php echo $total_sum @endphp </td></tr>    
    <td><button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure you want to print this order?');">
                Print</button></td></tr>
</table>
 </form>
<script>
    $(document).ready( function () {
   var oTable = $('#table').dataTable({
                "fixedHeader": true,
                "colReorder": true,
                "responsive": true,
                "sPaginationType": "full_numbers",
                "bLengthChange": true,
                "aLengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, , "All"]],
                "iDisplayLength": 5,
                "aaSorting": [1, 'asc'],
                "dom": 'Blfrtip',
                "bProcessing": false,
                buttons: [
                    'copy', 'excel', 'pdf', 'print', 'csv',
                    {
                        text: 'JSON',
                        action: function (e, dt, button, config) {
                            var data = dt.buttons.exportData();

                            $.fn.dataTable.fileSave(
                                new Blob([JSON.stringify(data)]),
                                'Export.json'
                            );
                        }
                    }
                ],
                //{ dom: 'Bfrtip', buttons: ['colvis', 'excel', 'print'] }
                //  "bJQueryUI": true
                // "sDom": 'l<"H"Rf>t<"F"ip>'
            });
   $(document).contextmenu({
                delegate: ".dataTable td",
                menu: [
                    { title: "Filter", cmd: "filter", uiIcon: "ui-icon-volume-off ui-icon-filter" },
                    { title: "Remove filter", cmd: "nofilter", uiIcon: "ui-icon-volume-off ui-icon-filter" },
                    { title: "Cut", cmd: "Cut", uiIcon: "ui-icon-volume-off ui-icon-filter" },
                    { title: "Pest", cmd: "Pest", uiIcon: "ui-icon-volume-off ui-icon-filter" },
                    { title: "Exclude", cmd: "Exclude", uiIcon: "ui-icon-volume-off ui-icon-filter" }
                ],
                select: function (event, ui) {
                    var coltext = ui.target.text().trim();
                    var colvindex = ui.target.parent().children().index(ui.target);
                    var colindex = $('table thead tr th:eq(' + colvindex + ')').data('column-index');
                    switch (ui.cmd) {
                        case "filter":
                            oTable.fnFilter(coltext.trim(), colindex, true);
                            break;
                        case "nofilter":
                            oTable.fnFilter('');
                            break;
                        case "Cut":

                            alert('Column index 0 is ' +
                                (employeeTable.column(0).visible() === true ? 'visible' : 'not visible')
                            );
                            break;
                        case "Exclude":
                            //
                            oTable.fnSetColumnVis(columnIndex, false);
                            //var oSettings = // you can find all sorts of goodies in the Settings
                            // var col_id = oSettings.colindex;
                            //alert('Clicked on cell in visible column: ' + col_id);
                            // index = oTable.dataTable().api().cell($(e.target).closest('td')).index().column;
                            // alert(index);
                            //  oTable.fnSetColumnVis(colvindex, false);

                            break;
                    }
                },
                beforeOpen: function (event, ui) {
                    var $menu = ui.menu,
                        $target = ui.target,
                        extraData = ui.extraData;
                    ui.menu.zIndex(9999);
                }
            });
} );

</script>



</section>




@include('dashboardfooter')
