<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>


<div class="chat-wrapper pt-0 w-100 position-relative scroll-bar bg-white theme-dark-bg">
    <div class="chat-body p-3">
        <div class="messages-content pb-5">
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
<div class="chat-bottom dark-bg p-3 shadow-none theme-dark-bg" style="width: 98%;">
    <form id="chatForm" class="d-flex align-items-center" onsubmit="sendMessage(event)">
        <button type="button" class="bg-grey float-left"><i class="ti-microphone text-grey-600"></i></button>
        <div class="form-group">
            <input type="text" id="chatMessage" class="form-control" placeholder="Start typing..." autocomplete="off">
        </div>
        <button type="submit" class="bg-current"><i class="ti-arrow-right text-white"></i></button>
    </form>
</div>


<script>
    const socket = new WebSocket('ws://127.0.0.1:8081/message');

    socket.onopen = () => {
        console.log('Terhubung ke WebSocket server');
    };

    socket.onmessage = (event) => {
        const data = JSON.parse(event.data);

        // Periksa apakah pesan berasal dari user lain
        if (data.sender_id !== <?= $loggedInUserId ?>) {
            const messagesContent = document.querySelector('.messages-content');
            const newMessage = `
            <div class="message-item">
                <div class="message-user">
                    <figure class="avatar">
                        <img src="<?= base_url('images/user_1.png') ?>" alt="image">
                    </figure>
                    <div>
                        <h5>${data.sender_name}</h5>
                        <div class="time">${new Date().toLocaleTimeString()}</div>
                    </div>
                </div>
                <div class="message-wrap">${data.message}</div>
            </div>
        `;
            messagesContent.innerHTML += newMessage;

            // Scroll ke bawah otomatis
            messagesContent.scrollTop = messagesContent.scrollHeight;
        }
    };


    socket.onclose = () => {
        console.log('Koneksi WebSocket ditutup');
    };

    // Fungsi untuk mengirim pesan
    function sendMessage(event) {
        event.preventDefault(); // Mencegah form refresh

        const input = document.getElementById('chatMessage');
        const message = input.value.trim();
        const senderId = 1; // ID pengirim
        const receiverId = 2; // ID penerima

        if (message !== '') {
            const payload = {
                sender_id: senderId, // ID user yang login
                receiver_id: receiverId, // ID penerima pesan
                message: message,
            };

            console.log('Mengirim data:', payload); // Debug data yang dikirim
            socket.send(JSON.stringify(payload));

            // Kosongkan input setelah mengirim
            input.value = '';
        }
    }
</script>

<?= $this->endSection(); ?>