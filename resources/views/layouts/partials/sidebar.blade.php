d<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" data-mdb-hidden="false">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">

        @auth
            <a href="{{ route('home.index') }}" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
            </a>


                @role('admin')


                <h2 class="accordion-header" id="flush-headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <i class="fas fa-users fa-fw me-3"></i><span>Users</span>
                  </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <a href="{{ route('users.index') }}" class="list-group-item ">
                        <i class="fas fa-users fa-fw me-3"></i><span>Users</span>
                    </a>
                    <a href="{{ route('roles.index') }}" class="list-group-item ">
                        <i class="fa-solid fa-user-lock me-3"></i><span>Roles</span>
                    </a>
                </div>

                @endrole

                    <h2 class="accordion-header" id="flush-headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <i class="fa-solid fa-money-bill-transfer me-3"></i><span>Expenses</span>
                      </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                      <a href="{{ route('expenseCategory.index') }}" class="list-group-item ">
                            <i class="fa-solid fa-money-bill-transfer me-3"></i><span>Expenses Category</span>
                        </a>
                        <a href="{{ route('expenses.index') }}" class="list-group-item">
                            <i class="fa-sharp fa-solid fa-sack-dollar me-3"></i><span>Expenses</span>
                        </a>
                    </div>

        @endauth
      </div>

    </div>
  </nav>

  <!-- Sidebar -->


