<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class GCodeAnalysisPrintingArea
{
    private ?float $minX = null;
    private ?float $minY = null;
    private ?float $minZ = null;
    private ?float $maxX = null;
    private ?float $maxY = null;
    private ?float $maxZ = null;

    public function getMinX(): ?float
    {
        return $this->minX;
    }

    public function getMinY(): ?float
    {
        return $this->minY;
    }

    public function getMinZ(): ?float
    {
        return $this->minZ;
    }

    public function getMaxX(): ?float
    {
        return $this->maxX;
    }

    public function getMaxY(): ?float
    {
        return $this->maxY;
    }

    public function getMaxZ(): ?float
    {
        return $this->maxZ;
    }
}
