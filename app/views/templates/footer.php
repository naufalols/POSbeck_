<?php Flasher::flash(); ?>


<script type="text/javascript" src="<?= BASEURL; ?>/jQuery/jquery-3.3.1.js"></script>
<!-- <script type="text/javascript" src="<?= BASEURL; ?>/font/fontawesome/js/fontawesome.min.js"></script> -->
<!-- <script type="text/javascript" src="<?= BASEURL; ?>/js/site.js"></script> -->
<script type="text/javascript" src="<?= BASEURL; ?>/js/popper.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/js/dependsOn.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/js/alertify.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/js/Chart.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/DataTables/datatables.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/fonts/fontawesome/js/fontawesome.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/daterangepicker/daterangepicker.js"></script>
<!-- <script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.foundation.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.jqueryui.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.semanticui.min.js"></script> -->
<!-- L<script type="text/javascript" src="<?= BASEURL; ?>/image-picker/image-picker.min.js"></script> -->
<!-- <script type="text/javascript" src="<?= BASEURL; ?>/js/masonry.min.js"></script> -->

<script type="text/javascript" src="<?= BASEURL; ?>/js/script.js"></script>


<script type="text/javascript">
filterKeranjang("all")
function filterKeranjang(c) {
  var x, i;
  x = document.getElementsByClassName("keranjang");
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
filterMenu("all")
function filterMenu(c) {
  var x, i;
  x = document.getElementsByClassName("menu");
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
  function searchMenu() {
  // console.log("masuk")
    var input, filter, menu, classMenu, middle, h5, i, txtValue;
    input = document.getElementById("searchMenu");
    filter = input.value.toUpperCase();
    menu = document.getElementById("menu");
    middle = menu.getElementsByClassName("middle");
    classMenu = menu.getElementsByClassName("menu");
    for (i = 0; i < middle.length; i++) {
        h5 = middle[i].getElementsByTagName("h5")[0];
        txtValue = h5.textContent || h5.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
             classMenu[i].style.display = "";
        } else {
             classMenu[i].style.display = "none";
        }
    }
}
</script>

<!-- <script type="text/javascript">
   function getKeranjang()
  {
    // var url = "@Url.Action("IndexPartial","YourControllerName")";
    // var model = { Name :"Shyju", Location:"Detroit"};
    var id = $('#customerSelect').find('option:selected').val();
    var Range = $('#CustomerRange').val();
    // console.log(range);
    var start = Range.slice(6,10)+'-'+Range.slice(0,2)+'-'+Range.slice(3,5);
    var end = Range.slice(19,23)+'-'+Range.slice(13,15)+'-'+Range.slice(16,18)+' 23:59:59';
           // ajax delete data to database
           console.log(end);
           $.ajax({
            url : "http://localhost/posbeck/public/admin/getReportPelanggan",
             type: "POST",
             data: {id: id, start: start, end: end},
             dataType: 'json',
             success: function(data)
             {
              console.log(data);
              // $('#statsSection').html(data);
               $('#inimi').val(data.nama_pelanggan);
              $('#stats').modal('show');

              // var table = $('#Table').DataTable( {
              //   dom: 'T<"clear">lfrtip',
              //   tableTools: {
              //     'bProcessing'    : true
              //   }
              // });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert("error");
            }
          });

         };
       </script>
</script> -->
</body>
</html>