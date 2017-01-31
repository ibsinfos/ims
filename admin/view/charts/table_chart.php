<head>
    <script src="js/jquery.min.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/modules/data.js"></script>
<script src="js/modules/exporting.js"></script>
<script src="js/jquery.highchartTable.js" type="text/javascript"></script>
    <script type="text/javascript">
//(function($){ // encapsulate jQuery
//
//$(function () {
//    $('#container').highcharts({
//        data: {
//            table: document.getElementById('datatable')
//        },
////        chart: {
////            type: 'area'        
////        },
//        title: {
//                text: 'Average Monthly Sales and QTY'
//            },
//        yAxis: {
//            allowDecimals: false,
//            title: {
//                text: 'Units'
//            }
//        },
//        tooltip: {
//            formatter: function() {
//                return '<b>'+ this.series.name +'</b><br/>'+
//                    this.y +' '+ this.x.toLowerCase();
//            }
//        }
//    });
//});
//})(jQuery);
//graph_absInvertedFormatter = function (value) {
//     return Math.abs(value) * 1;
//};

$(document).ready(function() {
  $('table.highchart').highchartTable({});
});
</script>
</head>
<body>
    <div id="container" style="width:100%; height:400px;">
    <br>
    <table class="highchart" 
     data-graph-container-before="1" data-graph-type="spline"
     data-graph-xaxis-rotation="-34" data-graph-subtitle-text="Source: Key Institute.">
        <caption>Yearly Reports</caption>
    <thead>
        <tr>                                  
            <th>Month</th>            
            <th data-graph-type="column">Income</th>
            <th data-graph-type="spline">Sales</th>
            <th data-graph-type="spline">Qty</th>
        </tr>
     </thead>
     <tbody>
        <tr>
            <td>January</td>
            <td>1800</td>
            <td>150</td>
            <td>75</td>            
        </tr>
        <tr>
            <td>February</td>
            
            <td>1200</td>
            <td>120</td>
            <td>25</td>
        </tr>
        <tr>
            <td>March</td>
            
            <td>1000</td>
            <td>180</td>
            <td>15</td>
        </tr>
        <tr>
            <td>April</td>
            
            <td>1900</td>
            <td>180</td>
            <td>15</td>
        </tr>
        <tr>
            <td>May</td>
            
            <td>2100</td>
            <td>180</td>
            <td>15</td>
        </tr>
        <tr>
            <td>June</td>
            
            <td>2100</td>
            <td>180</td>
            <td>15</td>
        </tr>
        <tr>
            <td>July</td>
            
            <td>2100</td>
            <td>180</td>
            <td>15</td>
        </tr>
    </tbody>
</table>
</div>
</body>