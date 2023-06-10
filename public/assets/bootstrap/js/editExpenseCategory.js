$(document).ready(function(){
    $('.editExpenseCategoryBtn').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: 'ExpenseCategory/'+id+'/edit',
            type: 'GET',
            success: function(response) {

                $('.expense_category').val(response.expense_category);
                $('.expense_description').val(response.expense_description);
                $('.expenseCategoryId').val(response.id);

                console.log(response.expense_category);
                $('#expenseCategoryModal').modal('show');

            },
            error: function(xhr, status, error) {
              // Handle error here
              console.log(error);
            }
        });
    });
});

