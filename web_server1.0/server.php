#!/usr/bin/php
<?php


$red = "\e[0;31m";
$blue = "\e[0;34m";

$port = 80;
$socket = socket_create_listen($port);

echo $red.'Server running on: ';
echo $blue."localhost:$port \n";

if (!$socket) {
    print 'Fatal Error dude';
    exit;
}

while (true) {
    $client = socket_accept($socket);
    $request = trim(socket_read($client, 4096));
    $request = explode(' ', $request);
    $path = $request[1];

    switch ($path) {
        case '/':
            $render = './index.html';
            break;
        case '/home':
            $render = './home.html';
            break;
        default:
            $render = './404.html';
    }

    if (is_readable($render)) {
        $content = file_get_contents($render);
        $response = "HTTP/2 200 OK\r\nServer: SamServer\r\nConnection: close\r\nContent-Type: text/html\r\n\r\n$content";
    } else {
        $content = 'No file at that path';
        $response = "HTTP/2 404 URL not found\r\nServer: SamServer\r\nConnection: close\r\nContent-Type: text/html\r\n\r\n$content";
    }

    socket_write($client, $response);
    socket_close($client);
}
?>
