<?php

class App {
    
    public function __construct() {
        $url = $this->parseUrl();

        $controllerName = "{$url[0]}Controller";

        if (!file_exists("controllers/$controllerName.php"))
            return;

        require_once "controllers/$controllerName.php";
        $controller = new $controllerName;
        $methodName = isset($url[1]) ? $url[1] : "index";

        if (!method_exists($controller, $methodName))
            return;

        // HomeController -> hello(Chien)
        // $controller -> $methodName($url[2]);
        // echo $methodName;

        // 第零項和第一項刪除, 第二項還是第二項
        unset($url[0]); unset($url[1]);
        // print_r($url);

        // 如果url有資料, 就把資料拿出來重做一個陣列
        $params = $url ? array_values($url) : Array();
        // echo "<hr>";
        // var_dump($params);

        // 呼叫控制器的方法, 並且導入數值
        call_user_func_array(Array($controller, $methodName), $params);
    }
    
    public function parseUrl() {
        if (isset($_GET["url"])) {
            // 去掉最右邊的/
            $url = rtrim($_GET["url"], "/");
            // 根據/拆解成陣列
            $url = explode("/", $url);
            return $url;
        }
    }
    
}

?>