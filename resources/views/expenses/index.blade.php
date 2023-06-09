@extends('layouts.app-master')

@section('content')
    <div class="container-fluid p-5 mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    Expenses
                </div>
                <div>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createExpenses">Add Expenses</button>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped myTable">
                    <thead>
                        <tr>
                            <th>Expense Category</th>
                            <th>Amount</th>
                            <th>Entry Date</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($expenses) > 0)
                            @foreach ($expenses as $expense)
                                @php
                                $categoryName = \DB::table('expense_category')->where('id',$expense['expense_category_id'])->pluck('expense_category')->first();
                                @endphp
                                <tr>
                                    <td class="text-capitalize">{{$categoryName}}</td>
                                    <td>{{$expense['amount']}}</td>
                                    <td>{{$expense['entry_date']}}</td>
                                    <td>{{Carbon\Carbon::parse($expense['created_at'])->format('M-d-Y')}}</td>
                                    <td>
                                        Travel
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('expenses.create')
@endsection
