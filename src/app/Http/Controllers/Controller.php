<?php

namespace App\Http\Controllers;

use App\Core\Services\Contracts\ServiceInterface;
use App\Core\Traits\ApiResponse;
use App\Core\Traits\CrudHandler;

abstract class Controller
{
    use ApiResponse;
    use CrudHandler;

    protected ServiceInterface $service;

    protected function setService(ServiceInterface $service): void
    {
        $this->service = $service;
    }

    protected function service(): ServiceInterface
    {
        return $this->service;
    }
}
