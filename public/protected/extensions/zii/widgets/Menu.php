<?php
Yii::import('zii.widgets.CMenu');
class Menu extends CMenu {
    protected function isItemActive($item, $route) {
        $route_trim = trim($route,'/');
        $cutRoute = substr($route_trim, 0, stripos($route_trim, '/'));
        return parent::isItemActive($item, $cutRoute) || parent::isItemActive($item, $route);
    }
}
?>