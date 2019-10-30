<?php


namespace Mb7\EzPhp\Router;


use Mb7\EzPhp\Mvc\Controller\AbstractController;

interface RouterInterface
{
    public function getHost(): string;

    public function getPort(): string;

    public function getURl(): string;

    public function getUrlRouteParams(): array;

    public function getParams(): array;

    public function getProtocol(): string;

    public function getPostParams(): array;

    public function setDefaultRoute(string $defaultRoute);

    public function routeToRelativeURL(string $relativeUrl);

    public function routeToURL(string $url);
}