<?php

namespace App\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatServer implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Menyimpan koneksi klien
        $this->clients->attach($conn);
        echo "Koneksi baru: ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Kirim pesan ke semua klien yang terhubung
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // Hapus klien saat koneksi ditutup
        $this->clients->detach($conn);
        echo "Koneksi ({$conn->resourceId}) ditutup\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "Terjadi kesalahan: {$e->getMessage()}\n";
        $conn->close();
    }
}
