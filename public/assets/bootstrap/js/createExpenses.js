$( document ).ready(function() {
    $('#expensesSubmitBtn').click(function(e){
        e.preventDefault();
        $('#expensesSubmitBtn').attr('disabled', true);

        var id = $('.expensesId').val();
        var exp_cat_id = $('.expense_category_id').val();
        var amount = $('.amount').val();
        var entry_date = $('.entry_date').val();
        var url = id ? 'Expenses/'+id+'/update' : 'Expenses/create';
        var method = id ? 'PUT' : 'POST';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: url,
          type: method,
          data: {
            id : id,
            exp_cat_id: exp_cat_id,
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
                Swal.fire({
                    icon: 'success',
                    title: "Success!",
                    text: response.message,
                    type: "success"
                }).then(function(){
                    $("#expensesModal").modal('hide');
                    location.reload();
                });
            }
          },
          error: function(xhr, status, error) {
            // Handle error here
            console.log(error);
          }
        });
    });
});

