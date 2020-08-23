<?php Flasher::flash(); ?>


<script type="text/javascript" src="<?= BASEURL; ?>/jQuery/jquery-3.3.1.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/js/dependsOn.min.js"></script>
<!-- <script type="text/javascript" src="<?= BASEURL; ?>/font/fontawesome/js/fontawesome.min.js"></script> -->
<!-- <script type="text/javascript" src="<?= BASEURL; ?>/js/site.js"></script> -->
<script type="text/javascript" src="<?= BASEURL; ?>/js/popper.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/js/alertify.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/js/Chart.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/DataTables/datatables.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/fonts/fontawesome/js/fontawesome.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/jquery-tabledit/jquery.tabledit.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/js/croppie.js"></script>
<!-- <script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.foundation.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.jqueryui.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.semanticui.min.js"></script> -->
<!-- L<script type="text/javascript" src="<?= BASEURL; ?>/image-picker/image-picker.min.js"></script> -->
<!-- <script type="text/javascript" src="<?= BASEURL; ?>/js/masonry.min.js"></script> -->

<script type="text/javascript" src="<?= BASEURL; ?>/js/script.js"></script>
<?php 
for ($i=1; $i < 13; $i++) { 

  $bulan[$i] = 0;
  foreach ($data["dbpenjualan$i"] as $row) {
    $bulan[$i] += $row['jumlah_menu']; } 
  }

  ?>

  <script type="text/javascript">
    var ctx = document.getElementById('lineChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
      labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
      datasets: [{
        label: "Item Menu yang Terjual",
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [<?= $bulan[1]; ?>, <?= $bulan[2]; ?>, <?= $bulan[3]; ?>, <?= $bulan[4]; ?>, <?= $bulan[5]; ?>, <?= $bulan[6]; ?>, <?= $bulan[7]; ?>, <?= $bulan[8]; ?>, <?= $bulan[9]; ?>, <?= $bulan[10]; ?>, <?= $bulan[11]; ?>, <?= $bulan[12]; ?>],
      }]
    },

    // Configuration options go here
    options: {}
  });
</script>

<?php 
$top5nama = array();
$top5jumlah = array();
foreach ($data['dbpenjualanminggu'] as $row){  
  $row['kode_menu'];
  $top5jumlah[] = $row['jumlah_menu'];  
  $top5nama[] = $row['nama_menu']; 
}


?>
<script type="text/javascript">
  var ctx = document.getElementById('pieChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
      datasets: [{
        data: [<?= $top5jumlah[0]; ?>, <?= $top5jumlah[1]; ?>, <?= $top5jumlah[2]; ?>, <?= $top5jumlah[4]; ?>, <?= $top5jumlah[4]; ?>],
        backgroundColor: ["#873BB6","#87cBB6","#878aB6","#2891ff","#100ff8"]
      }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: ["<?= $top5nama[0]; ?>", "<?= $top5nama[1]; ?>", "<?= $top5nama[2]; ?>"," <?= $top5nama[3]; ?>", "<?= $top5nama[4]; ?>"]
  },

    // Configuration options go here
    options: {}
  });
</script>


<script type="text/javascript">
  filterSelection("all")
  function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("column");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
  }

  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
  }

  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
      }
    }
    element.className = arr1.join(" ");
  }


</script>

<script type="text/javascript">
  /********************************** Get repports functions ************************************/

  function getCustomerReport()
  {
    // var url = "@Url.Action("IndexPartial","YourControllerName")";
    // var model = { Name :"Shyju", Location:"Detroit"};
    var id = $('#customerSelect').find('option:selected').val();
    var Range = $('#CustomerRange').val();
    // console.log(range);
    var start = Range.slice(6,10)+'-'+Range.slice(0,2)+'-'+Range.slice(3,5);
    var end = Range.slice(19,23)+'-'+Range.slice(13,15)+'-'+Range.slice(16,18)+' 23:59:59';
           // ajax delete data to database
           // console.log(end);
           $.ajax({
            url : "http://localhost/posbeck/public/admin/getReportPelanggan",
            type: "POST",
            data: {id: id, start: start, end: end},
            dataType: 'json',
            success: function(data)
            {
              console.log(data);
              // $('#statsSection').html(data);
              var htmlText = "";

              for ( var key in data ) {
               //Access each entry  using the variables below
               // console.log(data[ key ].nama_pelanggan);//data[ key ].id
               //data[ key ].Name
               //data[ key ].Surname
               //data[ key ].Time
               //data[ key ].Date

               htmlText += "<tr class='danger'>";
               // htmlText += "<td>" + data[ key ].id + "</td>";
               htmlText += "<td>" + data[ key ].nama_pelanggan + "</td>";
               htmlText += "<td>" + data[ key ].nama_menu + "</td>";
               htmlText += "<td>" + data[ key ].jumlah_menu + "</td>";
               htmlText += "<td>" + data[ key ].total_harga_menu + "</td>";
               htmlText += "<td>" + data[ key ].tanggal + "</td>";
               htmlText += "<td>" + data[ key ].tipe + "</td>";
               //Append to mydangertwo
               $( "#statsKlien" ).append( htmlText );
             };
             $('#stats').modal('show');

             var table =   $('#example11').DataTable( {
               dom:
               "<'ui grid'"+
               "<'row'"+
               "<'form-inline'"+
               // "<'four wide column'l>"+
               "<'col-sm'B>"+
               "<'col-sm'"+
               "<'float-right 'f>"+
               ">"+
               ">"+
               ">"+
               "<'dt-table'"+
               "<'sixteen wide column'tr>"+
               ">"+
               "<'row'"+
               "<'col-sm'"+
               "<'float-right 'p>"+
               ">"+
               ">"+
               ">",
               columnDefs: [
               {
                 targets: [ 0, 1, 2 ],
                 className: 'mdl-data-table__cell--non-numeric'
               }
               ],
               buttons: [
               { extend: 'colvis', className: 'btn btn-outline-primary' },
               { extend: 'copy', className: 'btn btn-outline-primary' },
               { extend: 'excel', className: 'btn btn-outline-primary' },
               { extend: 'pdf', className: 'btn btn-outline-primary' },
               { extend: 'print', className: 'btn btn-outline-primary' }
               ],
               "lengthMenu": [5],
               "bLengthChange": false,
             } );
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
            alert("error");
          }
        });

         };
       </script>


  <script type="text/javascript">
  /********************************** Get repports functions Produk************************************/

  function getProductReport()
  {
    // var url = "@Url.Action("IndexPartial","YourControllerName")";
    // var model = { Name :"Shyju", Location:"Detroit"};
    var id = $('#ProductSelect').find('option:selected').val();
    var Range = $('#ProductRange').val();
    // console.log(range);
    var start = Range.slice(6,10)+'-'+Range.slice(0,2)+'-'+Range.slice(3,5);
    var end = Range.slice(19,23)+'-'+Range.slice(13,15)+'-'+Range.slice(16,18)+' 23:59:59';
           // ajax delete data to database
           console.log(start);
           $.ajax({
            url : "http://localhost/posbeck/public/admin/getReportProduk",
            type: "POST",
            data: {id: id, start: start, end: end},
            dataType: 'json',
            success: function(data)
            {
              console.log(data);
              // $('#statsSection').html(data);
              var htmlText = "";

              for ( var key in data ) {
               //Access each entry  using the variables below
               // console.log(data[ key ].nama_pelanggan);//data[ key ].id
               //data[ key ].Name
               //data[ key ].Surname
               //data[ key ].Time
               //data[ key ].Date

               htmlText += "<tr class='danger'>";
               // htmlText += "<td>" + data[ key ].id + "</td>";
               htmlText += "<td>" + data[ key ].nama_menu + "</td>";
               htmlText += "<td>" + data[ key ].jumlah_menu + "</td>";
               htmlText += "<td>" + data[ key ].diskon_harga + "</td>";
               htmlText += "<td>" + data[ key ].total_harga_menu + "</td>";
               htmlText += "<td>" + data[ key ].tanggal + "</td>";
               htmlText += "<td>" + data[ key ].pelanggan + "</td>";
               //Append to mydangertwo
               $( "#statsKlien" ).append( htmlText );
             };
             $('#stats').modal('show');

             var table =   $('#example11').DataTable( {
               dom:
               "<'ui grid'"+
               "<'row'"+
               "<'form-inline'"+
               // "<'four wide column'l>"+
               "<'col-sm'B>"+
               "<'col-sm'"+
               "<'float-right 'f>"+
               ">"+
               ">"+
               ">"+
               "<'dt-table'"+
               "<'sixteen wide column'tr>"+
               ">"+
               "<'row'"+
               "<'col-sm'"+
               "<'float-right 'p>"+
               ">"+
               ">"+
               ">",
               columnDefs: [
               {
                 targets: [ 0, 1, 2 ],
                 className: 'mdl-data-table__cell--non-numeric'
               }
               ],
               buttons: [
               { extend: 'colvis', className: 'btn btn-outline-primary' },
               { extend: 'copy', className: 'btn btn-outline-primary' },
               { extend: 'excel', className: 'btn btn-outline-primary' },
               { extend: 'pdf', className: 'btn btn-outline-primary' },
               { extend: 'print', className: 'btn btn-outline-primary' }
               ],
               "lengthMenu": [5],
               "bLengthChange": false,
             } );
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
            alert("error");
          }
        });

         };
       </script>
     </body>
     </html>

