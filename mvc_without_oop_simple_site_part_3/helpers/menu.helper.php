<?php

/**
 * Функция для получения адреса пункта меню
 *
 * @param $controller
 * @param $action
 * @param array $params
 * @return string
 */
//function getUrlByParams($controller, $action, $params = array()){
function getUrlByParams($controller, $action, $alias){
    $url = http_build_query(
        array(
            'controller' => $controller,
            'action' => $action,
            'alias' => $alias
        )
    );
    return '/mvc_without_oop_simple_site_part_3/?'.$url;
}

/**
 * Получение меню
 */
require_once "./db_connect.php";
function getMenu(){
    global $_controller, $_action, $link;

    $sql = "select * from pages order by priority";
    $result = mysqli_query($link, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $menu[] = $row;
    }
    //$menu = array(
        //'Главная' => array(
            //'controller' => 'pages',
            //'action' => 'index',
        //),
        //'О нас' => array(
            //'controller' => 'pages',
            //'action' => 'show',
            //'params' => array(
                //'alias' => 'about'
            //)
        //),
        //'Товары' => array(
            //'controller' => 'goods',
            //'action' => 'index',
        //),
        //'Обратная связь' => array(
            //'controller' => 'pages',
            //'action' => 'contact_us',
        //),
    //);

    foreach($menu as &$item){
        $item['url'] = getUrlByParams($item['controller'], $item['action'], $item['alias']);
        $item['is_active'] = ( $item['controller'] == $_controller && $item['action'] == $_action );
        unset($item);
    }


    /**
     * Открыть буферизацию вывода
     */
    ob_start();
    include(TEMPLATES_PATH.'/helpers/menu.ctp');
    $html = ob_get_clean();

    return $html;
}