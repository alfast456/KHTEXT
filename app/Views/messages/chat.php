<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<style>
    /* Reset dan dasar */
    * {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: 'Arial', sans-serif;
        background: #f8f9fa;
    }

    /* Wrapper utama chat */
    .chat-wrapper {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    /* Header Chat */
    .chat-header {
        background: #007bff;
        color: #fff;
        padding: 1rem;
        text-align: center;
        font-size: 1.2rem;
        font-weight: bold;
    }

    /* Body Chat */
    .chat-body {
        flex: 1;
        overflow-y: auto;
        padding: 1rem;
        background: #fff;
    }

    /* Container Pesan */
    .messages-content {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    /* Style Bubble Pesan Umum */
    .message-item {
        max-width: 70%;
        position: relative;
        padding: 10px 15px;
        word-wrap: break-word;
        margin-bottom: 10px;
    }

    /* Bubble Incoming ala WhatsApp */
    .message-item.incoming-message {
        background: #f1f1f1;
        color: #333;
        align-self: flex-start;
        border-radius: 15px 15px 15px 0;
    }

    .message-item.incoming-message:before {
        content: "";
        position: absolute;
        bottom: 0;
        left: -10px;
        border: 10px solid transparent;
        border-right-color: #f1f1f1;
        /* Mengatur agar tail menempel pada bubble */
        top: auto;
    }

    /* Bubble Outgoing ala WhatsApp */
    .message-item.outgoing-message {
        background: #007bff;
        color: #fff;
        align-self: flex-end;
        border-radius: 15px 15px 0 15px;
    }

    .message-item.outgoing-message:after {
        content: "";
        position: absolute;
        bottom: 0;
        right: -10px;
        border: 10px solid transparent;
        border-left-color: #007bff;
        top: auto;
    }

    /* Header Pesan: Nama pengirim */
    .message-user {
        margin-bottom: 5px;
    }

    .message-user h5 {
        margin: 0;
        font-size: 0.9rem;
        font-weight: bold;
    }

    /* Isi Pesan */
    .message-text {
        line-height: 1.4;
    }

    /* Waktu Pesan */
    .time {
        font-size: 0.7rem;
        color: rgba(0, 0, 0, 0.6);
        text-align: right;
        margin-top: 5px;
    }

    /* Input Chat */
    .chat-input-wrapper {
        padding: 0.75rem 1rem;
        border-top: 1px solid #ddd;
        display: flex;
        align-items: center;
        background: #fff;
    }

    .chat-input {
        flex: 1;
        padding: 0.75rem 1rem;
        border: 1px solid #ccc;
        border-radius: 20px;
        font-size: 1rem;
        outline: none;
    }

    .chat-input:focus {
        border-color: #007bff;
    }

    .send-btn {
        background: #007bff;
        border: none;
        color: #fff;
        padding: 0.75rem;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 10px;
    }

    .send-btn:hover {
        background: #0056b3;
    }
</style>

<div class="chat-wrapper">
    <!-- Header Chat -->
    <div class="chat-header">
        Chat Room with <?= esc($receiverName) ?>
    </div>

    <!-- Body Chat -->
    <div class="chat-body">
        <div id="chat-box" class="messages-content">
            <?php if (!empty($messages)) : ?>
                <?php foreach ($messages as $message) : ?>
                    <?php $isOutgoing = $message['sender_id'] == $loggedInUserId; ?>
                    <div class="message-item <?= $isOutgoing ? 'outgoing-message' : 'incoming-message' ?>">
                        <div class="message-user">
                            <h5><?= $isOutgoing ? 'Anda' : esc($message['sender_name']) ?></h5>
                        </div>
                        <div class="message-text">
                            <?= esc($message['message']) ?>
                        </div>
                        <div class="time"><?= date('h:i A', strtotime($message['created_at'])) ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center text-grey-500">Belum ada pesan.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Input Chat -->
    <form id="chatForm" class="chat-input-wrapper" onsubmit="sendMessage(event)">
        <textarea name="message" id="chatMessage" class="chat-input" placeholder="Ketik pesan..." rows="1"></textarea>
        <button type="submit" id="send" class="send-btn">
            <i class="feather-send"></i>
        </button>
    </form>
</div>

<?= $this->endSection(); ?>