@extends('layouts.app-master')

@section('content')
    <div class="container-fluid p-5 mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    Expense Category
                </div>
                <div>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createExpenseCategory">Add Category</button>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped myTable">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($ExpenseCategory) > 0)
                            @foreach ($ExpenseCategory as $category)
                            <tr>
                                <td class="text-capitalize">{{$category->expense_category}}</td>
                                <td>{{$category->expense_description}}</td>
                                <td>{{Carbon\Carbon::parse($category->created_at)->format('M-d-Y')}}</td>
                                <td>
                                    Action
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('expense_category.create')
@endsection
