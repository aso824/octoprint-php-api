<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Tests\Feature\Service;

use aso824\OctoPrintPHP\Configuration;
use aso824\OctoPrintPHP\DTO\File\File;
use aso824\OctoPrintPHP\DTO\File\GCodeAnalysisFilamentTool;
use aso824\OctoPrintPHP\Request\RequestHandler;
use aso824\OctoPrintPHP\Service\FilesService;
use aso824\OctoPrintPHP\Service\FilesServiceInterface;
use aso824\OctoPrintPHP\Tests\Stub\FakeHttpClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;

final class FilesServiceTest extends TestCase
{
    private FilesServiceInterface $filesService;
    private ClientInterface $fakeClient;

    protected function setUp(): void
    {
        $this->fakeClient = new FakeHttpClient('');

        $requestHandler = new RequestHandler($this->fakeClient);
        $requestHandler->setConfiguration(new Configuration('', ''));

        $this->filesService = new FilesService($requestHandler);
    }

    public function testGetFiles(): void
    {
        $this->fakeClient->setResponse(file_get_contents('tests/Resources/JSON/FilesList.json'));

        $result = $this->filesService->getFiles();

        self::assertEquals(102400, $result->getFree());
        self::assertIsArray($result->getFiles());
        self::assertCount(1, $result->getFiles());

        $firstFile = $result->getFiles()[0];

        self::assertInstanceOf(File::class, $firstFile);
        self::assertNotNull($firstFile->getGcodeAnalysis());
        self::assertArrayHasKey('tool0', $firstFile->getGcodeAnalysis()->getFilament());
        self::assertInstanceOf(GCodeAnalysisFilamentTool::class, $firstFile->getGcodeAnalysis()->getFilament()['tool0']);
    }
}
