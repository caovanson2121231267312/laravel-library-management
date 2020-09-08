<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function index(Request $request)
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

    public function update(Request $request)
    {
        try {
            $user = $this->userRepo->find($request->id);
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
            $user = $this->userRepo->find($id);
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
