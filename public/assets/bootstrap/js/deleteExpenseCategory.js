$(document).ready(function(){
    $('.deleteExpenseCategoryBtn').click(function() {
        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'ExpenseCategory/'+id+'/delete',
                    type: 'DELETE',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: "Deleted",
                            text: response.message,
                            type: "success"
                        }).then(function(){
                            location.reload();
                        });
                    }
                });
            }
        });
    });
});
