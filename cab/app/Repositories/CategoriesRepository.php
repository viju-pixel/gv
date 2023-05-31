<?php

namespace App\Repositories;

use App\Interfaces\CategoriesRepositoryInterface;
use App\Models\Customer;

class CategoriesRepository implements CategoriesRepositoryInterface
{
    /**
     * Get all categories list.
     */
    public function getAllCategories()
    {
        return Customer::all();
    }   

    public function updateStatus(int $categoryId, $statusData)
    {
        return Categories::whereId($categoryId)->update($statusData);
    }
}
