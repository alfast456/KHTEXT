<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="chat-wrapper p-3 w-100 position-relative scroll-bar bg-white theme-dark-bg">
    <!-- Form pencarian -->
    <form action="#" class="header-search mb-3 mt-0 d-block search-form" style="width: 100%; max-width: 450px;">
        <div class="form-group mb-0 icon-input">
            <i class="feather-search"></i>
            <!-- Tambahkan id pada input pencarian -->
            <input type="text" id="chatSearchInput" class="form-control" placeholder="Cari pesan...">
        </div>
    </form>

    <!-- Daftar pesan terakhir -->
    <ul class="message-list" id="messageList">
        <?php if (!empty($messages)) : ?>
            <?php foreach ($messages as $message) : ?>
                <!-- Tambahkan class "message-item" untuk memudahkan filtering -->
                <li class="message-item mb-3">
                    <a href="<?= base_url('messages/' . $message['sender_id']) ?>" class="rounded-3 bg-lightblue theme-light-bg d-flex align-items-center p-3">
                        <img src="<?= base_url('images/user_1.png') ?>" alt="user" class="w35 me-3 rounded-circle">
                        <div>
                            <h6 class="font-xssss text-grey-900 mb-0 fw-700"><?= esc($message['sender_name']) ?></h6>
                            <p class="text-grey-500 font-xssss mb-0"><?= esc(substr($message['message'], 0, 50)) ?>...</p>
                        </div>
                        <span class="ms-auto text-grey-500 font-xssss"><?= date('h:i A', strtotime($message['created_at'])) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php else : ?>
            <li class="message-item">
                <p class="text-center text-grey-500">Belum ada pesan.</p>
            </li>
        <?php endif; ?>
    </ul>
</div>

<!-- Script JavaScript untuk filter pesan secara dinamis -->
<script>
    document.getElementById('chatSearchInput').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        var messages = document.querySelectorAll('.message-item');
        messages.forEach(function(item) {
            // Ambil seluruh teks dalam item pesan (sender name & preview message)
            var text = item.textContent.toLowerCase();
            // Tampilkan pesan jika terdapat kecocokan, sebaliknya sembunyikan
            if (text.indexOf(searchValue) > -1) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>

<?= $this->endSection(); ?>