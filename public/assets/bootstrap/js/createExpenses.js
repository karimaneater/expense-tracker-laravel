$( document ).ready(function() {
    $('#expensesForm').submit(function(e){
        e.preventDefault();

        var id = $('#expense_category_id').val();
        var amount = $('#amount').val();
        var entry_date = $('#entry_date').val();

        $('#expensesSubmitBtn').attr('disabled', true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: 'Expenses/create',
          type: 'POST',
          data: {
            id : id,
            amount: amount,
            entry_date: entry_date,
          },
          success: function(response) {
            // Handle success response here
            $('#expensesSubmitBtn').attr('disabled', false);
            console.log(response.status);
            if (response.status === 404) {
                $('#expensesError').attr('hidden', false);
                $('#expensesError').text(response.message);
                $('#expense_category_id').css('border-color','red');
                $('#amount').css('border-color','red');
                $('#entry_date').css('border-color','red');
            }else{
                $("#createExpenses").modal('hide');
                window.location.href="/Expenses";
            }
          },
          error: function(xhr, status, error) {
            // Handle error here
            console.log(error);
          }
        });
    });
});

