@extends('layouts.app-master')

@section('content')
    <div class="container-fluid p-5 mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between text-white" style="background-color: #94489b">
                <div>
                    <h4>Roles</h4>
                </div>
                <div>
                    <a href="{{ route('roles.create') }}" class="btn btn-warning btn-sm">Add role</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div class="mt-2">
                    @include('layouts.partials.messages')
                </div>
                <table class="table table-striped myTable">
                    <thead>
                        <tr>
                            <th width="80%">Name</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($roles) > 0)
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td class="text-capitalize">{{ $role->name }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ route('roles.show', $role->id) }}">Show</a>

                                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a>


                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                <div class="d-flex">
                    {!! $roles->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
