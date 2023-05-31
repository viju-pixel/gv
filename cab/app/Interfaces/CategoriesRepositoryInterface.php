<?php

namespace App\Interfaces;

interface CategoriesRepositoryInterface
{
    public function getAllCategories();

    public function updateStatus(int $categoryId, $statusData);

}
