<?php

namespace App\Http\Controllers;

use App\Core\Services\Contracts\ServiceInterface;
use App\Core\Traits\Controllers\Crudable;
use App\Core\Traits\Responseable;

abstract class Controller
{
    use Crudable;
    use Responseable;

    protected ServiceInterface $service;

    protected function setService(ServiceInterface $service): void
    {
        $this->service = $service;
    }

    protected function getService(): ServiceInterface
    {
        return $this->service;
    }
}
