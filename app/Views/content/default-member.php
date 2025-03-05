<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<!-- main content -->
<div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
    <div class="card-body d-flex align-items-center p-0">
        <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">List Contacts</h2>
        <div class="search-form-2 ms-auto">
            <i class="ti-search font-xss"></i>
            <!-- Tambahkan id pada input -->
            <input type="text" id="searchInput" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Search here.">
        </div>
    </div>
</div>

<div class="row ps-2 pe-2" id="contactsContainer">
    <?php foreach ($contactList as $contact) : ?>
        <?php if ($contact['id'] == $loggedInUserId) continue; ?>
        <!-- Tambahkan class "contact-card" pada container masing-masing -->
        <div class="col-md-3 col-sm-4 pe-2 ps-2 contact-card">
            <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">
                    <figure class="avatar ms-auto me-auto mb-0 position-relative w65 z-index-1">
                        <img src="<?= base_url('images/user-7.png') ?>" alt="image" class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">
                    </figure>
                    <div class="clearfix"></div>
                    <h4 class="fw-700 font-xsss mt-3 mb-1"><?= $contact['email'] ?></h4>
                    <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">
                        <?= $contact['username'] ?> | <?= $contact['bagian'] ?>
                    </p>
                    <a href="<?= base_url('messages/' . $contact['id']) ?>" class="mt-0 btn pt-2 pb-2 ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">
                        Chat
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- main content -->

<!-- Script untuk filter secara dinamis -->
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        // Ambil semua elemen dengan class "contact-card"
        var cards = document.querySelectorAll('.contact-card');
        cards.forEach(function(card) {
            // Mengambil seluruh teks di dalam kartu (email, username, dan bagian)
            var cardText = card.textContent.toLowerCase();
            // Jika teks yang dicari ada di dalam kartu, tampilkan; jika tidak, sembunyikan
            if (cardText.indexOf(searchValue) > -1) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>

<?= $this->endSection(); ?> 