<?php 

namespace App\Repositories\Blog;

use App\Models\Blog;

use App\Repositories\BaseRepositories;
use App\Repositories\Blog\BlogRepositoryInterface;

class BlogRepository extends BaseRepositories implements BlogRepositoryInterface 
{
    public function getModel() {
        return Blog::class;
    }

    public function getLatestBlogs($limit = 3) {
        return $this->model->orderBy('id', 'desc')
        ->limit($limit)->get();
    }

    public function getBlogByUserId($userId)
    {
        return $this->model
        ->where('user_id', $userId)->get();
    }

}

?>