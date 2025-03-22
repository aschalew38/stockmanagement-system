@include('adminheader')

  <div class="content-wrapper">
    
 <section class="content">

    <h1> Credit Stock List(ያበደርከው)</h1>
             @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
<table id="table"  class="table table-striped table-dark table-hover" 
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
      <th  data-field="amount" data-filter-control="input" data-align="center" data-sortable="true" >Unit Selling Price</th>
        <th  data-field="amount" data-filter-control="input" data-align="center" data-sortable="true" >Total Selling Price</th>
        <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >Customer FullName</th>   
           <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >Sells Type</th>
          <th  data-field="grade" data-filter-control="input"  data-align="center" data-sortable="true" >PhoneNumber</th>
       <th data-field="date"  data-sortable="true" data-class="col-sm-3" data-filter-type="datepicker_range">Record Date</th> 
             <th data-field="date"  data-sortable="true" data-class="col-sm-3" data-filter-type="datepicker_range">Return Date</th> 
     <!--  <th id="created_at">-->

        <th >Paid</th> 
    </tr>
    </thead>
    @foreach($post as $posts)

        <tr >
            
             <td>{{$posts['id']}}</td>
            <td>{{$posts['stockname']}}</td>
            <td>{{$posts['quantity']}}</td>
              <td>{{$posts['unit_selling_price']}}</td>
            <td>{{$posts['total_selling_price']}}</td>
                <td>{{$posts['customername']}}</td>
                   <td>{{$posts['sells_type']}}</td>
                    <td>{{$posts['phonenumber']}}</td>
                <td>{{$posts['created_at']}}</td>  
                <td>{{$posts['credit_return_date']}}</td> 
             <td><a href={{"update-credit-admin/".$posts['id']}}><button type="button" class="btn btn-primary btn-sm" 
             onclick="return confirm('Are you sure you want to update this transaction?');">Paid</button></a></td>
        </tr>
    @endforeach
</table>

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
