<?php
namespace App\Http\Controllers\Api;
use App\Repositories\Categories\CategoryRepository;
class CategoryController extends ApiBaseController
{
  protected $categoryRepo;
  public function __construct(CategoryRepository $categoryRepository)
  {
    $this->categoryRepo = $categoryRepository;
  }
  public function index()
  {
    $category = $this->categoryRepo->index();
    if (!$category['success']) {
      return $this->sendError(500, 'ERROR', 500);
    } else {
      return $this->sendSuccess($category['data']);
    }
  }
}
