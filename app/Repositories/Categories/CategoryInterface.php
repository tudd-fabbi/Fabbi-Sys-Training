<?php

namespace App\Repositories\Categories;

use App\Repositories\BaseRepositoryInterface;

interface CategoryInterface extends BaseRepositoryInterface
{
    public function categories();
    public function deleteCategory($id);
    public function createCategories($categories, $parent_id = 0, $level = 0);
    public function updateCategory($data, $id);
    public function addChildren($data);
    public function addAllParent($data, $id);
    public function addOneParent($data, $id);
}
