$(document).ready(function(){
    $('.editExpenseBtn').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: 'Expenses/'+id+'/edit',
            type: 'GET',
            success: function(response) {
                console.log(response);
                $('.expensesId').val(response.id);
                $('.expense_category_id').val(response.expense_category_id);
                $('.amount').val(response.amount);
                $('.entry_date').val(response.entry_date);


                $('#expensesModal').modal('show');

            },
            error: function(xhr, status, error) {
              // Handle error here
              console.log(error);
            }
        });
    });
});

