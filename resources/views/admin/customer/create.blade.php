@extends('admin.layouts.master')
@section('content')
    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    {!! implode('', $errors->all('<div style="color: red" class="col-sm-10 is-invalid">:message</div>')) !!}
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Customer</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('customer.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">First Name</label>
                                        <input type="text" id="first-name-column" class="form-control"
                                            placeholder="First Name" name="firstname" required />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="last-name-column">Last Name</label>
                                        <input type="text" id="last-name-column" class="form-control"
                                            placeholder="Last Name" name="lastname" required />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="city-column">Data of Birth</label>
                                        <input type="date" id="city-column" class="form-control"
                                            placeholder="enter your bithday" name="dataOfBirth" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">country:</label>
                                        <select name="country" class="select2 form-select select2-hidden-accessible">
                                            @foreach ($countries as $c)
                                                <option value="{{ $c }}">{{ $c }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">phoneNumber</label>
                                        <input type="number" id="country-floating"
                                            class="form-control @if ($errors) is-invalid" @endif
                                            name="phoneNumber"
                                            placeholder="example:0912***2536" />
                                        @error('phoneNumber')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="company-column">Email</label>
                                        <input type="email" id="company-column" class="form-control" name="email"
                                            placeholder="example: mazyarmg7731@gmail.com" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="email-id-column">Bank Account Number</label>
                                        <input type="text" id="email-id-column" class="form-control" name="bankAcNumber"
                                            placeholder="Bank Account Number" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Floating Label Form section end -->
@endsection
