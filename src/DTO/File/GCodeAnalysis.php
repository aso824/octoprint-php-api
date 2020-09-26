<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class GCodeAnalysis
{
    private float $estimatedPrintTime;

    /**
     * The "aarray" is a patch until this fix is not released: https://github.com/symfony/symfony/pull/37559
     *
     * @var aarray<string, GCodeAnalysisFilamentTool>
     */
    private ?array $filament = null;

    private ?GCodeAnalysisDimensions $dimensions = null;
    private ?GCodeAnalysisPrintingArea $printingArea = null;

    public function getEstimatedPrintTime(): float
    {
        return $this->estimatedPrintTime;
    }

    /**
     * @return array<string, GCodeAnalysisFilamentTool>
     */
    public function getFilament(): array
    {
        return $this->filament;
    }

    public function getDimensions(): ?GCodeAnalysisDimensions
    {
        return $this->dimensions;
    }

    public function getPrintingArea(): ?GCodeAnalysisPrintingArea
    {
        return $this->printingArea;
    }
}
