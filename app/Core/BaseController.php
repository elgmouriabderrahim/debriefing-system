<?php
namespace App\Core;

use eftec\bladeone\BladeOne;

abstract class BaseController
{
    protected BladeOne $blade;

    public function __construct(BladeOne $blade)
    {
        $this->blade = $blade;
    }

    protected function render(string $view, array $data = [])
    {
        echo $this->blade->run($view, $data);
    }
}
