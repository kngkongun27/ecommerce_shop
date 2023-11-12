<?php 

namespace App\Repositories\ProductComment;

use App\Models\ProductComment;

use App\Repositories\BaseRepositories;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;

class ProductCommentRepository extends BaseRepositories implements ProductCommentRepositoryInterface 
{
    public function getModel() {
        return ProductComment::class;
    }
}

?>