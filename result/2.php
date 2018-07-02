<?php


function manipulate($array, $path = "") //TODO: function manipulate(&$array, $path = "")
{
    foreach ($array as $key => $value) {
        if ($value == 3) {
            unset($array["query"][$key]);
        }
    }

    asort($array);

    if (!empty($path)) {
        $array["url"] = $path;
    }

    return $array;
}

//TODO: если просто строка
$url = "https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3";
$url = parse_url($url);
parse_str($url["query"], $url["query"]);
$url["query"] = manipulate($url["query"], $url["path"]); //TODO: manipulate($url["query"], $url["path"]);

echo $url["scheme"] . "://" . $url["host"] . "/?" . http_build_query($url["query"]);

//TODO: если рельное обращение
$path = explode("?", $_SERVER["REQUEST_URI"], 2);
$path = $path[0];
$getParams = manipulate($_GET, $path); //TODO: manipulate($_GET, $path);

echo "http" . (isset($_SERVER["HTTPS"]) ? "s" : "") . "://" . $_SERVER["HTTP_HOST"] . "/?" . http_build_query($getParams);