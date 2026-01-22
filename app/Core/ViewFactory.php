<?php
namespace App\Core;
use eftec\bladeone\BladeOne;

class ViewFactory {
    private static ?bladeOne $blade = null;
    private function __construct() {}

    public static function init() {
        if (self::$blade === null) {
            $views = __DIR__ . '/../Views';
            $cache = __DIR__ . '/../../cache';
            self::$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
        }
        return self::$blade;
    }
}