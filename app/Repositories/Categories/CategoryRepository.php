<?php
namespace App\Repositories\Categories;
use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository
{
  public function __construct(Category $category)
  {
    $this->model = $category;
  }
  public function index()
  {
    try {
      $category = $this->model->get();
      return [
        'data' => $category,
        'success' => true
      ];
    }catch (\Exception $e){
      return [
        'success' => false
      ];
    }
  }
}
