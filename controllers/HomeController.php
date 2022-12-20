<?php
class HomeController
{
    function index($page)
    {
        include('views/' . $page . '.php');
    }
}
