<?php
namespace App\Core;
use App\Core\ViewFactory;

abstract class BaseController
{
    protected function render(string $view, array $data = [])
    {
        $blade = ViewFactory::init();
        echo $blade->run($view, $data);
    }
}
