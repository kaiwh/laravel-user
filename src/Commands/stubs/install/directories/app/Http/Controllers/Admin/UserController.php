<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStore;
use App\Http\Requests\Admin\UserUpdate;
use App\Repositories\UserRepository;
use Redirect;

class UserController extends Controller
{
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * 会员列表
     *
     * @return 视图
     */
    public function index()
    {
        $users = $this->repository->paginate(20);

        return view('admin::user.index')
            ->with('users', $users);
    }
    /**
     * 新增会员
     *
     * @return 视图
     */
    public function create()
    {
        return view('admin::user.create');
    }
    /**
     * 保存新增会员
     *
     * @param AdminStore
     * @return 重定向列表页
     */
    public function store(UserStore $request)
    {
        $this->repository->store($request->all());
        return Redirect::route('admin.user.index');
    }
    /**
     * 编辑会员
     *
     * @return 视图
     */
    public function edit($id)
    {
        $user = $this->repository->first($id);

        if (is_null($user)) {
            return Redirect::route('admin.user.index');
        }

        return view('admin::user.edit')
            ->with('user', $user);
    }
    /**
     * 修改会员
     *
     * @return 重定向列表页
     */
    public function update($id, UserUpdate $request)
    {

        $user = $this->repository->first($id);

        if (!is_null($user)) {
            $this->repository->update($user, $request->all());
        }

        return Redirect::route('admin.user.index');
    }
    /**
     * 删除会员
     *
     * @return 视图
     */
    public function destroy($id)
    {
        $user = $this->repository->first($id);

        if (!is_null($user)) {
            $this->repository->destroy($user);
        }

        return Redirect::route('admin.user.index');
    }
}
