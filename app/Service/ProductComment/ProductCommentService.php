<?php

namespace   App\Service\ProductComment;

use App\Service\BaseService;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;

class ProductCommentService extends BaseService implements ProductCommentServiceInterface 
{
    public $repository;
    
    public function __construct(ProductCommentRepositoryInterface $productCommentRepository)
    {   
            $this->repository = $productCommentRepository;
    }
}

?>