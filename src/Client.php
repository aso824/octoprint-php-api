<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP;

use aso824\OctoPrintPHP\DTO\AccessControl\CurrentUser;
use aso824\OctoPrintPHP\DTO\Version\Version;
use aso824\OctoPrintPHP\Factory\ServiceFactory;
use aso824\OctoPrintPHP\Factory\ServiceFactoryInterface;
use aso824\OctoPrintPHP\Request\RequestHandler;
use aso824\OctoPrintPHP\Request\RequestHandlerInterface;
use aso824\OctoPrintPHP\Service\ServiceInterface;
use Psr\Http\Client\ClientInterface as HttpClientInterface;

/**
 * @method CurrentUser getCurrentUser()
 * @method Version getVersion()
 */
final class Client implements ClientInterface
{
    private ConfigurationInterface $configuration;
    private ?ServiceFactoryInterface $serviceFactory;
    private ?RequestHandlerInterface $requestHandler;

    private array $dependencies;

    public function __construct(
        ConfigurationInterface $configuration,
        HttpClientInterface $httpClient,
        ?ServiceFactoryInterface $serviceFactory = null,
        ?RequestHandlerInterface $requestHandler = null
    ) {
        $this->serviceFactory = $serviceFactory ?? new ServiceFactory();
        $this->requestHandler = $requestHandler ?? new RequestHandler($httpClient);

        $this->dependencies = [
            $this->requestHandler,
        ];

        $this->setConfiguration($configuration);
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->configuration = $configuration;

        $this->requestHandler->setConfiguration($this->configuration);
    }

    public function setServiceFactory(ServiceFactoryInterface $serviceFactory): void
    {
        $this->serviceFactory = $serviceFactory;
    }

    public function setRequestHandler(RequestHandlerInterface $requestHandler): void
    {
        $this->requestHandler = $requestHandler;
    }

    public function __get($name): ServiceInterface
    {
        return $this->serviceFactory->makeService($name, $this->dependencies);
    }

    public function __call($name, $arguments)
    {
        $name = preg_replace('/^(get|set|do)/', '', $name);

        return $this->serviceFactory->makeService($name, $this->dependencies)($arguments);
    }
}
