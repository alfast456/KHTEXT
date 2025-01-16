<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<!-- main content -->
<div class="chat-wrapper p-3 w-100 position-relative scroll-bar bg-white theme-dark-bg">
    <!-- Form pencarian -->
    <form action="#" class="header-search mb-3 mt-0 d-block search-form" style="width: 100%; max-width: 450px;">
        <div class="form-group mb-0 icon-input">
            <i class="feather-search"></i>
            <input type="text" class="form-control" placeholder="Cari pesan...">
        </div>
    </form>

    <!-- Daftar pesan -->
    <ul class="message-list">
        <li>
            <a href="chat-detail.html" class="rounded-3 bg-lightblue theme-light-bg d-flex align-items-center p-3">
                <img src="images/user-12.png" alt="user" class="w35 me-3 rounded-circle">
                <div>
                    <h6 class="font-xssss text-grey-900 mb-0 fw-700">Hurin Seary</h6>
                    <p class="text-grey-500 font-xssss mb-0">Hai, apakah kamu punya waktu sekarang?...</p>
                </div>
                <span class="ms-auto text-grey-500 font-xssss">12:48PM</span>
            </a>
        </li>
        <li>
            <a href="chat-detail.html" class="rounded-3 bg-transparent d-flex align-items-center p-3">
                <img src="images/user-8.png" alt="user" class="w35 me-3 rounded-circle">
                <div>
                    <h6 class="font-xssss text-grey-900 mb-0 fw-700">Victor Exrixon</h6>
                    <p class="text-grey-500 font-xssss mb-0">Pesan baru dari tim desain...</p>
                </div>
                <span class="ms-auto text-grey-500 font-xssss">12:30PM</span>
            </a>
        </li>
        <li>
            <a href="chat-detail.html" class="rounded-3 bg-transparent d-flex align-items-center p-3">
                <img src="images/user-7.png" alt="user" class="w35 me-3 rounded-circle">
                <div>
                    <h6 class="font-xssss text-grey-900 mb-0 fw-700">Surfiya Zakir</h6>
                    <p class="text-grey-500 font-xssss mb-0">Apakah kamu sudah menyelesaikan laporan...</p>
                </div>
                <span class="ms-auto text-grey-500 font-xssss">11:45AM</span>
            </a>
        </li>
        <!-- Tambahkan pesan lainnya di sini -->
    </ul>
</div>
<script>
    const socket = new WebSocket('ws://127.0.0.1:8081/message');

    socket.onopen = () => {
        console.log('Terhubung ke WebSocket server');
    };

    socket.onmessage = (event) => {
        console.log('Pesan diterima: ', event.data);
    };

    socket.onclose = () => {
        console.log('Koneksi WebSocket ditutup');
    };

    // Kirim pesan
    function sendMessage(msg) {
        socket.send(msg);
    }
</script>

<?= $this->endSection(); ?>