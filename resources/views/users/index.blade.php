@extends('layouts.app-master')

@section('content')
    <div class="container-fluid p-5 mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between text-white" style="background-color: #94489b">
                <div>
                    <h4>Users</h4>
                </div>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-warning btn-sm">Add new user</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div class="mt-2">
                    @include('layouts.partials.messages')
                </div>
                <table class="table table-striped myTable">
                    <thead>
                        <tr>

                            <th scope="col" width="30%">Name</th>
                            <th scope="col" width="30%">Email</th>
                            <th scope="col" width="20%">Roles</th>
                            <th scope="col" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach($users as $user)
                                <tr>

                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="badge bg-primary">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-eye text-white"></i></a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('DELETE', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                <div class="d-flex">
                    {!! $users->links() !!}
                </div>

            </div>
        </div>
    </div>


@endsection
