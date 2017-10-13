<?php

namespace App\Http\Controllers\Desktop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Desktop\UserAddressStore;
use App\Http\Requests\Desktop\UserAddressUpdate;
use App\Repositories\UserAddressRepository;
use Auth;
use Redirect;

class UserAddressController extends Controller
{
    protected $model;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserAddressRepository $userAddressRepository)
    {
        $this->middleware('auth:user');
        $this->model = $userAddressRepository;
    }
    public function index()
    {
        return view('desktop::user.address.index');
    }
    public function create()
    {
        return view('desktop::user.address.create');
    }
    public function store(UserAddressStore $request)
    {
        $address_id = $this->model->store([
            'user_id'     => Auth::user()->id,
            'name'        => $request->get('name'),
            'mobile'      => $request->get('mobile'),
            'province_id' => $request->get('province_id'),
            'city_id'     => $request->get('city_id'),
            'district_id' => $request->get('district_id'),
            'province'    => $request->get('province'),
            'city'        => $request->get('city'),
            'district'    => $request->get('district'),
            'address'     => $request->get('address'),
        ]);

        if (!Auth::user()->address || is_null(Auth::user()->address)) {
            Auth::user()->updateAddressId($address_id);
        }

        return Redirect::route('desktop.user.address');
    }
    public function edit($id)
    {
        $address = Auth::user()->addresses->where('id', $id)->first();

        return view('desktop::user.address.edit')
            ->with('address', $address);
    }
    public function update($id, UserAddressUpdate $request)
    {
        $address = Auth::user()->addresses->where('id', $id)->first();

        $this->model->update($address, [
            'name'        => $request->get('name'),
            'mobile'      => $request->get('mobile'),
            'province_id' => $request->get('province_id'),
            'city_id'     => $request->get('city_id'),
            'district_id' => $request->get('district_id'),
            'province'    => $request->get('province'),
            'city'        => $request->get('city'),
            'district'    => $request->get('district'),
            'address'     => $request->get('address'),
        ]);

        return Redirect::route('desktop.user.address');
    }
    public function destroy($id)
    {
        if (Auth::user()->address_id != $id) {
            $address = Auth::user()->addresses->where('id', $id)->first()->delete();
        }
        return Redirect::route('desktop.user.address');
    }

    public function setDefault($id)
    {
        $address = Auth::user()->addresses->where('id', $id)->first();
        if ($address) {
            $user = Auth::user()->updateAddressId($id);
        }
        return Redirect::route('desktop.user.address');
    }
}
