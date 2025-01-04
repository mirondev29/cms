<?php

namespace Engine\Http;

class Request
{
    private readonly array $getParams;
    private readonly array $postParams;
    private readonly array $cookies;
    private readonly array $files;
    private readonly array $server;

    public function __construct($getParams, $postParams, $cookies, $files, $server)
    {
        $this->getParams = $getParams;
        $this->postParams = $postParams;
        $this->cookies = $cookies;
        $this->files = $files;
        $this->server = $server;
    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

}