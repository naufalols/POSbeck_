

$(document).ready(function () {
	$('[data-toggle="tooltip"]').tooltip()
})


$('.collapse').collapse({
	toggle: false,
	
})



$(document).ready(function() {
  $('#table-penjualan').DataTable({
    "searching": true, 
    "info": false, 
    autoWidth:         true,  
    "scrollY": "450px",
    "scrollCollapse": true,
    "paging": true,

    dom:
    "<'ui grid'"+
    "<'row'"+
    "<'form-group form-inline'"+

    "<'col-sm'l>"+
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
    buttons: [
    { extend: 'colvis', className: 'btn btn-sm btn-outline-primary' },
    { extend: 'copy', className: 'btn btn-sm btn-outline-primary' },
    { extend: 'excel', className: 'btn btn-sm btn-outline-primary' },
    { extend: 'pdf', className: 'btn btn-sm btn-outline-primary' },
    { extend: 'print', className: 'btn btn-sm btn-outline-primary' }

    ]
  });
  
} );

$(document).ready(function() {
	$('#table_cafe').DataTable({
		"searching": false, 
		"info": false, 
		autoWidth:         true,  
		"scrollY": "200px",
		"scrollCollapse": true,
		"paging": false,

		dom: 'Bfrtip',
		buttons: [
           // { extend: 'copy', className: 'btn-brown' },
           // { extend: 'excel', className: 'btn-brown' },
           { extend: 'pdf', className: 'btn-brown' },
           { extend: 'print', className: 'btn-brown' },
           // { text: 'tambahkan', className: 'btn-success'}
           ]
         });
	
} );



$(document).ready(function() {
	$('#table-pengeluaran').DataTable({
		"searching": false, 
		"info": false, 
		autoWidth:         true,  
		"scrollY": "450px",
		"scrollY": "800px",
		"scrollCollapse": true,
		"pageLength": 8,
		// "paging": true,

		dom: 'Bfrtip',
		buttons: [
           // { extend: 'copy', className: 'btn-brown' },
           // { extend: 'excel', className: 'btn-brown' },
           { extend: 'pdf', className: 'btn-brown' },
           { extend: 'print', className: 'btn-brown' },
           // { text: 'tambahkan', className: 'btn-success'}
           ]
         });
})

$(document).ready(function() {
	$('#table-pemasukan').DataTable({
		"searching": false, 
		"info": false, 
		autoWidth:         true,  
		"scrollY": "450px",
		"scrollCollapse": true,
		"paging": true,

		dom: 'Bfrtip',
		buttons: [
           // { extend: 'copy', className: 'btn-brown' },
           // { extend: 'excel', className: 'btn-brown' },
           { extend: 'pdf', className: 'btn-brown' },
           { extend: 'print', className: 'btn-brown' },
           // { text: 'tambahkan', className: 'btn-success'}
           ]
         });
})

$(document).ready(function() {
	$('#table-pembukuan').DataTable({
		"searching": false, 
		"info": false, 
		autoWidth:         true,  
		"scrollY": "450px",
		"scrollCollapse": true,
		"paging": true,

		dom: 'Bfrtip',
		buttons: [
           // { extend: 'copy', className: 'btn-brown' },
           // { extend: 'excel', className: 'btn-brown' },
           { extend: 'pdf', className: 'btn-brown' },
           { extend: 'print', className: 'btn-brown' },
           // { text: 'tambahkan', className: 'btn-success'}
           ]
         });
})

$(document).ready(function() {
	// $('#table-produk').DataTable({

	// 	"info": false, 
	// 	autoWidth:         true,  
	// 	"scrollY": "450px",
	// 	"scrollCollapse": true,
	// 	"paging": true,
	// 	"select": false,
	// 	dom:
	// 	"<'ui grid'"+
	// 	"<'row'"+
	// 	"<'form-group form-inline'"+
	// 	// "<'four wide column'l>"+
	// 	"<'col-sm'l>"+
	// 	"<'col-sm'B>"+
	// 	"<'col-sm'"+
	// 	"<'float-right 'f>"+
	// 	">"+
	// 	">"+
	// 	">"+
	// 	"<'dt-table'"+
	// 	"<'sixteen wide column'tr>"+
	// 	">"+
	// 	"<'row'"+
	// 	"<'col-sm'"+
	// 	"<'float-right 'p>"+
	// 	">"+
	// 	">"+
	// 	">",
	// 	buttons: [
	// 	{ extend: 'copy', className: 'btn btn-outline-primary' },
	// 	{ extend: 'excel', className: 'btn btn-outline-primary' },
	// 	{ extend: 'pdf', className: 'btn btn-outline-primary' },
	// 	{ extend: 'print', className: 'btn btn-outline-primary' },
	// 	{ text: 'tambahkan', className: 'btn btn-outline-primary'}
	// 	]
	// });
})

// $(document).ready(function() {
// 	$('#example11').DataTable( {
// 		dom:
// 		"<'ui grid'"+
// 		"<'row'"+
// 		"<'form-inline'"+
// 		// "<'four wide column'l>"+
// 		"<'col-sm'B>"+
// 		"<'col-sm'"+
// 		"<'float-right 'f>"+
// 		">"+
// 		">"+
// 		">"+
// 		"<'dt-table'"+
// 		"<'sixteen wide column'tr>"+
// 		">"+
// 		"<'row'"+
// 		"<'col-sm'"+
// 		"<'float-right 'p>"+
// 		">"+
// 		">"+
// 		">",
// 		columnDefs: [
// 		{
// 			targets: [ 0, 1, 2 ],
// 			className: 'mdl-data-table__cell--non-numeric'
// 		}
// 		],
// 		buttons: [
// 		{ extend: 'colvis', className: 'btn btn-outline-primary' },
// 		{ extend: 'copy', className: 'btn btn-outline-primary' },
// 		{ extend: 'excel', className: 'btn btn-outline-primary' },
// 		{ extend: 'pdf', className: 'btn btn-outline-primary' },
// 		{ extend: 'print', className: 'btn btn-outline-primary' }
// 		],
// 		"lengthMenu": [5],
// 		"bLengthChange": false,
// 	} );
// } );


//////////////////////////////// modal refreh when close////////////////////////////////
$('#stats').on('hidden.bs.modal', function () {
	location.reload();
});

/////////////////////////////////end//////////////////////////////////////
$(document).ready(function() {
	$('#statsTable').DataTable({
		"searching": false, 
		"info": false, 
		autoWidth:         true,  
		"scrollY": "450px",
		"scrollCollapse": true,
		"paging": true,

		dom: 'Bfrtip',
		buttons: [
           // { extend: 'copy', className: 'btn btn-outline-primary' },
           // { extend: 'excel', className: 'btn-brown' },
           { extend: 'pdf', className: 'btn-brown' },
           { extend: 'print', className: 'btn-brown' },
           // { text: 'tambahkan', className: 'btn-success'}
           ]
         });
});

//////////////////////////////////////////////////table vie//////////////////////////////////////
// $(function viewData() {
// 	$.ajax({
// 		url: 'http://localhost/posbeck/public/admin/getAllMenu',
// 		method: 'GET',

// 	}).done(function(data){
// 		$('tbody').html(data)
// 		tableData()
// 	})
// });
////////////////////////////////////////////////// table edit //////////////////////////////////////////
// $(function(){
// 	$('#table-produk').Tabledit({
// 		url: 'http://localhost/posbeck/public/admin/updateMenu',
// 		hideIdentifier: true,

// 		columns: {
// 			identifier: [0, 'id'],
// 			editable: [[1, 'nama'], [2, 'harga'], [3, 'kategori', '{"1": "Cukur", "2": "Pomade", "3": "makanan"}'], [4, 'stok']]
// 		},
// 		buttons: {
// 			edit: {
// 				class: 'btn btn-sm btn-outline-success',
// 				html: '<span class="oi oi-pencil"></span>',
// 				action: 'edit'
// 			},
// 			delete: {
// 				class: 'btn btn-sm btn-outline-success',
// 				html: '<span class="oi oi-trash"></span>',
// 				action: 'delete'
// 			},
// 		},
// 	});
// });

function viewData() {
	$.ajax({
		url : 'http://localhost/posbeck/public/admin/getAllmenu',
		method : 'GET',
		dataType : 'json',
		success: function(data)
		{
			// console.log(data);
      // $('#statsSection').html(data);
      var htmlText = "";

      for ( var key in data ) {


      	htmlText += "<tr class='danger'>";
       // htmlText += "<td>" + data[ key ].id + "</td>";
       htmlText += "<td>" + data[ key ].kode_menu + "</td>";
       htmlText += "<td>" + data[ key ].nama_menu + "</td>";
       htmlText += "<td>" + data[ key ].harga_menu + "</td>";
       htmlText += "<td>" + data[ key ].kategori + "</td>";
       htmlText += "<td>" + data[ key ].stok_menu + "</td>";
       htmlText += "<td>" + data[ key ].gambar + "</td>";
       //Append to mydangertwo

     };
     $( "#tbody-produk" ).append( htmlText );
     var editTable = $('#table-produk').Tabledit({
      url: 'http://localhost/posbeck/public/admin/updateMenu',
      method : 'POST',

      columns: {
       identifier: [0, 'id'],
       editable: [[1, 'nama'], [2, 'harga'], [3, 'kategori'], [4, 'stok']]
     },
     buttons: {
       edit: {
        class: 'btn btn-sm btn-outline-primary',
        html: '<span class="oi oi-pencil"></span>',
        action: 'edit'
      },
      delete: {
        class: 'btn btn-sm btn-outline-primary',
        html: '<span class="oi oi-trash"></span>',
        action: 'delete'
      },
      confirm: {
        class: 'btn btn-sm btn-outline-danger',
        html: 'Yakin?'
      },
    },
   
    onSuccess: function(data, textStatus, jqXHR) {
      $('#table-produk').DataTable().ajax.reload();

    },
    onFail: function(jqXHR, textStatus, errorThrown) {
      console.log('onFail(jqXHR, textStatus, errorThrown)');
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
    },
    onAjax: function(action, serialize) {
      console.log('onAjax(action, serialize)');
      console.log(action);
      console.log(serialize);
    }
  });
     var table = $('#table-produk').DataTable({

      "info": false, 
      autoWidth:         true,  
      "scrollY": "450px",
      "scrollCollapse": true,
      "paging": true,
      "select": false,
      dom:
      "<'ui grid'"+
      "<'row'"+
      "<'form-group form-inline'"+

      "<'col-sm'l>"+
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
      buttons: [
      { extend: 'colvis', className: 'btn btn-sm btn-outline-primary' },
      { extend: 'copy', className: 'btn btn-sm btn-outline-primary' },
      { extend: 'excel', className: 'btn btn-sm btn-outline-primary' },
      { extend: 'pdf', className: 'btn btn-sm btn-outline-primary' },
      { extend: 'print', className: 'btn btn-sm btn-outline-primary' },
      { 
       text: 'tambahkan', className: 'btn btn-sm btn-outline-primary tambahkan',
       action: function ( e, dt, node, config ) {
        $('.tambahkan').attr(
        {
         "data-toggle": "modal",
         "data-target": "#tambahmenu"
        }
       )}
      }
      ]
    });

     },
     error: function (jqXHR, textStatus, errorThrown)
     {
      alert("error");
    },
  }).done(function(){
    $('#table-produk').DataTable().ajax.reload();
  });
};

function viewDataPelanggan() {
  $.ajax({
    url : 'http://localhost/posbeck/public/admin/getAllPelanggan',
    method : 'GET',
    dataType : 'json',
    success: function(data)
    {
      console.log(data);
              // $('#statsSection').html(data);
              var htmlText = "";

              for ( var key in data ) {


                htmlText += "<tr class='danger'>";
               // htmlText += "<td>" + data[ key ].id + "</td>";
               htmlText += "<td>" + data[ key ].id + "</td>";
               htmlText += "<td>" + data[ key ].nama_pelanggan + "</td>";
               htmlText += "<td>" + data[ key ].nomor_pelanggan + "</td>";
               htmlText += "<td>" + data[ key ].diskon + "</td>";
               htmlText += "<td>" + data[ key ].dibuat + "</td>";

               //Append to mydangertwo

             };
             $( "#tbody-pelanggan" ).append( htmlText );
             var editTable = $('#table-pelanggan').Tabledit({
              url: 'http://localhost/posbeck/public/admin/updatePelanggan',

              columns: {
                identifier: [0, 'id'],
                editable: [[1, 'nama'], [2, 'nomor'],  [3, 'diskon']]
              },
              buttons: {
                edit: {
                  class: 'btn btn-sm btn-outline-primary',
                  html: '<span class="oi oi-pencil"></span>',
                  action: 'edit'
                },
                delete: {
                  class: 'btn btn-sm btn-outline-primary',
                  html: '<span class="oi oi-trash"></span>',
                  action: 'delete'
                },
                confirm: {
                  class: 'btn btn-sm btn-outline-danger',
                  html: 'Yakin?'
                },
              }
            });
             var table = $('#table-pelanggan').DataTable({

              "info": false, 
              autoWidth:         true,  
              "scrollY": "450px",
              "scrollCollapse": true,
              "paging": true,
              "select": false,
              dom:
              "<'ui grid'"+
              "<'row'"+
              "<'form-group form-inline'"+

              "<'col-sm'l>"+
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
              buttons: [
              { extend: 'colvis', className: 'btn btn-sm btn-outline-primary' },
              { extend: 'copy', className: 'btn btn-sm btn-outline-primary' },
              { extend: 'excel', className: 'btn btn-sm btn-outline-primary' },
              { extend: 'pdf', className: 'btn btn-sm btn-outline-primary' },
              { extend: 'print', className: 'btn btn-sm btn-outline-primary' },
              { 
                text: 'tambahkan', className: 'btn btn-sm btn-outline-primary tambahkan',
                action: function ( e, dt, node, config ) {
                  $('.tambahkan').attr(
                  {
                    "data-toggle": "modal",
                    "data-target": "#tambahpelanggan"
                  }
                  )}
                }
                ]
              });

     },
     error: function (jqXHR, textStatus, errorThrown)
     {
      alert("error");
    },
  }).done(function(data){
    $('#pelanggan').DataTable().ajax.reload();
  });
};

// input file gambar

$(document).ready( function() {
  $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });

  $('.btn-file :file').on('fileselect', function(event, label) {

    var input = $(this).parents('.input-group').find(':text'),
    log = label;

    if( input.length ) {
      input.val(log);
    } else {
      if( log ) alert(log);
    }

  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img-upload').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function(){
    readURL(this);
  });   
});

$('.nav-link').click(function(){
	$('.nav-link').removeClass('active');
	$(this).addClass('active');
});


// $("select").imagepicker({
// 	"show_label": true,
// });




$('#myModal').on('shown.bs.modal', function () {
	$('#myInput').trigger('focus')
})


// perintah preloader

$(document).ready(function(){
	$(".preloader").fadeOut();
});



// dependsOn pengeluaran
$(document).ready(function () {
	$('#modalpengeluaran .BON').dependsOn({
		'#modalpengeluaran input[type="radio"]': {
			values: ['BON', 'true']
		}
	});
});

$(document).ready(function () {
	$('#modalpengeluaran .BAYAR').dependsOn({
		'#modalpengeluaran input[type="radio"]': {
			values: ['BAYAR', 'true']
		}
	});
});

$(document).ready(function () {
	$('#modalpengeluaran .BELI').dependsOn({
		'#modalpengeluaran input[type="radio"]': {
			values: ['BELI', 'true']
		}
	});
});

// dependsOn pemasukan
$(document).ready(function () {
	$('#modalpemasukan .BON').dependsOn({
		'#modalpemasukan input[type="radio"]': {
			values: ['BON', 'true']
		}
	});
});

$(document).ready(function () {
	$('#modalpemasukan .BAYAR').dependsOn({
		'#modalpemasukan input[type="radio"]': {
			values: ['BAYAR', 'true']
		}
	});
});

$(document).ready(function () {
	$('#modalpemasukan .BELI').dependsOn({
		'#modalpemasukan input[type="radio"]': {
			values: ['BELI', 'true']
		}
	});
});

$(document).ready(function () {
	$('.alertkasir').click(function(event){
		alertify.alert('Ups!','anda belum membuka toko',function(){ alertify.success('klik POS di pojok kiri atas'); }).show();
	});
});


$('input[name="dates"]').daterangepicker();

$(document).on('click', '#close-preview', function(){ 
  $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
      function () {
       $('.image-preview').popover('show');
     }, 
     function () {
       $('.image-preview').popover('hide');
     }
     );    
  });

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
      type:"button",
      text: 'x',
      id: 'close-preview',
      style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
      trigger:'manual',
      html:true,
      title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
      content: "There's no image",
      placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
      $('.image-preview').attr("data-content","").popover('hide');
      $('.image-preview-filename').val("");
      $('.image-preview-clear').hide();
      $('.image-preview-input input:file').val("");
      $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
      var img = $('<img/>', {
        id: 'dynamic',
        width:250,
        height:200
      });      
      var file = this.files[0];
      var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
          $(".image-preview-input-title").text("Change");
          $(".image-preview-clear").show();
          $(".image-preview-filename").val(file.name);            
          img.attr('src', e.target.result);
          $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
      });  
  });


// $('#basicTest .subject').dependsOn({
// 	'#basicTest input[type="checkbox"]': {
// 		checked: true
// 	}
// });
// $(document).ready(function(){

// 	 $('#itemmenu').submit( function() {

//         var pelanggan = $("#pelanggan").val();
//         var nota = $("#nota").val();
//         var menu = $("#menu").val();

//          alert(itemmenu);
//         $.ajax({  
//             type: "POST",  
//             url: "localhost/posbeck/public/home/inputMenu",  
//             data: {pelanggan: pelanggan, nota: nota, menu: menu},
//             success: function(){  
//                 alert("success");  
//             },
//             error: function(){  
//                 alert("fatal");  
//             },

//         });
//         return false;
//     });
// });


// submit with <a> keranjang




// function notaTable(str) {
//   if (str=="") {
//     document.getElementById("txtHint").innerHTML="";
//     return;
//   } 
//   if (window.XMLHttpRequest) {
//     // code for IE7+, Firefox, Chrome, Opera, Safari
//     xmlhttp=new XMLHttpRequest();
//   } else { // code for IE6, IE5
//     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }
//   xmlhttp.onreadystatechange=function() {
//     if (this.readyState==4 && this.status==200) {
//       document.getElementById("txtHint").innerHTML=this.responseText;
//     }
//   }
//   xmlhttp.open("GET","getuser.php?q="+str,true);
//   xmlhttp.send();
// }