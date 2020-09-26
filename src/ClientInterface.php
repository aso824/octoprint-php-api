<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP;

use aso824\OctoPrintPHP\DTO\AccessControl\CurrentUser;
use aso824\OctoPrintPHP\DTO\Version\Version;
use aso824\OctoPrintPHP\Factory\ServiceFactoryInterface;
use aso824\OctoPrintPHP\Request\RequestHandlerInterface;
use aso824\OctoPrintPHP\Service\ConnectionServiceInterface;
use aso824\OctoPrintPHP\Service\FilesServiceInterface;

/**
 * @method CurrentUser getCurrentUser()
 * @method Version getVersion()
 *
 * @property-read ConnectionServiceInterface $connection
 * @property-read FilesServiceInterface      $files
 */
interface ClientInterface
{
    public function setConfiguration(ConfigurationInterface $configuration): void;
    public function setServiceFactory(ServiceFactoryInterface $serviceFactory): void;
    public function setRequestHandler(RequestHandlerInterface $requestHandler): void;

}
