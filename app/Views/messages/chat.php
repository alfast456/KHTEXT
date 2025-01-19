<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<style>
    /* Wrapper styling */
    .chat-bottom {
        background-color: #f4f4f4;
        /* Warna dasar yang lembut */
        border-top: 1px solid #ddd;
        /* Garis pemisah dengan area chat */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        width: 100%;
    }

    /* Form input styling */
    .chat-input-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        /* Jarak antar elemen */
        width: 100%;
    }

    /* Microphone button */
    .microphone-btn {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 50%;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .microphone-btn:hover {
        background-color: #f0f0f0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Chat input field */
    .chat-input {
        border: 1px solid #ccc;
        border-radius: 20px;
        padding: 10px 15px;
        font-size: 14px;
        width: 80%;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .chat-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Send button */
    .send-btn {
        background-color: #007bff;
        border: none;
        color: white;
        border-radius: 50%;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .send-btn:hover {
        background-color: #0056b3;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="chat-wrapper pt-0 w-100 position-relative scroll-bar bg-white theme-dark-bg">
    <div class="chat-body p-3">
        <div id="chat-box" class="messages-content pb-5">
            <!-- Loop pesan -->
            <?php if (!empty($messages)) : ?>
                <?php foreach ($messages as $message) : ?>
                    <div class="message-item <?= $message['sender_id'] == $loggedInUserId ? 'outgoing-message' : '' ?>">
                        <div class="message-user">
                            <figure class="avatar">
                                <img src="<?= base_url('uploads/avatars/' . ($message['sender_id'] == $loggedInUserId ? 'user-login.png' : 'user-sender.png')) ?>" alt="image">
                            </figure>
                            <div>
                                <h5><?= $message['sender_id'] == $loggedInUserId ? 'Anda' : esc($message['sender_name']) ?></h5>
                                <div class="time"><?= date('h:i A', strtotime($message['created_at'])) ?></div>
                            </div>
                        </div>
                        <div class="message-wrap"><?= esc($message['message']) ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center text-grey-500">Belum ada pesan.</p>
            <?php endif; ?>
            <!-- End loop -->
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="chat-bottom p-3 shadow-sm theme-dark-bg" style="width: 50%;">
    <form id="chatForm" class="chat-input-wrapper" onsubmit="sendMessage(event)">
        <div class="form-group flex-grow-1">
            <input
                type="text"
                id="chatMessage"
                class="form-control chat-input"
                placeholder="Type your message..."
                autocomplete="off">
        </div>
        <button type="submit" id="send" class="send-btn">
            <i class="feather-send text-white"></i>
        </button>
    </form>
</div>






<?= $this->endSection(); ?>