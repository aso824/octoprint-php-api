<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Request;

use aso824\OctoPrintPHP\ConfigurationInterface;
use aso824\OctoPrintPHP\DTO\RequestDTOInterface;
use aso824\OctoPrintPHP\DTO\ResponseDTOInterface;
use aso824\OctoPrintPHP\Exception\RequestException;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Throwable;

final class RequestHandler implements RequestHandlerInterface
{
    private ConfigurationInterface $configuration;
    private ClientInterface $httpClient;
    private RequestFactoryInterface $requestFactory;
    private SerializerInterface $serializer;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;

        $this->requestFactory = new Psr17Factory();
        $this->serializer = new Serializer(
            [new ObjectNormalizer()],
            [new JsonEncoder()]
        );
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->configuration = $configuration;
    }

    public function execute(RequestDTOInterface $requestDTO): ResponseDTOInterface
    {
        $httpRequest = $this->createHttpRequest($requestDTO);

        try {
            $httpResponse = $this->httpClient->sendRequest($httpRequest);
        } catch (Throwable $throwable) {
            throw new RequestException($requestDTO, $throwable);
        }

        $body = $httpResponse->getBody()->getContents();

        return $this->serializer->deserialize($body, $requestDTO->getResponseClass(), 'json');
    }

    private function createHttpRequest(RequestDTOInterface $requestDTO): RequestInterface
    {
        $request = $this->requestFactory->createRequest(
            $requestDTO->getMethod(),
            $this->configuration->getHost() . $requestDTO->getPath()
        );

        if ($key = $this->configuration->getKey()) {
            $request = $request->withHeader('X-Api-Key', $key);
        }

        if ($body = $requestDTO->getBody()) {
            $stream = $this->requestFactory->createStream(json_encode($body, JSON_THROW_ON_ERROR));

            $request = $request->withBody($stream);
        }

        return $request;
    }
}
