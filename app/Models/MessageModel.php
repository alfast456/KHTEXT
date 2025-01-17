<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table            = 'messages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'sender_id',
        'receiver_id',
        'message',
        'is_read',
        'created_at',
        'updated_at',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Ambil semua pesan berdasarkan pengirim dan penerima.
     */
    public function getMessages($loggedInUserId, $senderId)
    {
        return $this->db->table('messages')
        ->select('messages.*, user.username as sender_name')
        ->join('user', 'user.id = messages.sender_id')
        ->where("(messages.sender_id = $loggedInUserId AND messages.receiver_id = $senderId)")
        ->orWhere("(messages.sender_id = $senderId AND messages.receiver_id = $loggedInUserId)")
        ->orderBy('messages.created_at', 'ASC')
        ->get()
            ->getResultArray();
    }

    /**
     * Tandai pesan sebagai sudah dibaca.
     */
    public function markAsRead($messageId)
    {
        return $this->update($messageId, ['is_read' => true]);
    }
}
