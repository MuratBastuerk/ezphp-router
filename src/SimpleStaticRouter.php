<?php


namespace Mb7\EzPhp\Router;

/**
 * Class SimpleStaticRouter
 * @package Mb7\EzPhp\Router
 */
class SimpleStaticRouter implements RouterInterface
{
    /**
     * @var array
     */
    private array $server;

    /**
     * @var array
     */
    private array $get;

    /**
     * @var array
     */
    private array $post;

    /**
     * @var string
     */
    private string $defaultRoute = "/index/index";

    /**
     * @param array $server
     * @param array $get
     * @param array $post
     */
    public function __construct(array $server, array $get, array $post)
    {
        $this->server = $server;
        $this->get = $get;
        $this->post = $post;
    }

    /**
     * @inheritDoc
     */
    public function getHost(): string
    {
        return $this->server["HTTP_HOST"];
    }

    /**
     * @inheritDoc
     */
    public function getPort(): string
    {
        return $this->server["SERVER_PORT"];
    }

    /**
     * @inheritDoc
     */
    public function getProtocol(): string
    {
        return $this->server["SERVER_PROTOCOL"];
    }

    /**
     * @inheritDoc
     */
    public function getUrlRouteParams(): array
    {
        if (count($this->getUrlParts($this->getURl())) > 3) {
            return array_slice($this->getUrlParts($this->getURl()), 3);
        }
        return array();
    }

    /**
     * @inheritDoc
     */
    public function getParams(): array
    {
        return $this->get;
    }

    /**
     * @inheritDoc
     */
    public function getPostParams(): array
    {
        return $this->post;
    }

    /**
     * @inheritDoc
     */
    public function getURl(): string
    {
        if ($this->checkValueInArray("REDIRECT_URL", $this->server)) {
            return $this->server["REDIRECT_URL"];
        } else return $this->defaultRoute;
    }

    /**
     * @inheritDoc
     */
    public function setDefaultRoute(string $defaultRoute)
    {
        $this->defaultRoute = $defaultRoute;
    }

    /**
     * @inheritDoc
     */
    public function routeToURL(string $url): void
    {
        header("Location: $url");
    }

    /**
     * @inheritDoc
     */
    public function routeToRelativeURL(string $relativeUrl)
    {
        $route = $this->getProtocol().$this->getHost()."/".$relativeUrl;
        header("Location: $route");
    }

    /**
     * @param $url
     * @return array
     */
    protected function getUrlParts($url): array
    {
        return explode("/", $url);
    }

    /**
     *
     * Helper function to check array value
     *
     * @param $value
     * @param array $haystack
     * @return bool
     */
    protected function checkValueInArray($value, array $haystack): bool
    {
        return array_key_exists($value, $haystack) && !empty($haystack[$value]);
    }
}