<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Service;

use aso824\OctoPrintPHP\DTO\AccessControl\CurrentUser;
use aso824\OctoPrintPHP\DTO\AccessControl\CurrentUserRequest;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class CurrentUserService extends AbstractService implements CurrentUserServiceInterface
{
    public function __invoke(): CurrentUser
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->doRequest(new CurrentUserRequest());
    }
}
