@extends('admin.layouts.master')
@section('content')
    <!-- profile -->
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Profile Details</h4>
        </div>
        <div class="card-body py-2 my-25">
            <!-- header section -->
            <div class="d-flex">
                <a href="#" class="me-25">
                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" id="account-upload-img"
                        class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
                </a>
                <!-- upload and reset button -->
                <div class="d-flex align-items-end mt-75 ms-1">
                    <div>
                        <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                        <input type="file" id="account-upload" hidden accept="image/*" />
                        <button type="button" id="account-reset"
                            class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                        <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                    </div>
                </div>
                <!--/ upload and reset button -->
            </div>
            <!--/ header section -->

            <!-- form -->
            <form class="validate-form mt-2 pt-50" action="{{ route('changePassword') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-12 mb-1">
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div style="color: red" class="col-sm-10 is-invalid">:message</div>')) !!}
                        @endif
                        @if (\Illuminate\Support\Facades\Session::has('password-changed'))
                            <div class="alert alert-success">
                                {{ session('password-changed') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="accountFirstName">Name</label>
                        <input type="text" class="form-control" id="accountFirstName" name="name" placeholder="John"
                            value="{{ $user->name }}" data-msg="Please enter first name" readonly />
                    </div>
                    {{-- <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="accountLastName">Last Name</label>
                        <input type="text" class="form-control" id="accountLastName" name="lastName" placeholder="Doe"
                            value="{{$user}}" data-msg="Please enter last name" />
                    </div> --}}
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="accountEmail">Email</label>
                        <input type="email" class="form-control" id="accountEmail" name="email" placeholder="Email"
                            value="{{ $user->email }}" readonly />
                    </div>
                    {{-- <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="accountEmail">Old Password</label>
                        <input type="password" class="form-control" id="accountEmail" name="old_password"
                            placeholder="Enter old Password" required />
                    </div> --}}
                    <div class="col-12 col-sm-12 mb-1">
                        <label class="form-label" for="accountEmail">New Password</label>
                        <input type="password" class="form-control" id="accountEmail" name="new_passwrod"
                            placeholder="Enter new Password" required />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-1 me-1 col-sm-12">Save changes</button>
                        {{-- <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button> --}}
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>

    <!-- deactivate account  -->
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Delete Account</h4>
        </div>
        <div class="card-body py-2 my-25">
            <div class="alert alert-warning">
                <h4 class="alert-heading">Are you sure you want to delete your account?</h4>
                <div class="alert-body fw-normal">
                    Once you delete your account, there is no going back. Please be certain.
                </div>
            </div>

            <form id="formAccountDeactivation" action="{{ route('deleteAc') }}" method="post" class="validate-form">
                @csrf
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation"
                        data-msg="Please confirm you want to delete account" required />
                    <label class="form-check-label font-small-3" for="accountActivation">
                        I confirm my account deactivation
                    </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-danger deactivate-account mt-1">Deactivate Account</button>
                </div>
            </form>
        </div>
    </div>
    <!--/ profile -->
@endsection
