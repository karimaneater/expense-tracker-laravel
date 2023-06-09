$( document ).ready(function() {
    $('#expenseCategoryForm').submit(function(e){
        e.preventDefault();

        var name = $('#expense_category').val();
        var description = $('#expense_description').val();
        $('#expenseCategorySubmitBtn').attr('disabled', true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: 'ExpenseCategory/create',
          type: 'POST',
          data: {
            name: name,
            description: description
          },
          success: function(response) {
            // Handle success response here
            $('#expenseCategorySubmitBtn').attr('disabled', false);
            console.log(response.status);
            if (response.status === 404) {
                $('#expenseCategoryError').attr('hidden', false);
                $('#expenseCategoryError').text(response.message);
                $('#expense_category').css('border-color','red');
                $('#expense_description').css('border-color','red');
            }else{
                $("#createExpenseCategory").modal('hide');
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

