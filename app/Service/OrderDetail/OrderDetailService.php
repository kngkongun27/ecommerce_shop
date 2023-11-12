<?php

namespace   App\Service\OrderDetail;

use App\Service\BaseService;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;

class OrderDetailService extends BaseService implements OrderDetailServiceInterface 
{
    public $repository;
    
    public function __construct(OrderDetailRepositoryInterface $OrderDetailRepository)
    {   
            $this->repository = $OrderDetailRepository;
    } 
    
}
?>