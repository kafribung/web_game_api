<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\AdminRequest;

class AdminController extends Controller
{
    // Read
    public function index()
    {
        $admins = User::where('role', 1)->latest()->get();
        return view('backend.admin', compact('admins'));
    }

    // Create
    public function create()
    {
        return view('backend_create.admin_create');
    }

    // Store
    public function store(AdminRequest $request)
    {
        if (User::where('role', 1)->count() >= 3) {
            return redirect('/admin')->with('msg', 'Data admin maksimal 3');
        }
        $data =  $request->all();
        if ($img = $request->file('img')) {
            $data['img'] = $img->storeAs('img_users', time(). '.' . $img->getClientOriginalExtension());
        }
        $data['password'] = bcrypt($request->password);
        $data['role']     = 1;
        User::create($data);
        return redirect('/admin')->with('msg', 'Data admin berhasil ditambahkan');
    }

    // Show
    public function show($id)
    {
        return abort('404');
    }

    // Edit
    public function edit(User $admin)
    {
        return view('backend_edit.admin_edit', compact('admin'));
    }

    // Update
    public function update(AdminRequest $request, User $admin)
    {
        $data =  $request->all();
        if ($img = $request->file('img')) {
            $admin->img == 'img_users/default_user.jpg' ? null : Storage::delete($admin->img);
            $data['img'] = $img->storeAs('img_users', time(). '.' . $img->getClientOriginalExtension());
        }
        $data['password'] = bcrypt($request->password);
        $admin->update($data);
        return redirect('/admin')->with('msg', 'Data admin berhasil diupdate');
    }

    // Destroy
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->img == 'img_users/default_user.jpg' ?  null : Storage::delete($admin->img);
        $admin->delete();
    }
}
