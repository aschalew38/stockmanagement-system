@include('salesheader')

  <div class="content-wrapper">
    
 <section class="content">

    <h1> Customer List</h1>
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
        <th data-field="firstname" data-filter-control="input" data-sortable="true" >FullName</th>
        <th  data-field="amount" data-filter-control="input" data-align="center" data-sortable="true" >PhoneNumber</th>
        <th  data-field="lastname" data-filter-control="input"  data-align="center" data-sortable="true" >City</th>
        <th >Update</th> 
         <th>Delete</th>  
        
    </tr>
    </thead>
    @foreach($post as $posts)
        <tr>
            
            <td>{{$posts['id']}}</td>
            <td>{{$posts['fullname']}}</td>
            <td>{{$posts['phonenumber']}}</td>
            <td>{{$posts['city']}}</td>
             <td><a href={{"update-customer/".$posts['id']}}><button type="button" class="btn btn-primary btn-sm">Update</button></a></td>
   <td><a href={{"delete-customer/".$posts['id']}}><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?');">
                Delete</button></a></td>
                
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
