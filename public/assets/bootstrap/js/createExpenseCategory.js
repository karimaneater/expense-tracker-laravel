$( document ).ready(function() {
    $('.expenseCategorySubmitBtn').click(function(e){
        e.preventDefault();
        var id = $('.expenseCategoryId').val();
        var name = $('.expense_category').val();
        var description = $('.expense_description').val();
        var url = id ? 'ExpenseCategory/'+id+'/update' : 'ExpenseCategory/create';
        var method = id ? 'PUT' : 'POST';

        $('.expenseCategorySubmitBtn').attr('disabled', true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: url,
          type: method,
          data: {
            id: id,
            name: name,
            description: description
          },
          success: function(response) {
            // Handle success response here
            $('.expenseCategorySubmitBtn').attr('disabled', false);
            console.log(response);
            if (response.status === 404) {
                $('#expenseCategoryError').attr('hidden', false);
                $('#expenseCategoryError').text(response.message);
                $('.expense_category').css('border-color','red');
                $('.expense_description').css('border-color','red');
            }else{
                $("#expenseCategoryModal").modal('hide');
                window.location.href="/ExpenseCategory";
            }
          },
          error: function(xhr, status, error) {
            // Handle error here
            console.log(error);
          }
        });
    });




});

