<?php

namespace App\Http\Controllers\Desktop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Desktop\UserEditUpdate;
use Auth;
use Image;
use Redirect;

class UserEditController extends Controller
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
     * 修改资料
     *
     * @return void
     */
    public function index()
    {
        return view('desktop::user.edit.index');
    }
    public function update(UserEditUpdate $request)
    {
        $user       = Auth::guard('user')->user();
        $user->name = $request->get('name');
        if ($request->file('image') && !is_null($request->file('image'))) {
            $user->image = $user->storeImage($request->file('image'));
        }
        $user->save();
        return redirect('/');
    }
}
