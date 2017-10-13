<?php

namespace App\Http\Controllers\Desktop;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user');
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('desktop::user.register.email');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'captcha'  => 'required|captcha',
        ], [], [
            'name'     => trans('desktop::userRegister.form.name'),
            'email'    => trans('desktop::userRegister.form.email'),
            'password' => trans('desktop::userRegister.form.password'),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * 手机注册
     *
     * @return \Illuminate\Http\Response
     */
    public function showMobileForm()
    {
        return view('desktop::user.register.mobile');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerMobile(Request $request)
    {

        $this->validatorMobile($request->all())->validate();

        event(new Registered($user = $this->createMobile($request->all())));

        $this->guard('user')->login($user);

        return $this->registered($request, $user)
        ?: redirect($this->redirectPath());
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorMobile(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'mobile'   => 'required|string|mobile|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'captcha'  => 'required|captcha',
        ], [], [
            'name'     => trans('desktop::userRegister.form.name'),
            'mobile'   => trans('desktop::userRegister.form.mobile'),
            'password' => trans('desktop::userRegister.form.password'),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createMobile(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'mobile'   => $data['mobile'],
            'password' => bcrypt($data['password']),
        ]);
    }
    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}
