<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use Excel;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        if (session('success_title')) {
            toast(session('success_title'), 'success');
        }

        $users = $this->userRepo->getUser();
      
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

        $this->userRepo->create($data);

        return redirect()->route('users.index')->withSuccessTitle(trans('request.success'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ];

        try {
            $this->userRepo->update($request->id, $data);
        } catch (ModelNotFoundException $exception) {
            return view('errors.404');
        }

        return redirect()->route('users.index')->withSuccessTitle(trans('request.success'));
    }

    public function destroy($id)
    {
        try {
            $this->userRepo->delete($id);
        } catch (ModelNotFoundException $exception) {
            return view('errors.404');
        }

        return redirect()->route('users.index')->withSuccessTitle(trans('request.success'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
