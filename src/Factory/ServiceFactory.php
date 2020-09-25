<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Factory;

use aso824\OctoPrintPHP\Exception\ServiceNotFoundException;
use aso824\OctoPrintPHP\Service\ServiceInterface;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class ServiceFactory implements ServiceFactoryInterface
{
    /** @var ServiceInterface[] */
    private array $cache = [];

    /**
     * {@inheritDoc}
     */
    public function makeService(string $name, array $dependencies = []): ServiceInterface
    {
        $fqcn = $this->getServiceFQCN($name);

        if (!class_exists($fqcn)) {
            throw new ServiceNotFoundException($name);
        }

        if (!array_key_exists($fqcn, $this->cache)) {
            $this->cache[$fqcn] = new $fqcn(...$dependencies);
        }

        return $this->cache[$fqcn];
    }

    private function getServiceFQCN(string $name): string
    {
        $className = sprintf('%sService', ucfirst($name));

        return $this->resolveRootNamespace() . '\\Service\\' . $className;
    }

    private function resolveRootNamespace(): string
    {
        $parts = explode('\\', __NAMESPACE__);

        array_pop($parts);

        return implode('\\', $parts);
    }
}
