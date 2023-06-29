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

});