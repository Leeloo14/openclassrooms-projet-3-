<?php

namespace Blog\Services;

class SessionService
{

    function isClientAuthorized($endTime)
    {
        return isset($endTime) && time() < $endTime;
    }

    function storeCookie()
    {
        $endTime = time() + 30; // Delai d'expiration de la session du client
        setcookie('blog_p4', $endTime); // Stock un cookie qui contient le temps d'expiration
    }

}