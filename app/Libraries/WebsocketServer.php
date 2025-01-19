<?php

namespace App\Libraries;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use CodeIgniter\Database\Config;

class WebsocketServer implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg, true);

        $senderId = $data['sender_id'];
        $receiverId = $data['receiver_id'];
        $message = $data['message'];

        // Buat koneksi database
        $db = Config::connect();

        // Simpan pesan ke database
        $query = $db->table('messages')->insert([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'message' => $message,
            'is_read' => 0, // Pesan baru default belum dibaca
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if ($query) {
            echo "Pesan berhasil disimpan: $message\n";

            // Hitung jumlah pesan yang belum dibaca untuk receiver
            $unreadCount = $db->table('messages')
            ->where('receiver_id', $receiverId)
                ->where('is_read', 0)
                ->countAllResults();

            // Kirim data jumlah notifikasi ke semua klien
            foreach ($this->clients as $client) {
                $client->send(json_encode([
                    'type' => 'notification',
                    'receiver_id' => $receiverId,
                    'unread_count' => $unreadCount,
                ]));
            }
        } else {
            echo "Gagal menyimpan pesan.\n";
        }

        // Kirim pesan ke semua klien
        foreach ($this->clients as $client) {
            $client->send($msg);
        }
    }



    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
