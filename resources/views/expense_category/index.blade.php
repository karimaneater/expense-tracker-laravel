@extends('layouts.app-master')

@section('content')
    <div class="container-fluid p-5 mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between text-white" style="background-color: #94489b">
                <div>
                   <h4>Expense Category</h4>
                </div>
                <div>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#expenseCategoryModal">Add Category</button>
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
                                    <button class="editExpenseCategoryBtn btn btn-sm btn-primary text-white" data-id="{{$category->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="deleteExpenseCategoryBtn btn btn-sm btn-danger text-white" data-id="{{$category->id}}"><i class="fa-solid fa-trash-can"></i></button>
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
    @include('expense_category.edit')
@endsection
