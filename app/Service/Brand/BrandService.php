<?php

namespace   App\Service\Brand;

use App\Service\BaseService;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Service\Brand\BrandServiceInterface;

class BrandService extends BaseService implements BrandServiceInterface 
{
    public $repository;
    
    public function __construct(BrandRepositoryInterface $BrandRepository)
    {   
            $this->repository = $BrandRepository;
    }
}

?>