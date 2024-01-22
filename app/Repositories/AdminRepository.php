<?php

namespace App\Repositories;

use App\Models\Admin;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class AdminRepository.
 */
class AdminRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Admin::class;
    }

    public function get(array $columns = ['*']){

        return DB::table('admin')
                ->select($columns)
                ->get();
    }

    public function create(array $data)
    {

        if($data['gender'] == 0){
            $data['avatar'] = "assets/images/male-avatar.jpg";
        }elseif($data['gender'] == 1){
            $data['avatar'] = "assets/images/female-avatar.jpg";
        }else{
            $data['avatar'] = "assets/images/other-avatar.jpg";
        };

        $data['password'] = Hash::make('123456');
        $data['joining_date'] = date('Y-m-d');
        $data['adminType'] = ['type' => 0];

        return Admin::create($data);
    }

    public function getById($id, array $columns = ['*'])
    {
        return DB::table('admin')
                ->select($columns)
                ->where('id', $id)
                ->first();
    }

}
