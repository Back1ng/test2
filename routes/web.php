<?php

$namespaceControllers = "App\Controllers\\";

// Описание существующих маршрутов
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'MainController@index');
    $r->addRoute('GET', '/parse-xlsx', 'ParserController@index');
    $r->addRoute('GET', '/delete/{id:\d+}', 'RowsController@delete');
    $r->addRoute('GET', '/show-edit/{id:\d+}', 'RowsController@showEditForm');
    $r->addRoute('POST', '/edit/{id}', 'RowsController@edit');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    case FastRoute\Dispatcher::NOT_FOUND:
        break;

    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars    = $routeInfo[2];

        // разбираю handler на контроллер/метод
        $class = explode("@", $handler);
        $class[0] = $namespaceControllers . $class[0];

        // создаю новый объект
        $controller = new $class[0];

        // вызываю разобранный метод с неизвестным количеством переменных
        $controller->{$class[1]}(...array_values($vars));

        break;
}
