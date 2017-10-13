<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserAddressStore;
use App\Http\Requests\Admin\UserAddressUpdate;
use App\Repositories\UserAddressRepository;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    protected $repository;
    public function __construct(UserAddressRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * 会员地址
     *
     * @return View
     */
    public function index(Request $request)
    {
        $user_id   = $request->get('user_id');
        $addresses = $this->repository->all(['user_id' => $user_id]);

        return view('admin::user.address.index')
            ->with('user_id', $user_id)
            ->with('addresses', $addresses);
    }
    /**
     * 新增会员地址
     *
     * @return 重定向列表页
     */
    public function store(UserAddressStore $request)
    {
        $this->repository->store($request->all());
        $json['success'] = trans('admin::userAddress.success.create');
        return response()
            ->json($json);
    }
    /**
     * 修改会员地址
     *
     * @return 重定向列表页
     */
    public function update($id, UserAddressUpdate $request)
    {

        $userAddress = $this->repository->first($id);
        if (!is_null($userAddress)) {
            $this->repository->update($userAddress, $request->all());
        }

        $json['success'] = trans('admin::userAddress.success.update');
        return response()
            ->json($json);
    }
    /**
     * 删除会员
     *
     * @return 视图
     */
    public function destroy($id)
    {
        $userAddress = $this->repository->first($id);
        if (!is_null($userAddress)) {
            $this->repository->destroy($userAddress);
        }

        $json['success'] = trans('admin::userAddress.success.destroy');

        return response()
            ->json($json);
    }
}
