<?php

namespace Hollow3464\HtmxTwigMiddlewarePsr;

use Hollow3464\HtmxPsr\HtmxRequest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class HtmxTwigMiddlewarePsr implements MiddlewareInterface
{
    public function __construct(
        private \Twig\Environment $twig
    ) {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $this->twig->addGlobal('htmx', HtmxRequest::fromRequest($request));
        return $handler->handle($request);
    }
}
