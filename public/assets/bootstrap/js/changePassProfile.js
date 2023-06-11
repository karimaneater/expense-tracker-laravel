$( document ).ready(function() {
    $('#profileSubmitBtn').click(function(e){
        e.preventDefault();
        $('#profileSubmitBtn').attr('disabled', true);

        var id = $('.password_id').val();
        var old_password = $('.old_password').val();
        var new_password = $('.new_password').val();
        var confirm_password = $('.confirm_password').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: '/users/profile/'+id+'/password/update',
          type: 'PUT',
          data: {
            id : id,
            old_password: old_password,
            new_password: new_password,
            confirm_password: confirm_password,
          },
          success: function(response) {
            // Handle success response here
            console.log(response);
            $('#profileSubmitBtn').attr('disabled', false);
            console.log(response.status);
            if (response.status === 404) {
                Swal.fire({
                    icon: 'error',
                    title: "Error!",
                    text: response.message,
                    type: "error"
                }).then(function(){

                    location.reload();
                });
            }else{
                Swal.fire({
                    icon: 'success',
                    title: "Success!",
                    text: response.message,
                    type: "success"
                }).then(function(){
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

