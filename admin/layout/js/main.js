$(document).ready(function(){



          $('#job-a-btn-option').click(function(){
            $.ajax({
              url: 'insert_job.php',
              method : 'POST',
              data:  $('#job-form-info').serialize(),
              success: function(data)
              {
                $('.err-msg').html(data);
              }
            });

            });


  $('#alr').click(function(){
    alert('?هل انت متاكد من انك قمت بارسال المنتج ');
  })


$('.up-ava').change(function(){

  $('#sb-bt').css('visibility', 'visible');
});




    $('#open-add-page').click(function(){
      $('#add-page').show();
    })

        $('#close').click(function(){
          $('#add-page').css('display', 'none');
        })









// ajax
$('#a-btn-option').click(function(){


  $.ajax({
    url: 'insert_user.php',
    method : 'POST',
    data:  $('#form-info').serialize(),
    success: function(data)
    {
      $('.err-msg').html(data);
    }
  });

  });
  $('#a-btn-option2').click(function(){


    $.ajax({
      url: 'insert_player.php',
      method : 'POST',
      data:  $('#form-info2').serialize(),
      success: function(data)
      {
        $('.err-msg').html(data);
      }
    });
    });



$('#ca-btn-option').click(function(){


  $.ajax({
    url: 'insert_category.php',
    method : 'POST',
    data:  $('#ca-form-info').serialize(),
    success: function(data)
    {
      $('.err-msg').html(data);
    }
  });



});

$("#pro-btn-option").click(function(){

  var formData = new FormData("#pro-form-info");
    // Check file selected or not
alert(formData);

       $.ajax({
          url: 'insert_product.php',
          type: 'post',
          data: {formDate:formData},
          contentType: false,
          processData: false,
          success: function(data){
            $('#err-msg').html(data);
          }
       });

});


});


new Chartist.Line('.ct-chart', {
  labels: [1, 2, 3, 4, 5, 6, 7, 8],
  series: [
    [5, 9, 7, 8, 5, 3, 5, 4]
  ]
}, {
  low: 0,
  showArea: true
});


function tableone() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("users-search");
  filter = input.value.toUpperCase();
  table = document.getElementById("users-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}




function tabletwo() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("categories-search");
  filter = input.value.toUpperCase();
  table = document.getElementById("categories-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}



function tablethree() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("movies-search");
  filter = input.value.toUpperCase();
  table = document.getElementById("movies-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}



function tablefor() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("series-search");
  filter = input.value.toUpperCase();
  table = document.getElementById("series-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
