<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\AccessControl;

use aso824\OctoPrintPHP\DTO\ResponseDTOInterface;

final class CurrentUser implements ResponseDTOInterface
{
    /**
     * @var string|null
     */
    private ?string $name = null;

    /**
     * @var string[]|array
     */
    private array $groups;

    /**
     * @var string[]|array|null
     */
    private ?array $permissions;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getGroups(): array
    {
        return $this->groups;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }
}
