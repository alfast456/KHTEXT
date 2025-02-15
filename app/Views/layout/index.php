<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>KHTEXT</title>

    <!-- Icon & Stylesheets -->
    <link rel="stylesheet" href="<?= base_url("css/themify-icons.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("css/feather.css") ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("images/favicon.png") ?>" />
    <link rel="stylesheet" href="<?= base_url("css/style.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("css/emoji.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("css/lightbox.css") ?>" />

    <style>
        

        /* Contoh tambahan style untuk header agar tampilan rapi */
        .nav-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 1rem;
        }

        .logo a {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        .header-right>* {
            margin-left: 1rem;
        }

        /* Pastikan ikon-ikon pada grup kanan memiliki ukuran dan spasi yang konsisten */
        .nav-icons a,
        .nav-icons button {
            margin-right: 0.5rem;
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
    </style>
</head>

<body class="color-theme-blue mont-font">

    <!-- Preloader -->
    <div class="preloader"></div>

    <div class="main-wrapper">
        <!-- Navigation Top -->
        <header class="nav-header bg-white shadow-xs border-0">
            <!-- Logo di sebelah kiri -->
            <div class="logo">
                <a href="index.html">
                    <i class="feather-zap text-success display1-size me-2"></i>
                    <span class="fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">
                        KH<sup>Text</sup>
                    </span>
                </a>
            </div>
            <!-- Grup kanan: ikon, setting, dan foto profil -->
            <div class="header-right">
                <!-- Ikon-ikon lain (chat, video, search, menu) -->
                <div class="nav-icons d-flex align-items-center">
                    <a href="#" class="mob-menu me-2 chat-active-btn">
                        <i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i>
                    </a>
                    <a href="default-video.html" class="mob-menu me-2">
                        <i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i>
                    </a>
                    <a href="#" class="mob-menu me-2 menu-search-icon">
                        <i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i>
                    </a>
                    <button class="nav-menu me-0 ms-2"></button>
                </div>
                <!-- Tombol Setting (ikon gear) -->
                <div class="dropdown-menu-icon menu-icon position-relative text-center p-2 cursor-pointer">
                    <i class="feather-settings animation-spin d-inline-block font-xl text-current"></i>
                    <div class="dropdown-menu-settings switchcolor-wrap">
                        <h4 class="fw-700 font-sm mb-4">Settings</h4>
                        <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
                        <ul>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="red" checked />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-red" style="background-color: #ff3b30;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="green" />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-green" style="background-color: #4cd964;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="blue" checked />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-blue" style="background-color: #132977;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="pink" />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-pink" style="background-color: #ff2d55;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="yellow" />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-yellow" style="background-color: #ffcc00;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="orange" />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-orange" style="background-color: #ff9500;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="gray" />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-gray" style="background-color: #8e8e93;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="brown" />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-brown" style="background-color: #D2691E;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="darkgreen" />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-darkgreen" style="background-color: #228B22;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="deeppink" />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-deeppink" style="background-color: #FFC0CB;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="cadetblue" />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-cadetblue" style="background-color: #5f9ea0;"></span>
                                </label>
                            </li>
                            <li>
                                <label class="item-radio item-content">
                                    <input type="radio" name="color-radio" value="darkorchid" />
                                    <i class="ti-check"></i>
                                    <span class="circle-color bg-darkorchid" style="background-color: #9932cc;"></span>
                                </label>
                            </li>
                        </ul>
                        <!-- Additional Settings -->
                        <div class="card bg-transparent-card border-0 d-block mt-3">
                            <h4 class="d-inline font-xssss mont-font fw-700">Header Background</h4>
                            <div class="d-inline float-right mt-1">
                                <label class="toggle toggle-menu-color">
                                    <input type="checkbox" />
                                    <span class="toggle-icon"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card bg-transparent-card border-0 d-block mt-3">
                            <h4 class="d-inline font-xssss mont-font fw-700">Menu Position</h4>
                            <div class="d-inline float-right mt-1">
                                <label class="toggle toggle-menu">
                                    <input type="checkbox" />
                                    <span class="toggle-icon"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card bg-transparent-card border-0 d-block mt-3">
                            <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                            <div class="d-inline float-right mt-1">
                                <label class="toggle toggle-dark">
                                    <input type="checkbox" />
                                    <span class="toggle-icon"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Foto Profil -->
                <div class="nav-user">
                    <!-- modal logout -->
                    <a href="" class="menu-icon p-0" data-bs-toggle="modal" data-bs-target="#logout">
                        <img src="<?= base_url('images/user_1.png') ?>" alt="user" class="w40 mt--1" />
                    </a>
                </div>
            </div>
        </header>

        <!-- Navigation Sidebar & Main Content (tidak diubah) -->
        <!-- Navigation Sidebar -->
        <nav class="navigation scroll-bar">
            <div class="container ps-0 pe-0">
                <div class="nav-content">
                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                        <div class="nav-caption fw-600 font-xssss text-grey-500"><span>MAIN </span>MENU</div>
                        <ul class="mb-3">
                            <li>
                                <a href="<?= base_url('message') ?>" class="nav-content-bttn open-font">
                                    <i class="font-xl text-current feather-message-square me-3"></i>
                                    <span>Messages</span>
                                    <div class="notification">
                                        <span id="notificationCount" class="circle-count bg-primary mt-1" style="display: none;">0</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('contact') ?>" class="nav-content-bttn open-font">
                                    <i class="font-xl text-current feather-users me-3"></i>
                                    <span>Contacts</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="main-content">
            <!-- Konten utama -->
            <?= $this->renderSection('content') ?>
        </main>
        <!-- End Main Content -->

    </div>
    <!-- End Main Wrapper -->

    <!-- Modal Logout -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <figure class="avatar avatar-100 mb-4">
                        <img src="<?= base_url('images/user_1.png') ?>" alt="">
                    </figure>
                    <h5 class="mb-4">Apakah Anda yakin ingin keluar?</h5>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary me-2" data-bs-dismiss="modal">Batal</button>
                        <a href="<?= base_url('logout') ?>" class="btn btn-danger">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WebSocket & Chat Scripts -->
    <script>
        // Skrip WebSocket & chat
        const conn = new WebSocket('ws://127.0.0.1:8080');
        const urlPath = window.location.pathname;
        const receiverId = urlPath.split('/').pop();
        const chatBox = document.getElementById('chat-box');

        conn.onopen = () => {
            console.log('Connection established!');
        };

        conn.onmessage = (e) => {
            const data = JSON.parse(e.data);

            // Tangani notifikasi jika perlu
            if (data.type === 'notification' && data.receiver_id == <?= $loggedInUserId ?>) {
                const notificationElement = document.getElementById('notificationCount');
                const unreadCount = data.unread_count;
                if (unreadCount > 0) {
                    notificationElement.textContent = unreadCount;
                    notificationElement.style.display = 'inline-block';
                } else {
                    notificationElement.style.display = 'none';
                }
                return;
            }

            // Tampilkan pesan dari pengguna lain
            if (data.type !== 'notification' && data.sender_id !== <?= $loggedInUserId ?>) {
                let fileContent = '';
                // Jika pesan memiliki file, cek tipe file untuk menentukan tampilannya
                if (data.file_url && data.file_type) {
                    if (data.file_type.startsWith('image/')) {
                        fileContent = `<div class="message-file">
                                   <img src="${data.file_url}" alt="${data.file_name}" style="max-width:200px;">
                               </div>`;
                    } else {
                        fileContent = `<div class="message-file">
                                   <a href="${data.file_url}" target="_blank">${data.file_name}</a>
                               </div>`;
                    }
                }

                const newMessage = `
          <div class="message-item">
            <div class="message-user">
                <h5>${data.sender_name}</h5>
            </div>
            <div class="message-text">${data.message}</div>
            ${fileContent}
            <div class="time">${new Date().toLocaleTimeString()}</div>
          </div>
        `;
                chatBox.innerHTML += newMessage;
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        };

        document.getElementById('chatForm').addEventListener('submit', (event) => {
            event.preventDefault();

            const input = document.getElementById('chatMessage');
            // const fileInput = document.getElementById('fileInput');
            const message = input.value.trim();
            const senderId = <?= $loggedInUserId ?>;

            if (!receiverId) {
                alert('Receiver ID tidak ditemukan di URL!');
                return;
            }

            // Jika ada file yang dipilih, proses file tersebut
            // if (fileInput.files.length > 0) {
            //     const file = fileInput.files[0];
            //     const reader = new FileReader();
            //     reader.onload = function(e) {
            //         const fileData = e.target.result; // Data URL (Base64 encoded)
            //         const payload = {
            //             sender_id: senderId,
            //             receiver_id: receiverId,
            //             message: message, // Bisa dikosongkan jika hanya mengirim file
            //             file: {
            //                 name: file.name,
            //                 type: file.type,
            //                 data: fileData
            //             }
            //         };
            //         console.log('Sending file data:', payload);
            //         conn.send(JSON.stringify(payload));

            //         // Tampilkan pesan atau preview di chat box jika perlu
            //         const chatBox = document.getElementById('chat-box');
            //         const newMessage = `
            // <div class="message-item outgoing-message">
            //     <div class="message-user">
            //         <h5>Anda</h5>
            //         </div>
            //         <div class="message-text">${message}</div>
            //         <div class="message-file">
            //             <a href="${fileData}" target="_blank">${file.name}</a>
            //         </div>
            //         <div class="time">${new Date().toLocaleTimeString()}</div>
            // </div>
            // `;

            //         chatBox.innerHTML += newMessage;
            //         chatBox.scrollTop = chatBox.scrollHeight;
            //         // Reset input file
            //         fileInput.value = '';
            //     };
            //     reader.readAsDataURL(file);
            // } else 
            if (message !== '') {
                const payload = {
                    sender_id: senderId,
                    receiver_id: receiverId,
                    message: message,
                };

                console.log('Sending data:', payload);
                conn.send(JSON.stringify(payload));

                const chatBox = document.getElementById('chat-box');
                const newMessage = `
          <div class="message-item outgoing-message">
            <div class="message-user">
                <h5>Anda</h5>
                </div>
                <div class="message-text">${message}</div>
                <div class="time">${new Date().toLocaleTimeString()}</div>
          </div>
        `;
                chatBox.innerHTML += newMessage;
                chatBox.scrollTop = chatBox.scrollHeight;
                input.value = '';
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const receiverId = <?= $loggedInUserId ?>;
            const notificationElement = document.getElementById('notificationCount');

            fetch(`<?= base_url('notifications/unread') ?>?receiver_id=${receiverId}`)
                .then((response) => response.json())
                .then((data) => {
                    const unreadCount = data.unread_count;
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

    <script>
        // js logout
        const logout = document.getElementById('logout');
        logout.addEventListener('click', function() {
            localStorage.clear();
        });
    </script>

    <!-- Plugin & Custom Scripts -->
    <script src="<?= base_url("js/plugin.js") ?>"></script>
    <script src="<?= base_url("js/lightbox.js") ?>"></script>
    <script src="<?= base_url("js/scripts.js") ?>"></script>
</body>

</html>