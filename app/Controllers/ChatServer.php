<?php

namespace App\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use App\Models\MessageModel;
use CodeIgniter\Database\Config;
use App\Controllers\MessageController;

class ChatServer implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "Koneksi baru: ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg, true);

        $senderId = $data['sender_id'];
        $receiverId = $data['receiver_id'];
        $message = $data['message'];

        // Buat koneksi database manual
        $db = Config::connect();
        
        // Simpan pesan ke database
        $query = $db->table('messages')->insert([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'message' => $message,
            'is_read' => 0, // Default: belum dibaca
        ]);

        if ($query) {
            echo "Pesan berhasil disimpan: $message\n";
        } else {
            echo "Gagal menyimpan pesan: ";
            print_r($db->error());
        }

        // Kirim pesan ke semua klien
        foreach ($this->clients as $client) {
            if ($client !== $from) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Koneksi ({$conn->resourceId}) ditutup\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "Terjadi kesalahan: {$e->getMessage()}\n";
        $conn->close();
    }
}
