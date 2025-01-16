<?php

require __DIR__ . '/vendor/autoload.php';

use Ratchet\App;
use App\Controllers\ChatServer;

$port = 8081; // Port untuk server WebSocket
$host = '127.0.0.1'; // Host server

$server = new App($host, $port, '127.0.0.1');
$server->route('/message', new ChatServer(), ['*']);
$server->run();
