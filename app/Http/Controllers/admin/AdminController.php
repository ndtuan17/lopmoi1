<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\VarDumper\VarDumper;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        $title = 'Thêm mới nhân viên';
        return view('admin.admins.create', compact('title'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|max:100',
            'name' => 'required'
        ]);

        $dataCreate = $request->all();
        $admin = new Admin([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
        ]);
        $admin->save();
        return redirect()->route('admin.admins.index')->with(['message' => 'Create new admin: ' . $admin->name . ' success!']);
    }
    public function show(Admin $admin)
    {
        return redirect()->route('admin.admins.index');
    }
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);

        $admin->update($request->all());

        return redirect()->route('admin.admins.index')->with('message', 'Update success!');
    }
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.admins.index')->with('message', 'Delete success!');
    }
}
