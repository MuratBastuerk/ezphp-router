<?php


namespace Mb7\EzPhp\Router;


/**
 * Interface RouterInterface
 * @package Mb7\EzPhp\Router
 */
interface RouterInterface
{
    /**
     * @return string
     */
    public function getHost(): string;

    /**
     * @return string
     */
    public function getPort(): string;

    /**
     * @return string
     */
    public function getURl(): string;

    /**
     * @return array
     */
    public function getUrlRouteParams(): array;

    /**
     * @return array
     */
    public function getParams(): array;

    /**
     * @return string
     */
    public function getProtocol(): string;

    /**
     * @return array
     */
    public function getPostParams(): array;

    /**
     * @param string $defaultRoute
     * @return mixed
     */
    public function setDefaultRoute(string $defaultRoute);

    /**
     * @param string $relativeUrl
     * @return mixed
     */
    public function routeToRelativeURL(string $relativeUrl);

    /**
     * @param string $url
     * @return mixed
     */
    public function routeToURL(string $url);
}