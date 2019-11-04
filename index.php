<?php

$url = 'http://old.ki-aikido.com.ua/fotos/letnii-lager-2018';
$data = file_get_contents($url);

$images = [];
if (preg_match_all('/src="\S+\.jpg"/i', $data, $matches)){
    foreach ($matches[0] as $match){
        $images[] = trim(explode('=', $match)[1], '"');
    }
}
$path = __DIR__ . '/web/uploads/oldphoto/';

$count = 0;
$all = count($images);
foreach ($images as $image){
    $img = file_get_contents('http://old.ki-aikido.com.ua' . $image);
    $nameAsArray = explode('/', $image);
    $name = array_pop($nameAsArray);
    file_put_contents($path . $name, $img);
    $count++;
    $left = $all - $count;
    echo "{$count} done. Left {$left}" . PHP_EOL;
}

echo 'Done!';

