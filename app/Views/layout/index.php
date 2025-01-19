<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KHTEXT</title>

    <link rel="stylesheet" href="<?= base_url("css/themify-icons.css") ?>">
    <link rel="stylesheet" href="<?= base_url("css/feather.css") ?>">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("images/favicon.png") ?>">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?= base_url("css/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("css/emoji.css") ?>">

    <link rel="stylesheet" href="<?= base_url("css/lightbox.css") ?>">

</head>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>


    <div class="main-wrapper">

        <!-- navigation top-->
        <div class="nav-header bg-white shadow-xs border-0">
            <div class="nav-top">
                <a href="index.html"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">KH<sup>Text</sup> </span> </a>
                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="default-video.html" class="mob-menu me-2"><i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <button class="nav-menu me-0 ms-2"></button>
            </div>

            <a href="#" class="p-2 text-center ms-auto menu-icon" id="dropdownMenu3" data-bs-toggle="dropdown" aria-expanded="false"><span class="dot-count bg-warning"></span><i class="feather-bell font-xl text-current"></i></a>
            <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">

                <h4 class="fw-700 font-xss mb-4">Notification</h4>
                <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
                    <img src="images/user-8.png" alt="user" class="w40 position-absolute left-0">
                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Hendrix Stamp <span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 3 min</span></h5>
                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">There are many variations of pass..</h6>
                </div>
                <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
                    <img src="images/user-4.png" alt="user" class="w40 position-absolute left-0">
                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Goria Coast <span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 2 min</span></h5>
                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>
                </div>

                <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
                    <img src="images/user-7.png" alt="user" class="w40 position-absolute left-0">
                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Surfiya Zakir <span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 1 min</span></h5>
                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>
                </div>
                <div class="card bg-transparent-card w-100 border-0 ps-5">
                    <img src="images/user-6.png" alt="user" class="w40 position-absolute left-0">
                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Victor Exrixon <span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 30 sec</span></h5>
                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>
                </div>
            </div>
            <div class="p-2 text-center ms-3 position-relative dropdown-menu-icon menu-icon cursor-pointer">
                <i class="feather-settings animation-spin d-inline-block font-xl text-current"></i>
                <div class="dropdown-menu-settings switchcolor-wrap">
                    <h4 class="fw-700 font-sm mb-4">Settings</h4>
                    <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
                    <ul>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="red" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-red" style="background-color: #ff3b30;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="green"><i class="ti-check"></i>
                                <span class="circle-color bg-green" style="background-color: #4cd964;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="blue" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-blue" style="background-color: #132977;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="pink"><i class="ti-check"></i>
                                <span class="circle-color bg-pink" style="background-color: #ff2d55;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="yellow"><i class="ti-check"></i>
                                <span class="circle-color bg-yellow" style="background-color: #ffcc00;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="orange"><i class="ti-check"></i>
                                <span class="circle-color bg-orange" style="background-color: #ff9500;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="gray"><i class="ti-check"></i>
                                <span class="circle-color bg-gray" style="background-color: #8e8e93;"></span>
                            </label>
                        </li>

                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="brown"><i class="ti-check"></i>
                                <span class="circle-color bg-brown" style="background-color: #D2691E;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkgreen"><i class="ti-check"></i>
                                <span class="circle-color bg-darkgreen" style="background-color: #228B22;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="deeppink"><i class="ti-check"></i>
                                <span class="circle-color bg-deeppink" style="background-color: #FFC0CB;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="cadetblue"><i class="ti-check"></i>
                                <span class="circle-color bg-cadetblue" style="background-color: #5f9ea0;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkorchid"><i class="ti-check"></i>
                                <span class="circle-color bg-darkorchid" style="background-color: #9932cc;"></span>
                            </label>
                        </li>
                    </ul>

                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Header Background</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-menu-color"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Menu Position</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-menu"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-dark"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>

                </div>
            </div>

            <!-- <div class="notification">
                <i class="ti-bell"></i>
                <span id="notificationCount" class="badge bg-danger" style="display: none;">0</span>
            </div> -->



            <a href="default-settings.html" class="p-0 ms-3 menu-icon"><img src="<?= base_url('images/user_1.png') ?>" alt="user" class="w40 mt--1"></a>

        </div>
        <!-- navigation top -->

        <!-- navigation left -->
        <nav class="navigation scroll-bar">
            <div class="container ps-0 pe-0">
                <div class="nav-content">


                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                        <div class="nav-caption fw-600 font-xssss text-grey-500"><span>MAIN </span>MENU</div>
                        <ul class="mb-3">
                            <li><a href="<?= base_url('email') ?>" class="nav-content-bttn open-font"><i class="font-xl text-current feather-inbox me-3"></i><span>Email Box</span><span class="circle-count bg-warning mt-1">584</span></a></li>
                            <li><a href="<?= base_url('message') ?>" class="nav-content-bttn open-font"><i class="font-xl text-current feather-message-square me-3"></i><span>Messages</span>
                                        <div class="notification">
                                            <span id="notificationCount" class="circle-count bg-primary mt-1" style="display: none;">0</span>
                                        </div></a></li>
                            <li><a href="<?= base_url('contact') ?>" class="nav-content-bttn open-font"><i class="font-xl text-current feather-users me-3"></i><span>Contacts</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navigation left -->
        <!-- main content -->
        <div class="main-content">

            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0 ps-lg-3 ms-0 me-0" style="max-width: 100%;">

                    <div class="row">
                        <div class="col-lg-12">

                            <!-- main section content -->
                            <?= $this->renderSection('content') ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- main content -->

    </div>

    <script>
        const conn = new WebSocket('ws://127.0.0.1:8080');

        // Ambil receiver_id dari URL
        const urlPath = window.location.pathname; // Mendapatkan path URL
        const receiverId = urlPath.split('/').pop(); // Ambil bagian terakhir dari path sebagai receiver_id

        conn.onopen = () => {
            console.log('Connection established!');
        };

        conn.onmessage = (e) => {
            const data = JSON.parse(e.data);

            // Periksa jika pesan adalah tipe 'notification'
            if (data.type === 'notification' && data.receiver_id == <?= $loggedInUserId ?>) {
                const notificationElement = document.getElementById('notificationCount');
                const unreadCount = data.unread_count;

                // Update jumlah notifikasi
                if (unreadCount > 0) {
                    notificationElement.textContent = unreadCount;
                    notificationElement.style.display = 'inline-block';
                } else {
                    notificationElement.style.display = 'none';
                }
            }

            // Jika pesan biasa (chat message), tambahkan ke chat box
            if (data.type !== 'notification' && data.sender_id !== <?= $loggedInUserId ?>) {
                const chatBox = document.getElementById('chat-box');
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

                chatBox.innerHTML += newMessage;
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        };

        document.getElementById('chatForm').addEventListener('submit', (event) => {
            event.preventDefault(); // Mencegah form refresh

            const input = document.getElementById('chatMessage');
            const message = input.value.trim();
            const senderId = <?= $loggedInUserId ?>; // ID pengirim

            if (!receiverId) {
                alert('Receiver ID tidak ditemukan di URL!');
                return;
            }

            if (message !== '') {
                const payload = {
                    sender_id: senderId,
                    receiver_id: receiverId, // Ambil receiver_id dari URL
                    message: message,
                };

                console.log('Sending data:', payload); // Debug data yang dikirim
                conn.send(JSON.stringify(payload));

                // Tampilkan pesan di chat-box secara langsung
                const chatBox = document.getElementById('chat-box');
                const newMessage = `
        <div class="message-item outgoing-message">
            <div class="message-user">
                <figure class="avatar">
                    <img src="<?= base_url('images/user_login.png') ?>" alt="image">
                </figure>
                <div>
                    <h5>Anda</h5>
                    <div class="time">${new Date().toLocaleTimeString()}</div>
                </div>
            </div>
            <div class="message-wrap">${message}</div>
        </div>
        `;

                // Tambahkan pesan ke chat box
                chatBox.innerHTML += newMessage;

                // Scroll otomatis ke bawah
                chatBox.scrollTop = chatBox.scrollHeight;

                // Kosongkan input setelah mengirim
                input.value = '';
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const receiverId = <?= $loggedInUserId ?>; // ID pengguna yang login
            const notificationElement = document.getElementById('notificationCount');

            // AJAX request untuk mendapatkan jumlah notifikasi
            fetch(`<?= base_url('notifications/unread') ?>?receiver_id=${receiverId}`)
                .then((response) => response.json())
                .then((data) => {
                    const unreadCount = data.unread_count;

                    // Tampilkan jumlah notifikasi jika ada
                    if (unreadCount > 0) {
                        notificationElement.textContent = unreadCount;
                        notificationElement.style.display = 'inline-block';
                    } else {
                        notificationElement.style.display = 'none';
                    }
                })
                .catch((error) => console.error('Error fetching unread notifications:', error));
        });
    </script>
    <script src="<?= base_url("js/plugin.js") ?>"></script>

    <script src="<?= base_url("js/lightbox.js") ?>"></script>
    <script src="<?= base_url("js/scripts.js") ?>"></script>
</body>

</html>