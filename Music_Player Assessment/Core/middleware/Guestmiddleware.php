<?php

namespace Core\middleware;

class Guestmiddleware
{
    public function handler(){
        if (isset($_SESSION['login'])) {
            header('Location: /');
        }
    }
}