<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\MessageModel;

class MessageController extends BaseController
{
    protected $messageModel;
    protected $session;

    public function __construct()
    {
        $this->messageModel = new MessageModel();
        $this->session = session();
    }

    private function isUserLoggedIn()
    {
        return $this->session->has('id');
    }

    /**
     * Menampilkan semua pesan antara dua pengguna.
     */
    public function getMessages($senderId, $receiverId)
    {
        $messages = $this->messageModel->getMessages($senderId, $receiverId);
        return $this->response->setJSON($messages);
    }

    public function getUnreadCount()
    {
        $receiverId = $this->request->getVar('receiver_id'); // ID pengguna yang login

        $db = \Config\Database::connect();
        $query = $db->table('messages')
        ->where('receiver_id', $receiverId)
            ->where('is_read', 0)
            ->countAllResults();

        return $this->response->setJSON(['unread_count' => $query]);
    }


    /**
     * Tambahkan pesan baru.
     */
    public function sendMessage()
    {
        $request = \Config\Services::request();

        // Ambil data dari request
        $data = [
            'sender_id' => $request->getPost('sender_id'),
            'receiver_id' => $request->getPost('receiver_id'),
            'message' => $request->getPost('message'),
            'is_read' => 0,
        ];


        $messageModel = new \App\Models\MessageModel();
        $save = $messageModel->save($data);

        if ($save) {
            log_message('info', 'Pesan berhasil disimpan');
            return $this->response->setJSON(['status' => 'success', 'message' => 'Pesan berhasil disimpan']);
        } else {
            log_message('error', 'Gagal menyimpan pesan: ' . json_encode($messageModel->errors()));
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menyimpan pesan']);
        }
    }


    /**
     * Tandai pesan sebagai sudah dibaca.
     */
    public function markAsRead($messageId)
    {
        $result = $this->messageModel->markAsRead($messageId);

        if ($result) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Pesan berhasil ditandai sebagai sudah dibaca!',
            ]);
        }

        return $this->response->setStatusCode(500)->setJSON([
            'status' => 'error',
            'message' => 'Gagal memperbarui status pesan!',
        ]);
    }

    // public function index($userId)
    // {
    //     // Ambil pesan yang relevan (contoh: untuk user ID 1)
    //     $messages = $this->messageModel
    //         ->select('messages.*, user.username as sender_name')
    //         ->join('user', 'user.id = messages.sender_id')
    //         ->where('receiver_id', $userId)
    //         ->orWhere('sender_id', $userId)
    //         ->orderBy('created_at', 'DESC')
    //         ->findAll();

    //     // dd ($messages);
    //     return view('content/message', [
    //         'messages' => $messages,
    //         'userId' => $userId
    //     ]);
    // }

    /**
     * Menampilkan pesan antara pengirim dan penerima tertentu.
     */
    // public function index($senderId, $receiverId)
    // {
    //     // Ambil semua pesan antara pengirim dan penerima
    //     $messages = $this->messageModel
    //         ->where("(sender_id = $senderId AND receiver_id = $receiverId)")
    //         ->orWhere("(sender_id = $receiverId AND receiver_id = $senderId)")
    //         ->orderBy('created_at', 'ASC') // Urutkan berdasarkan waktu pesan
    //         ->findAll();

    //     // Kirim data ke view
    //     return view('content/message', [
    //         'messages' => $messages,
    //         'senderId' => $senderId,
    //         'receiverId' => $receiverId
    //     ]);
    // }

    // public function index()
    // {
    //     return view('messages/chat_view');
    // }

    /**
     * Menampilkan daftar pesan terakhir dari setiap pengirim ke user yang sedang login.
     */
    public function index()
    {
        // Contoh ID user yang sedang login (ganti dengan session user ID)
        $loggedInUserId = session()->get('id'); // Pastikan Anda memiliki session user ID
        $isLoggin = $this->isUserLoggedIn();

        // dd ($loggedInUserId);
        // Ambil pesan terakhir dari setiap pengirim
        $messages = $this->messageModel
            ->select('messages.*, user.username as sender_name')
            ->join('user', 'user.id = messages.sender_id')
            ->where('receiver_id', $loggedInUserId)
            // ->groupBy('sender_id')
            ->orderBy('created_at', 'DESC')
            // limit 1 message
            ->limit(1)
            ->findAll();
        // dd ($messages);
        // Kirim data ke view
        return view('content/message', [
            'messages' => $messages,
            'loggedInUserId' => $loggedInUserId,
        ]);
    }

    /**
     * Menampilkan isi percakapan antara user login dan pengirim tertentu.
     */
    public function chat($receiverId)
    {
        // ID user yang login
        $loggedInUserId = session()->get('id');

        // Ambil pesan antara pengguna yang login dan penerima
        $messages = $this->messageModel->getMessages($loggedInUserId, $receiverId);

        // Kirim data ke view
        return view('messages/chat', [
            'messages' => $messages,
            'loggedInUserId' => $loggedInUserId,
            'receiverId' => $receiverId,
        ]);
    }

}
