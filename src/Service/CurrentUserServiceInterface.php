<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Service;

use aso824\OctoPrintPHP\DTO\AccessControl\CurrentUser;

interface CurrentUserServiceInterface extends ServiceInterface
{
    public function __invoke(): CurrentUser;
}
