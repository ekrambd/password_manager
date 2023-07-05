$(document).ready(function(){
  
	$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   
   
   var base_url = 'http://localhost/password_manager';

   var ajax_url = '';

   
   var categoryTable = $('#category-table').DataTable({
   	    searching: true,
        processing: true,
        serverSide: true,
        ordering: false,
        stateSave: true,
        ajax: {
          url: base_url+"/categories", 
        },

        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'category_name', name: 'category_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


   var passwordTable = $('#password-table').DataTable({
        searching: true,
        processing: true,
        serverSide: true,
        ordering: false,
        stateSave: true,
        ajax: {
          url: base_url+"/password", 
        },

        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'title', name: 'title'},
            {data: 'user_name', name: 'user_name'},
            {data: 'show_password', name: 'show_password'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

   $(document).on('click', '.show-password', function(e){
      e.preventDefault();
      var int_password_id = $(this).data('id');
      
      $('#google-2fa').modal('show');
      ajax_url = base_url+"/setup-2fa";
            $.ajax({

                 url: ajax_url,
                 type:"POST",
                 dataType:"html",
                 success:function(data) {
                    $('#google-2fa-body').html(data);  
                    $('.password_id').val(int_password_id);
                 },
                        
            });
   });



   $(document).on('click', '.delete-category', function(e){
       e.preventDefault();
       var int_category_id = $(this).data('id');
       if(confirm('Do you want to delete the category?'))
       {
          ajax_url = base_url+"/categories/"+int_category_id;
            $.ajax({

                 url: ajax_url,
                 type:"DELETE",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
       }
  });

   $(document).on('click', '.delete-password', function(e){
      e.preventDefault();
      var int_password_id = $(this).data('id');
      if(confirm('Do you want to delete this?'))
       {
          ajax_url = base_url+"/password/"+int_password_id;
            $.ajax({

                 url: ajax_url,
                 type:"DELETE",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
       }
   });

   $(document).on('submit', '#2fa-submit', function(e){
     
      e.preventDefault();
      var two_fa = $('.2fa_code').val();
      var get_password_id = $('.password_id').val();
      ajax_url = base_url+"/2fa-verify";
            $.ajax({

                 url: ajax_url,
                 type:"POST",
                 data:{'password_id':get_password_id, 'one_time_password': two_fa},
                 dataType:"json",
                 success:function(data) {
                    if(data.status == true)
                    {
                        toastr.success(data.message);
                        $('.2fa_code').val('');
                        $('#google-2fa-body').html('');
                        showCode(base_url,get_password_id);

                    }
                    else
                    {
                        toastr.error(data.message);
                    }
     
                 },
                        
            });
   });



   $(".password").on("focus keyup", function () {
         
});
 
$(".password").blur(function () {
         
});
$(".password").on("focus keyup", function () {
        var score = 0;
        var a = $(this).val();
        var desc = new Array();
 
        // strength desc
    desc[0] = "Too short";
    desc[1] = "Weak";
    desc[2] = "Good";
    desc[3] = "Strong";
    desc[4] = "Best";
         
});
 
$(".password").blur(function () {
 
});
$(".password").on("focus keyup", function () {
        var score = 0;
        var a = $(this).val();
        var desc = new Array();
 
        // strength desc
        desc[0] = "Too short";
        desc[1] = "Weak";
        desc[2] = "Good";
        desc[3] = "Strong";
        desc[4] = "Best";
         
        // password length
        if (a.length >= 6) {
            $("#length").removeClass("invalid").addClass("valid");
            score++;
        } else {
            $("#length").removeClass("valid").addClass("invalid");
        }
 
        // at least 1 digit in password
        if (a.match(/\d/)) {
            $("#pnum").removeClass("invalid").addClass("valid");
            score++;
        } else {
            $("#pnum").removeClass("valid").addClass("invalid");
        }
 
        // at least 1 capital & lower letter in password
        if (a.match(/[A-Z]/) && a.match(/[a-z]/)) {
            $("#capital").removeClass("invalid").addClass("valid");
            score++;
        } else {
            $("#capital").removeClass("valid").addClass("invalid");
        }
 
        // at least 1 special character in password {
        if ( a.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) {
                $("#spchar").removeClass("invalid").addClass("valid");
                score++;
        } else {
                $("#spchar").removeClass("valid").addClass("invalid");
        }
 
 
        if(a.length > 0) {
                //show strength text
                $("#passwordDescription").text(desc[score]);
                // show indicator
                $("#passwordStrength").removeClass().addClass("strength"+score);
        } else {
                $("#passwordDescription").text("Password not entered");
                $("#passwordStrength").removeClass().addClass("strength"+score);
        }
});
 
$(".password").blur(function () {
 
});
$(".password").on("focus keyup", function () {
        var score = 0;
        var a = $(this).val();
        var desc = new Array();
 
        // strength desc
        desc[0] = "Too short";
        desc[1] = "Weak";
        desc[2] = "Good";
        desc[3] = "Strong";
        desc[4] = "Best";
 
        $("#pwd_strength_wrap").fadeIn(400);
         
        // password length
        if (a.length >= 6) {
            $("#length").removeClass("invalid").addClass("valid");
            score++;
        } else {
            $("#length").removeClass("valid").addClass("invalid");
        }
 
        // at least 1 digit in password
        if (a.match(/\d/)) {
            $("#pnum").removeClass("invalid").addClass("valid");
            score++;
        } else {
            $("#pnum").removeClass("valid").addClass("invalid");
        }
 
        // at least 1 capital & lower letter in password
        if (a.match(/[A-Z]/) && a.match(/[a-z]/)) {
            $("#capital").removeClass("invalid").addClass("valid");
            score++;
        } else {
            $("#capital").removeClass("valid").addClass("invalid");
        }
 
        // at least 1 special character in password {
        if ( a.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) {
                $("#spchar").removeClass("invalid").addClass("valid");
                score++;
        } else {
                $("#spchar").removeClass("valid").addClass("invalid");
        }
 
 
        if(a.length > 0) {
                //show strength text
                $("#passwordDescription").text(desc[score]);
                // show indicator
                $("#passwordStrength").removeClass().addClass("strength"+score);
        } else {
                $("#passwordDescription").text("Password not entered");
                $("#passwordStrength").removeClass().addClass("strength"+score);
        }
});
 
$(".password").blur(function () {
        $("#pwd_strength_wrap").fadeOut(400);
});

});


function showCode(base_url,get_password_id)
{
   $.ajax({

                 url: base_url+"/show-password/"+get_password_id,
                 type:"GET",
                 dataType:"html",
                 success:function(data) {
                    $('#google-2fa-title').text('Successfully two-factor verified');
                    
                     $('#google-2fa-body').html(data);
                 },
                        
            });
}

function copyToClipboard(elementId) {
  // Create a "hidden" input
  var aux = document.createElement("input");

  // Assign it the value of the specified element
  aux.setAttribute("value", document.getElementById(elementId).innerHTML);

  // Append it to the body
  document.body.appendChild(aux);

  // Highlight its content
  aux.select();

  // Copy the highlighted text
  document.execCommand("copy");

  // Remove it from the body
  document.body.removeChild(aux);
}