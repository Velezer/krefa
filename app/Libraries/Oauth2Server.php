<?php

namespace App\Libraries;

//use \OAuth2\Storage\Pdo;
// use \App\Libraries\CustomOauthStorage;


class Oauth2Server
{
    function __construct()
    {
        $dsn      = getenv('database.oauth2.dsn');
        $username = getenv('database.default.username');
        $password = getenv('database.default.password');

        $storage = new \OAuth2\Storage\Pdo(array('dsn' => $dsn, 'username' => $username, 'password' => $password));

        $config = [
            'access_lifetime' => 3600*24
        ];
        $this->server = new \OAuth2\Server($storage, $config);
        $this->server->addGrantType(new \OAuth2\GrantType\RefreshToken($storage));
        $this->server->addGrantType(new \OAuth2\GrantType\UserCredentials($storage));
    }
}
