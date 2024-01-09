<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
class UserController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            // This line retrieves all users data:
            $users = User::query();
            $users = $users->where('role', 'user');

            return DataTables::of($users)
                ->addIndexColumn()
                ->make(true);
        }

        return view('users.index');
    }
}
