<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use App\Libraries\WebsocketServer;

class StartWebSocket extends BaseCommand
{
    protected $group       = 'websocket';
    protected $name        = 'websocket:start';
    protected $description = 'Starts the WebSocket server';

    public function run(array $params)
    {
        CLI::write('Starting WebSocket server...', 'yellow');
        $port = 8080; // Port default

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new WebsocketServer()
                )
            ),
            $port
        );

        CLI::write("WebSocket server running on ws://127.0.0.1:$port", 'green');
        $server->run();
    }
}
