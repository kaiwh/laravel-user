<?php

namespace App\Repositories;

use App\Models\User;
use DB;
use Kaiwh\Admin\Traits\Repository;

class UserRepository
{
    use Repository;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
    /**
     * Filter eloquent
     *
     * @return Void
     */
    protected function filter($query, $filter)
    {
        // if(isset($filter['parent_id']) && !is_null($filter['parent_id'])){
        //     $query->where('parent_id',(int)$filter['parent_id']);
        // }
    }

    /**
     * Store
     *
     * @return \App\Models\User id
     */
    public function store(array $data)
    {
        DB::transaction(function () use ($data) {
            $this->model->name     = $data['name'];
            $this->model->email    = $data['email'];
            $this->model->mobile   = $data['mobile'];
            $this->model->password = bcrypt($data['password']);
            if (!empty($data['image'])) {
                $this->model->image = $this->model->storeImage($data['image']);
            }
            $this->model->save();
        });
    }
    /**
     * Update
     *
     * @return Void
     */
    public function update(User $user, array $data)
    {
        DB::transaction(function () use ($user, $data) {

            $user->name = $data['name'];

            if (!is_null($data['password'])) {
                $user->password = bcrypt($data['password']);
            }
            if (!empty($data['image'])) {
                $user->image = $this->model->storeImage($data['image']);
            }

            $user->save();
        });
    }
    /**
     * Destroy
     *
     * @return Void
     */
    public function destroy(User $user)
    {
        DB::transaction(function () use ($user) {
            $user->addresses()->delete();
            $user->delete();
        });
    }

    public function truncate()
    {}
}
