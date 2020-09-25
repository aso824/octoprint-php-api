<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\Connection;

use aso824\OctoPrintPHP\DTO\ResponseDTOInterface;

final class ConnectionStatus implements ResponseDTOInterface
{
    private CurrentConnectionStatus $current;
    private ConnectionStatusOptions $options;

    public function getCurrent(): CurrentConnectionStatus
    {
        return $this->current;
    }

    public function getOptions(): ConnectionStatusOptions
    {
        return $this->options;
    }
}
