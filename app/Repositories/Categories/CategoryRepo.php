<?php

namespace App\Repositories\Categories;

use App\Models\Category;

use App\Repositories\BaseRepository;
use App\Repositories\Categories\CategoryInterface;

/**
 * Class EquipmentRepository
 * @package App\Repositories\Equipment
 */
class CategoryRepo extends BaseRepository implements CategoryInterface
{

  public function __construct(Category $category)
  {
    $this->model = $category;
  }

  public function createCategories($categories, $parent_id = 0, $level = 0)
  {
    $result = [];
    foreach ($categories as $item) {
      if ($item['parent_id'] == $parent_id) {
        $item['level'] = $level;
        $item['children'] = $this->createCategories($categories, $item['id'], $level + 1);
        $result[] = $item;
      }
    }
    return $result;
  }

  public function categories()
  {
    $categories =  $this->model->all();
    $data =  $this->createCategories($categories, 0);
    return [
      'success' => true,
      'data' => $data,
    ];
  }

  public function deleteCategory($id)
  {
    try {
      $category = $this->model->findOrFail($id);
      $categoryChildren = $this->model->where('parent_id', $id)->get();
      if ($categoryChildren != null) {
        foreach ($categoryChildren as $categories) {
          $categories->parent_id = $category->parent_id;
          $categories->update();
        }
      }
      $category->delete();

      return [
        'success' => true
      ];
    } catch (\Exception $e) {
      return [
        'success' => false,
        'message' => $e->getMessage()
      ];
    }
  }

  public function updateCategory($data, $id)
  {
    try {
      $category = $this->model->findOrFail($id);
      $category->name = $data['name'];
      $category->update();
      return [
        'success' => true
      ];
    } catch (\Exception $e) {
      return [
        'success' => false,
        'message' => $e->getMessage()
      ];
    }
  }

  public function addChildren($data)
  {
    $category = $this->model->create($data);
    dd($category);
    return [
      'success' => true,
    ];
  }

  public function addAllParent($data, $id)
  {
    try {
      $categories = $this->model->findOrFail($id);
      $categoryChildren = $this->model->where('parent_id', $categories->parent_id)->get();
      $category = $this->model->create($data);
      if ($categoryChildren != null) {
        foreach ($categoryChildren as $categoryChildren) {
          $categoryChildren->parent_id = $category->id;
          $categoryChildren->update();
        }
      }

      return [
        'success' => true
      ];
    } catch (\Exception $e) {
      return [
        'success' => false,
        'message' => $e->getMessage()
      ];
    }
  }

  public function addOneParent($data, $id)
  {
    $categories = $this->model->findOrFail($id);
    $category = $this->model->create($data);
    $categories->parent_id = $category->id;
    $categories->update();
    return [
      'success' => true
    ];
  }
}
