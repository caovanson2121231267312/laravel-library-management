<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Excel;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (session('success_title')) {
            toast(session('success_title'), 'success');
        }

        $users = User::latest()->get();
      
        return view('admin.user.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role_id' => config('const.user'),
        ];

        User::create($data);

        return redirect()->route('users.index')->withSuccessTitle(trans('request.success'));
    }

    public function update(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
        } catch (ModelNotFoundException $exception) {

            return view('404');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ];

        $user->update($data);

        return redirect()->route('users.index')->withSuccessTitle(trans('request.success'));
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $exception) {

            return view('404');
        }

        $user->delete();

        return redirect()->route('users.index')->withSuccessTitle(trans('request.success'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
