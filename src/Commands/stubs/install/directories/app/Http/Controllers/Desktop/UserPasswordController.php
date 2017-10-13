<?php

namespace App\Http\Controllers\Desktop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Desktop\UserPasswordUpdate;
use Auth;
use Redirect;

class UserPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    /**
     * 修改密码
     *
     * @return view
     */
    public function index()
    {
        return view('desktop::user.password.index');
    }
    public function update(UserPasswordUpdate $request)
    {
        $user           = Auth::guard('user')->user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect('/');
    }
}
