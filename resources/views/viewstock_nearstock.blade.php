@include('adminheader')

  <div class="content-wrapper">
    
 <section class="content">
  

    <h1> Near Stock Out</h1>
        @if(Session::has('success'))
            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
            @endif
<table id="table"  class="table table-striped" 
  data-show-export="true"
  data-pagination="true"
  data-click-to-select="true"
  data-show-toggle="true"
  data-show-columns="true">
    
    <thead>
    <tr>
    
        <th data-field="ItemId" data-sortable="true" data-align="center">Id</th>
        <th data-field="firstname" data-filter-control="input" data-sortable="true" >Name</th>
      <th  data-field="middlename" data-filter-control="input"  data-align="center" data-sortable="true" >Quantity</th>
        <th  data-field="amount" data-filter-control="input" data-align="center" data-sortable="true" >Price</th>
        <th  data-field="lastname" data-filter-control="input"  data-align="center" data-sortable="true" >Unit</th>
        <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >SupplierFullName</th>   
          <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >PurchaseType</th>
           <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >EndQuantity</th>
          <th  data-field="grade" data-filter-control="input"  data-align="center" data-sortable="true" >Remark</th>
          <th  data-field="refnumber" data-filter-control="input" data-align="center" data-sortable="true">Location</th>     
       <th data-field="date"  data-sortable="true" data-class="col-sm-3" data-filter-type="datepicker_range">Date</th> 
     <!--  <th id="created_at">-->
        
    </tr>
    </thead>
    @foreach($post as $posts)
    @if(($posts->endquantity/$posts->quantity)>0.7)
        <tr class="bg-success">
            
             <td>{{$posts['id']}}</td>
            <td>{{$posts['name']}}</td>
            <td>{{$posts['quantity']}}</td>
            <td>{{$posts['price']}}</td>
              <td>{{$posts['unit']}}</td>
                <td>{{$posts['supplier_fullname']}}</td>
                   <td>{{$posts['purchase_type']}}</td>
                    <td>{{$posts['endquantity']}}</td>
                  <td>{{$posts['description']}}</td>  
      <td>{{$posts['location']}}</td>
      <td>{{$posts['created_at']}}</td>
         
        </tr>
        @elseif(($posts->endquantity/$posts->quantity)>0 && ($posts->endquantity/$posts->quantity)<0.1)
        <tr class="bg-warning">
            
             <td>{{$posts['id']}}</td>
            <td>{{$posts['name']}}</td>
            <td>{{$posts['quantity']}}</td>
            <td>{{$posts['price']}}</td>
              <td>{{$posts['unit']}}</td>
                <td>{{$posts['supplier_fullname']}}</td>
                   <td>{{$posts['purchase_type']}}</td>
                     <td>{{$posts['endquantity']}}</td>
                  <td>{{$posts['description']}}</td>  
      <td>{{$posts['location']}}</td>
      <td id="date_created">{{$posts['created_at']}}</td>
        </tr> 
     @elseif(($posts->endquantity/$posts->quantity) == 0)
        <tr class="bg-danger">
            
             <td>{{$posts['id']}}</td>
            <td>{{$posts['name']}}</td>
            <td>{{$posts['quantity']}}</td>
            <td>{{$posts['price']}}</td>
              <td>{{$posts['unit']}}</td>
                <td>{{$posts['supplier_fullname']}}</td>
                   <td>{{$posts['purchase_type']}}</td>
                     <td>{{$posts['endquantity']}}</td>
                  <td>{{$posts['description']}}</td>  
      <td>{{$posts['location']}}</td>
      <td>{{$posts['created_at']}}</td>
             
        </tr>    
    @else
     <tr>
            
             <td>{{$posts['id']}}</td>
            <td>{{$posts['name']}}</td>
            <td>{{$posts['quantity']}}</td>
            <td>{{$posts['price']}}</td>
              <td>{{$posts['unit']}}</td>
                <td>{{$posts['supplier_fullname']}}</td>
                   <td>{{$posts['purchase_type']}}</td>
                     <td>{{$posts['endquantity']}}</td>
                  <td>{{$posts['description']}}</td>  
      <td>{{$posts['location']}}</td>
      <td>{{$posts['created_at']}}</td>
        </tr>
    @endif    
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
