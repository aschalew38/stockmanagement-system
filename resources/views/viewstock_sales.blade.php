@include('salesheader')

  <div class="content-wrapper">
    
 <section class="content">

    <h1> Stock List</h1>
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
  
        <th  data-field="lastname" data-filter-control="input"  data-align="center" data-sortable="true" >Unit</th>
        <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >SupplierFullName</th>   
          <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >PurchaseType</th>
           <th  data-field="parentphone"data-filter-control="input"  data-align="center" data-sortable="true" >EndQuantity</th>
          <th  data-field="grade" data-filter-control="input"  data-align="center" data-sortable="true" >Store Name</th>
            <th  data-field="grade" data-filter-control="input"  data-align="center" data-sortable="true" >Remark</th>
          <th  data-field="refnumber" data-filter-control="input" data-align="center" data-sortable="true">Location</th>     
       <th data-field="date"  data-sortable="true" data-class="col-sm-3" data-filter-type="datepicker_range">Date</th> 
 
        
    </tr>
    </thead>
    @foreach($post as $posts)
    @if(($posts->endquantity/$posts->quantity)>0.7)
        <tr class="bg-success">
            
             <td>{{$posts['id']}}</td>
            <td>{{$posts['name']}}</td>
            <td>{{$posts['quantity']}}</td>
            
              <td>{{$posts['unit']}}</td>
                <td>{{$posts['supplier_fullname']}}</td>
                   <td>{{$posts['purchase_type']}}</td>
                    <td>{{$posts['endquantity']}}</td>
                  <td>{{$posts['storename']}}</td>  
                  <td>{{$posts['description']}}</td>  
      <td>{{$posts['location']}}</td>
      <td>{{$posts['created_at']}}</td>
                
        </tr>
        @elseif(($posts->endquantity/$posts->quantity)>0 && ($posts->endquantity/$posts->quantity)<0.1)
        <tr class="bg-warning">
            
             <td>{{$posts['id']}}</td>
            <td>{{$posts['name']}}</td>
            <td>{{$posts['quantity']}}</td>
           
              <td>{{$posts['unit']}}</td>
                <td>{{$posts['supplier_fullname']}}</td>
                   <td>{{$posts['purchase_type']}}</td>
                     <td>{{$posts['endquantity']}}</td>
                       <td>{{$posts['storename']}}</td>  
                  <td>{{$posts['description']}}</td>  
      <td>{{$posts['location']}}</td>
      <td id="date_created">{{$posts['created_at']}}</td>

        </tr> 
     @elseif(($posts->endquantity/$posts->quantity) == 0)
        <tr class="bg-danger">
            
             <td>{{$posts['id']}}</td>
            <td>{{$posts['name']}}</td>
            <td>{{$posts['quantity']}}</td>
           
              <td>{{$posts['unit']}}</td>
                <td>{{$posts['supplier_fullname']}}</td>
                   <td>{{$posts['purchase_type']}}</td>
                     <td>{{$posts['endquantity']}}</td>
                       <td>{{$posts['storename']}}</td>  
                  <td>{{$posts['description']}}</td>  
      <td>{{$posts['location']}}</td>
      <td>{{$posts['created_at']}}</td>
        </tr>    
    @else
     <tr>
            
             <td>{{$posts['id']}}</td>
            <td>{{$posts['name']}}</td>
            <td>{{$posts['quantity']}}</td>
        
              <td>{{$posts['unit']}}</td>
                <td>{{$posts['supplier_fullname']}}</td>
                   <td>{{$posts['purchase_type']}}</td>
                     <td>{{$posts['endquantity']}}</td>
                       <td>{{$posts['storename']}}</td>  
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


<!--<script>
 'use strict';

const oneHour = 60 * 60 * 1000;
const oneDay = 24 * oneHour;
const oneYear = 365 * oneDay;
const oneLeapYear = 366 * oneDay;
const fourYears = 3 * oneYear + oneLeapYear;
const globalTimeDifference = new Date('December 9, 2012').getTime() - new Date('April 1, 2005').getTime();

const minEurDate = new Date(1900, 2, 1);
const maxEurDate = new Date(2100, 1, 1);

function dayOfWeekString(day) {
  const dayOfWeekStrings = {
    0: 'Sunday',
    1: 'Monday',
    2: 'Tuesday',
    3: 'Wednesday',
    4: 'Thursday',
    5: 'Friday',
    6: 'Saterday',
  };
  return dayOfWeekStrings[day];
}

function monthStringEth(month) {
  const ethMonthStrings = {
    1: 'Meskerem ',
    2: 'Tikimt ',
    3: 'Hidar ',
    4: 'Tahsas ',
    5: 'Tir ',
    6: 'Yekatit ',
    7: 'Megabit ',
    8: 'Meyazya ',
    9: 'Ginbot ',
    10: 'Sene ',
    11: 'Hamle ',
    12: 'Nehase ',
    13: 'Pagume ',
  };
  return ethMonthStrings[month];
}

function ethDateTime(date, mon, yr, hr, min, sec) {//mon in human form
  if (date <= 30) {
    this.date = date;
  } else {
    throw new Error('Invalid Ethiopian Date');
  }
  if (yr > 200) {
    this.year = yr;
  } else {
    this.year = yr + 1900;
  }
  this.month = mon;
  this.hour = hr;
  this.minute = min;
  this.second = sec;
  this.getDay = ethDayOfWeek;
  this.dateString = monthStringEth(mon) + this.date + ', ' + this.year;
  if (hr < 13) {
    this.timeString = leftpad(hr) + ':' + leftpad(min) + ':' + leftpad(sec) + ' a.m.';
  } else {
    this.timeString = leftpad(hr - 12) + ':' + leftpad(min) + ':' + leftpad(sec) + ' p.m.';
  }
  this.dateWithDayString = dayOfWeekString(this.getDay()) + ', ' + this.dateString;
  this.dateTimeString = this.dateString + ', ' + this.timeString;
  this.fullDateTimeString = this.dateTimeString + ', ' + dayOfWeekString(this.getDay()) + '.';
  function ethDayOfWeek() {
    return (this.year + 2 * this.month + this.date + ethDifference(this.year)) % 7;
    function ethDifference(ethYear) {
      return -(Math.floor((2023 - ethYear) / 4));
    }
  }
}

function eurDateIsConvertible(eurDate) {
  return eurDate >= minEurDate && eurDate <= maxEurDate;
}

function toEthiopianDateTime(eurDate) {
  if (!eurDateIsConvertible(eurDate)) return false;
  var difference = eurDate.getTime() - new Date(Date.UTC(1971, 8, 12)).getTime();
  var fourYearsPassed = Math.floor(difference / fourYears);
  var remainingYears = Math.floor((difference - fourYearsPassed * fourYears) / oneYear);
  if (remainingYears === 4) {
    remainingYears = 3;
  }
  var remainingMonths = Math.floor((difference - fourYearsPassed * fourYears - remainingYears * oneYear) / (30 * oneDay));
  var remainingDays = Math.floor((difference - fourYearsPassed * fourYears - remainingYears * oneYear - remainingMonths * 30 * oneDay) / oneDay);
  var remainingHours = eurDate.getHours(); // - 6 to account for traditional local time
  if (remainingHours < 0) {
    remainingHours += 24;
  }
  var ethDate = new ethDateTime(remainingDays + 1, remainingMonths + 1, remainingYears + 4 * fourYearsPassed + 1964, remainingHours, eurDate.getMinutes(), eurDate.getSeconds());
  return ethDate;
}

function toEthiopianDateTimeString(eurDate) {
  const EthDateIn = toEthiopianDateTime(eurDate);
  return [EthDateIn.dateString, EthDateIn.timeString];
}

function toEthiopianDateString(eurDate) {
  return toEthiopianDateTime(eurDate).dateString;
}

function toEthiopianTimeString(eurDate) {
  return toEthiopianDateTime(eurDate).timeString;
}

function toEuropeanDate(ethDate) {
  var initialEuropean = new Date(new Date(Date.UTC(ethDate.year, ethDate.month - 1, ethDate.date)).getTime() + globalTimeDifference);
  if (ethDate.month === 13) {
    var maxDate;
    if (ethDate.year % 4 === 3)
      maxDate = 6;
    else
      maxDate = 5;
    if (ethDate.date > maxDate) {
      const errMsg = 'Pagume Only has ' + maxDate + ' days at year ' + ethDate.year + '. Please select another day.';
      return errMsg;
    }
  }
  for (var count = -8; count < 9; count++) {
    const eurDate = new Date(initialEuropean.getTime() + count * oneDay);
    var difference = eurDate.getTime() - new Date(Date.UTC(1971, 8, 12)).getTime();
    var fourYearsPassed = Math.floor(difference / fourYears);
    var remainingYears = Math.floor((difference - fourYearsPassed * fourYears) / oneYear);
    if (remainingYears === 4) {
      remainingYears = 3;
    }
    var remainingMonths = Math.floor((difference - fourYearsPassed * fourYears - remainingYears * oneYear) / (30 * oneDay));
    var remainingDays = Math.floor((difference - fourYearsPassed * fourYears - remainingYears * oneYear - remainingMonths * 30 * oneDay) / oneDay);
    if (ethDate.date === remainingDays + 1 && ethDate.month === remainingMonths + 1) {
      if (!eurDateIsConvertible(eurDate)) return false;
      return eurDate;
    }
  }
}

function toEuropeanDateString(ethDate) {
  var EuropeanDate = toEuropeanDate(ethDate);
  EuropeanDate = EuropeanDate.toUTCString().substring(0, 16) + ' (at GMT+0)';
  return EuropeanDate;
}

function leftpad(Num, length) {
  length = length || 2;
  return ('000000000' + Num).slice(-length);
}

const minEthYear = toEthiopianDateTime(minEurDate).year;
const maxEthYear = toEthiopianDateTime(maxEurDate).year;

const limits = {
  ethiopianCalendarYear: {
    min: minEthYear,
    max: maxEthYear
  },
  europeanCalendarDate: {
    min: minEurDate,
    max: maxEurDate
  }
};

const converter = {
  dateTime: {
    toEthiopian: toEthiopianDateTime,
    toEuropean: toEuropeanDate
  },
  string: {
    date: {
      toEthiopian: toEthiopianDateString,
      toEuropean: toEuropeanDateString
    },
    time: {
      toEthiopian: toEthiopianTimeString
    },
    dateTime: {
      toEthiopian: toEthiopianDateTimeString
    }
  }
};

const converterDateTime = converter.dateTime;
const converterString = converter.string;

module.exports= {
  ethDateTime,
  limits,
  converterDateTime,
  converterString
};
</script>-->
</section>




@include('dashboardfooter')
