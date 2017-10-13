<?php

namespace App\Repositories;

use App\Models\UserAddress;
use DB;
use Kaiwh\Admin\Traits\Repository;

class UserAddressRepository
{
    use Repository;
    public function __construct(UserAddress $userAddress)
    {
        $this->model = $userAddress;
    }
    /**
     * Filter eloquent
     *
     * @return Void
     */
    protected function filter($query, $filter)
    {
        if (isset($filter['user_id']) && !is_null($filter['user_id'])) {
            $query->where('user_id', (int) $filter['user_id']);
        }
    }

    /**
     * Store
     *
     * @return \App\Models\UserAddress id
     */
    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $this->model->user_id     = (int) $data['user_id'];
            $this->model->name        = $data['name'];
            $this->model->mobile      = $data['mobile'];
            $this->model->province_id = (int) $data['province_id'];
            $this->model->province    = $data['province'];
            $this->model->city_id     = (int) $data['city_id'];
            $this->model->city        = $data['city'];
            $this->model->district_id = (int) $data['district_id'];
            $this->model->district    = $data['district'];
            $this->model->address     = $data['address'];
            $this->model->save();

            return $this->model->id;
        });
    }
    /**
     * Update
     *
     * @return Void
     */
    public function update(UserAddress $userAddress, array $data)
    {
        DB::transaction(function () use ($userAddress, $data) {
            $userAddress->name        = $data['name'];
            $userAddress->mobile      = $data['mobile'];
            $userAddress->province_id = (int) $data['province_id'];
            $userAddress->province    = $data['province'];
            $userAddress->city_id     = (int) $data['city_id'];
            $userAddress->city        = $data['city'];
            $userAddress->district_id = (int) $data['district_id'];
            $userAddress->district    = $data['district'];
            $userAddress->address     = $data['address'];
            $userAddress->save();
        });
    }
    /**
     * Destroy
     *
     * @return Void
     */
    public function destroy(UserAddress $userAddress)
    {
        DB::transaction(function () use ($userAddress) {
            $userAddress->delete();
        });
    }
    public function truncate()
    {}
}
