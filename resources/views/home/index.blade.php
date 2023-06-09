@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 mt-5 rounded">
        @auth
            <h2>Dashboard</h2>
            <div class="row mt-4">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>
                                    Expenses
                                </h5>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>
                                    Expenses Chart
                                </h5>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>

            </div>
        @endauth

        @guest
        <h2>Dashboard</h2>
        <div class="row mt-4">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                Expenses
                            </h5>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                Expenses Chart
                            </h5>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>

        </div>

        @endguest
    </div>
@endsection
