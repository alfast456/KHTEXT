<?php

namespace App\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use App\Models\MessageModel;
use App\Controllers\MessageController;

class ChatServer implements MessageComponentInterface
{
    protected $clients;
    protected $db;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $db = \Config\Database::connect();
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Menyimpan koneksi klien
        $this->clients->attach($conn);
        echo "Koneksi baru: ({$conn->resourceId})\n";
    }

    // Ketika pesan diterima dari klien
    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg, true);

        // Validasi data
        if (!isset($data['sender_id'], $data['receiver_id'], $data['message'])) {
            echo "Data tidak valid\n";
            return;
        }

        log_message('info', 'Data diterima di WebSocket: ' . json_encode($data));

        // Panggil MessageController untuk menyimpan pesan
        $messageController = new \App\Controllers\MessageController();
        $save = $messageController->sendMessage($data);

        if ($save) {
            echo "Pesan berhasil disimpan\n";
        } else {
            echo "Gagal menyimpan pesan\n";
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
