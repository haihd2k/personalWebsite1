<?php

namespace App\Repositories;

use App\Models\AdminType;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class AdminTypeRepository.
 */
class AdminTypeRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return AdminType::class;
    }

    public function create(array $data)
    {

        return AdminType::create($data);
    }
}
