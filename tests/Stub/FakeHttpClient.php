<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Tests\Stub;

use Nyholm\Psr7\Response;
use Nyholm\Psr7\Stream;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class FakeHttpClient implements ClientInterface
{
    private string $response;
    private ?string $lastUri = null;
    private ?string $lastMethod = null;
    private ?string $lastContent = null;

    public function __construct(string $response)
    {
        $this->response = $response;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->lastUri = (string) $request->getUri();
        $this->lastMethod = $request->getMethod();
        $this->lastContent = $request->getBody()->getContents();

        $stream = Stream::create($this->response);
        $stream->seek(0);

        return new Response(200, [], $stream);
    }

    public function setResponse(string $response): void
    {
        $this->response = $response;
    }

    public function getLastUri(): ?string
    {
        return $this->lastUri;
    }

    public function getLastMethod(): ?string
    {
        return $this->lastMethod;
    }

    public function getLastContent(): ?string
    {
        return $this->lastContent;
    }
}
