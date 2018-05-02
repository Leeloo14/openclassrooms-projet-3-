<?php

namespace Blog\Services;

class SessionService
{

    function isClientAuthorized()
    {
        return isset($_COOKIE['blog_p4']);
    }

    function storeCookie()
    {
        $endTime = time() + 3600; // Delai d'expiration de la session du client
        setcookie('blog_p4', 'connexion-pr4', $endTime); // Stock un cookie qui contient le temps d'expiration
    }

    function disconnect(){
        setcookie('blog_p4', 'connexion-pr4', time() - 1);
    }

}
