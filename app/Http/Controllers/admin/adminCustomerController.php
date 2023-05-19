<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeCustomerRequest;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class adminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = customer::all();
        return view('admin.customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $countries = $phoneUtil->getSupportedRegions();
        return view('admin.customer.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCustomerRequest $request)
    {
        //validate phone number:
        $phoneNumber = $request->phoneNumber;
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $parsdata = $phoneUtil->parse($phoneNumber, "$request->country");
        $isValid = $phoneUtil->isValidNumber($parsdata);
        if (!$isValid) {
            throw ValidationException::withMessages(['phoneNumber', 'You have enterd a invalid phoneNumber']);
        }
        $model = new customer();
        $model->firstname = $request->firstname;
        $model->lastname = $request->lastname;
        $model->dataOfBirth = $request->dataOfBirth;
        $model->phoneNumber = $request->phoneNumber;
        $model->country = $request->country;
        $model->bankAcNumber = $request->bankAcNumber;
        $model->email = $request->email;
        $model->save();
        \Illuminate\Support\Facades\Session::flash('model-create', 'Your record created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //here is for delete
        $model = customer::find($id)->delete();
        \Illuminate\Support\Facades\Session::flash('model-delete', 'Your record deleted successfully!');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = customer::find($id);
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $countries = $phoneUtil->getSupportedRegions();
        return view('admin.customer.edit', compact('model', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate phone number:
        $phoneNumber = $request->phoneNumber;
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $parsdata = $phoneUtil->parse($phoneNumber, "$request->country");
        $isValid = $phoneUtil->isValidNumber($parsdata);
        if (!$isValid) {
            throw ValidationException::withMessages(['phoneNumber', 'You have enterd a invalid phoneNumber']);
        }
        $model = customer::find($id);
        $model->firstname = $request->firstname;
        $model->lastname = $request->lastname;
        $model->dataOfBirth = $request->dataOfBirth;
        $model->phoneNumber = $request->phoneNumber;
        $model->country = $request->country;
        $model->bankAcNumber = $request->bankAcNumber;
        $model->email = $request->email;
        $model->save();
        \Illuminate\Support\Facades\Session::flash('model-edited', 'Your record edited successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $id;
    }
    public function deleteCustomer($id)
    {
        $model = customer::find($id)->delete();
        \Illuminate\Support\Facades\Session::flash('model-delete', 'Your record deleted successfully!');
    }
}
