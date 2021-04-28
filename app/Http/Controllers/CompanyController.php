<?php

namespace App\Http\Controllers;

use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'company');
            }
        )->orderBy('created_at', 'desc')->get();

        return view('companies')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'contact_no' => 'required|unique:users|max:12',
        ]);

        $id = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'gstn' => $request->gstn,
            'address' => $request->address,
            'shipping_address' => $request->shipping_address,
            'password' => Hash::make('password'),
        ])->id;

        RoleUser::create([
            'user_id' => $id,
            'role_id' => 3
        ]);

        return redirect()->route('company.create')->withSuccess('company Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = User::find($id);

        return view('company_edit')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = User::find($id);

        return view('company_edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'contact_no' => 'required|unique:users,contact_no,' . $id,
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'gstn' => $request->gstn,
            'address' => $request->address,
            'shipping_address' => $request->shipping_address,
        ]);


        return redirect()->route('company.edit', $id)->withSuccess('company Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->withSuccess('company deleted');
    }
}