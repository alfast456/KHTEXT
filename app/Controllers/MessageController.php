<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\MessageModel;
use App\Models\UserModel;

class MessageController extends BaseController
{
    protected $messageModel;
    protected $user;
    protected $session;

    public function __construct()
    {
        $this->messageModel = new MessageModel();
        $this->userModel = new UserModel();
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

        // Ambil data dasar pesan dari request
        $data = [
            'sender_id'   => $request->getPost('sender_id'),
            'receiver_id' => $request->getPost('receiver_id'),
            'message'     => $request->getPost('message'),
            'is_read'     => 0,
        ];

        // Cek apakah terdapat data file pada request
        $filePost = $request->getPost('file'); // file dikirim sebagai JSON string
        if ($filePost) {
            // Decode data file
            $file = json_decode($filePost);
            if ($file && isset($file->data)) {
                $fileData = $file->data;

                // Hapus prefix data URL (contoh: "data:image/png;base64,")
                if (preg_match('/^data:\w+\/\w+;base64,/', $fileData)) {
                    $fileData = substr($fileData, strpos($fileData, ',') + 1);
                }

                // Decode data base64
                $decodedData = base64_decode($fileData);

                // Tentukan direktori penyimpanan file (pastikan direktori 'uploads' berada di folder public)
                $uploadDir = FCPATH . 'uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                // Buat nama file unik untuk menghindari konflik
                $newFileName = uniqid() . '_' . $file->name;
                $filePath = $uploadDir . $newFileName;

                // Simpan file ke server
                if (file_put_contents($filePath, $decodedData)) {
                    // Buat URL file agar dapat diakses oleh client
                    $fileUrl = base_url('uploads/' . $newFileName);
                    // Tambahkan data file ke $data yang akan disimpan ke database
                    $data['file_url']  = $fileUrl;
                    $data['file_name'] = $file->name;
                    $data['file_type'] = $file->type;
                    log_message('info', 'File berhasil disimpan: ' . $fileUrl);
                } else {
                    log_message('error', 'Gagal menyimpan file: ' . $file->name);
                }
            }
        }
        // dd ($data);
        // Simpan data pesan ke database
        $messageModel = new \App\Models\MessageModel();
        $save = $messageModel->save($data);

        if ($save) {
            log_message('info', 'Pesan berhasil disimpan');
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Pesan berhasil disimpan',
                'data'    => $data, // opsional: untuk debugging atau kebutuhan lain
            ]);
        } else {
            log_message('error', 'Gagal menyimpan pesan: ' . json_encode($messageModel->errors()));
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Gagal menyimpan pesan'
            ]);
        }
    }


    /**
     * Tandai pesan sebagai sudah dibaca.
     */
    public function markAsRead()
    {
        // Pastikan request menggunakan metode POST
        if ($this->request->getMethod() !== 'post') {
            return $this->response->setStatusCode(405)->setJSON([
                'status'  => 'error',
                'message' => 'Method not allowed'
            ]);
        }

        // Ambil data JSON dari body request
        $input = json_decode($this->request->getBody(), true);
        $messageId = isset($input['message_id']) ? (int)$input['message_id'] : null;

        if (!$messageId) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => 'error',
                'message' => 'Message ID is required'
            ]);
        }

        // Panggil model untuk update status pesan menjadi sudah dibaca (is_read = 1)
        $result = $this->messageModel->markAsRead($messageId);

        if ($result) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Pesan berhasil ditandai sebagai sudah dibaca!'
            ]);
        }

        return $this->response->setStatusCode(500)->setJSON([
            'status'  => 'error',
            'message' => 'Gagal memperbarui status pesan!'
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
            ->groupBy('sender_id')
            ->orderBy('created_at', 'DESC')
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
        $findUser = $this->userModel->find($receiverId);
        // Kirim data ke view
        return view('messages/chat', [
            'messages' => $messages,
            'loggedInUserId' => $loggedInUserId,
            'receiverId' => $receiverId,
            'receiverName' => $findUser['username'],
        ]);
    }

}
