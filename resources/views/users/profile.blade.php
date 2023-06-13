@extends('layouts.app-master')

@section('content')
    <div class="container-fluid p-5 mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between text-white" style="background-color: #94489b">
                <div>
                    <h4>Profile</h4>
                </div>
            </div>
            <div class="card-body table-responsive">
                @php
                    $profileData = \DB::table('users')->where('id', $userId)->first();

                @endphp
                <form action="" id="profileForm">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="expensesId" id="expensesId">
                        <div id="expensesError" class="alert alert-danger" role="alert" hidden></div>
                        <input type="hidden" class="password_id" value="{{$profileData->id}}">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control name"  value="{{$profileData->name}}" name="name" id="name" placeholder="Name" readonly>
                            <label for="amount">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control email"  value="{{$profileData->email}}" name="email" id="email" placeholder="Email" readonly>
                            <label for="amount">Email</label>
                        </div>

                        <hr>

                        <div class="accordion accordion-flush" id="accordionFlushExample1">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed position-relative" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1" aria-expanded="false" aria-controls="flush-collapseOne">
                                  Change password?
                                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    click me!
                                  </span>
                                </button>
                              </h2>
                              <div id="flush-collapseOne1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample1">

                                    <div class="form-floating mb-3 mt-3">
                                        <input type="password" class="form-control old_password"  value="" name="old_password" id="old_password" placeholder="Password">
                                        <label for="old_password">Old Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control new_password"  value="" name="new_password" id="new_password" placeholder="Password">
                                        <label for="new_password">New Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control confirm_password"  value="" name="confirm_password" id="confirm_password" placeholder="Password">
                                        <label for="confirm_password">Confirm Password</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="profileSubmitBtn" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
