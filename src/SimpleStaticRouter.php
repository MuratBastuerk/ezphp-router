<?php


namespace Mb7\EzPhp\Router;

class SimpleStaticRouter implements RouterInterface
{
    private $server;
    private $get;
    private $post;
    private $defaultRoute = "/index/index";

    public function __construct($server, $get, $post)
    {
        $this->server = $server;
        $this->get = $get;
        $this->post = $post;
    }

    public function getHost(): string
    {
        return $this->server["HTTP_HOST"];
    }

    public function getPort(): string
    {
        return $this->server["SERVER_PORT"];
    }

    public function getProtocol(): string
    {
        return $this->server["SERVER_PROTOCOL"];
    }

    public function getUrlRouteParams(): array
    {
        if (count($this->getUrlParts($this->getURl())) > 3) {
            return array_slice($this->getUrlParts($this->getURl()), 3);
        }
        return array();
    }

    public function getParams(): array
    {
        return $this->get;
    }

    public function getPostParams(): array
    {
        return $this->post;
    }

    public function getURl(): string
    {
        if ($this->checkValueInArray("REDIRECT_URL", $this->server)) {
            return $this->server["REDIRECT_URL"];
        } else return $this->defaultRoute;
    }

    public function setDefaultRoute(string $defaultRoute)
    {
        $this->defaultRoute = $defaultRoute;
    }

    public function routeToURL(string $url)
    {
        // TODO: Implement routeToURL() method.
    }

    public function routeToRelativeURL(string $relativeUrl)
    {
        // TODO: Implement routeToRelativeURL() method.
    }


    protected function getUrlParts($url)
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