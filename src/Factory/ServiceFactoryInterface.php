<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Factory;

use aso824\OctoPrintPHP\Exception\ServiceNotFoundException;
use aso824\OctoPrintPHP\Service\ServiceInterface;

interface ServiceFactoryInterface
{
    /**
     * @param string $name Name of service
     * @param object[] $dependencies Array of objects that need to be passed to constructor
     *
     * @return ServiceInterface
     *
     * @throws ServiceNotFoundException
     */
    public function makeService(string $name, array $dependencies = []): ServiceInterface;
}
