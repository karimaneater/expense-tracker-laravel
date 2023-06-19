@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 mt-5 rounded">
        @auth

            <h2>Dashboard</h2>

                @if (count($expenses) > 0)
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header text-white" style="background-color: #94489b">
                                <h5>
                                    Expenses
                                </h5>
                            </div>
                            <div class="card-body">

                                @foreach ($expenses as $expense)
                                    @php
                                        $expense_cat = \App\Models\ExpenseCategory::first()->where('id',$expense['expense_category_id'])->pluck('expense_category')->toArray();
                                    @endphp
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <b>{{$expense_cat[0]}}</b>
                                        </div>
                                        <div>
                                            &#8369;{{$expense['total_amount']}}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header text-white" style="background-color: #94489b">
                                <h5>
                                    Expenses Chart
                                </h5>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="col-md-12">
                        <img src="{!!url('images/no_data-amico.svg') !!}" alt="">
                    </div>
                @endif
        @endauth

        @guest
        <div class="container d-flex align-items-center justify-content-center">
            <img src="{!!url('images/login-amico.svg') !!}" alt="" width="100%">

        </div>


        @endguest

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>


const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php
            if (isset($labels)) {
                echo json_encode($labels);
            }
            ?>,
            datasets: [{
            label: 'Expense Chart',
            data: <?php
            if (isset($datas)) {
                echo json_encode($datas);
            }
            ?>,
            backgroundColor: <?php
            if (isset($backgroundColor)) {
                echo json_encode($backgroundColor);
            }
            ?>,
            }]
        }
    });

    </script>
@endsection




