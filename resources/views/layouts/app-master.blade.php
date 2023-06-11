<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Expense Tracker Management</title>
    <link rel="icon" type="image/svg" href="https://purplebug.net/img/purplebug-icon.svg">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link href="{!! url('assets/bootstrap/css/style.css') !!}" rel="stylesheet">



    {{-- <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script> --}}
    <style>
      /* .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      } */
    </style>


</head>
<body>


    <header>
        @include('layouts.partials.sidebar')
        @include('layouts.partials.navbar')

    </header>
    <main style="min-height: calc(100vh - 58px);">
        @yield('content')
    </main>
    <footer class=" bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © {{date('Y')}}
        </div>
        <!-- Copyright -->
    </footer>
  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready( function () {

        $('#sidebarMenuBtn').on('click', function(){
            if ($('#sidebarMenu').is(':hidden')) {
                $('#sidebarMenu').show();
            } else {
                $('#sidebarMenu').hide();
            }
        });

        $('.myTable').DataTable();


    } );
</script>
<script src="{!!url('assets/bootstrap/js/createExpenseCategory.js')!!}"></script>
<script src="{!!url('assets/bootstrap/js/editExpenseCategory.js')!!}"></script>
<script src="{!!url('assets/bootstrap/js/deleteExpenseCategory.js')!!}"></script>

<script src="{!!url('assets/bootstrap/js/createExpenses.js')!!}"></script>
<script src="{!!url('assets/bootstrap/js/editExpense.js')!!}"></script>
<script src="{!!url('assets/bootstrap/js/deleteExpense.js')!!}"></script>

<script src="{!!url('assets/bootstrap/js/changePassProfile.js')!!}"></script>


</html>
