@extends('admin.layouts.master')
@section('content')
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            @if (\Illuminate\Support\Facades\Session::has('model-delete'))
                <div class="alert alert-success">
                    {{ session('model-delete') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Table Basic</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>date Of birth</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $d)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $key + 1 }}</span>
                                    </td>
                                    <td>{{ $d->firstname }}</td>
                                    <td>
                                        <span>{{ $d->lastname }}</span>
                                    </td>
                                    <td>{{ $d->dataOfBirth }}</td>
                                    <td>
                                        {{ $d->phoneNumber }}
                                    </td>
                                    <td>
                                        {{ $d->email }}
                                    </td>
                                    <td>

                                        <a class="dropdown-item" href="{{ route('customer.edit', $d->id) }}">
                                            <i data-feather="edit-2" class="me-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        <a class="dropdown-item" href="{{ route('customer.destroy', $d->id) }}">
                                            <i data-feather="trash" class="me-50"></i>
                                            <span>Delete</span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
@endsection
