<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" data-mdb-hidden="false">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="{{ route('home.index') }}" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
        </a>
        @auth
            @role('admin')
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fas fa-users fa-fw me-3"></i><span>Users</span>
            </a>
            <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fa-solid fa-user-lock me-3"></i><span>Roles</span>
            </a>
            @endrole
            <a href="{{ route('expenseCategory.index') }}" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fa-solid fa-money-bill-transfer me-3"></i><span>Expenses Category</span>
            </a>
            <a href="{{ route('expenses.index') }}" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fa-sharp fa-solid fa-sack-dollar me-3"></i><span>Expenses</span>
            </a>
        @endauth
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

