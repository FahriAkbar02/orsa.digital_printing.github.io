<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5"> <!-- Contoh sederhana dari form edit (app/Views/admin/edit.php) -->
                                <div class="text-center">
                                    <h3 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit User Role</h3>

                                </div>
                                <!-- Tampilkan pesan error atau konfirmasi jika ada -->
                                <?php if (session()->has('errors')) : ?>
                                    <ul>
                                        <?php foreach (session('errors') as $error) : ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                <?php endif ?>

                                <form action="<?= site_url('admin/editUserAndGroup/' . $user->id); ?>" method="post">
                                    <?= csrf_field() ?>

                                    <div class="from-group">
                                        <label for="username">Username:</label>
                                        <input class="form-control" type="text" id="username" name="user[username]" value="<?= $user->username ?>">
                                    </div>

                                    <div class="from-group">
                                        <label for="email">Email:</label>
                                        <input class="form-control" type="email" id="email" name="user[email]" value="<?= $user->email ?>">
                                    </div>

                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->

                                    <div class="from-group">
                                        <label for="group">Group / Role:</label>
                                        <select class="form-control" name="group_id" id="group">
                                            <?php foreach ($groups as $group) : ?>
                                                <option value="<?= $group->id ?>" <?= (isset($user->group_id) && $group->id == $user->group_id) ? 'selected' : '' ?>>
                                                    <?= $group->name ?>
                                                </option>

                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                    <div class="from-group">
                                        <label for="group">Group Name:</label>
                                        <select class="form-control" name="group_description" id="group">
                                            <?php foreach ($groups as $group) : ?>
                                                <option value="<?= $group->id ?>" <?= (isset($user->description) && $group->id == $user->description) ? 'selected' : '' ?>>
                                                    <?= $group->description ?>
                                                </option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <br>
                                    <button class="btn btn-primary" type="button" onclick="confirmSimpan()">Simpan</button>
                                    <a class="btn btn-outline-secondary" type="button" href="<?= base_url('admin') ?>">Kembali</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmSimpan() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Simpan Perubahan?",
            text: "Pilih 'Ya' dibawah, Jika Anda Setuju!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, simpan!",
            cancelButtonText: "Tidak, batal!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form secara programmatic
                document.querySelector('form').submit();
            }
        });
    }
</script>

<?= $this->endSection('page-content'); ?>