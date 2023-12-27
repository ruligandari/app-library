<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('content'); ?>
<section class="section dashboard">

    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12 col-md-12">
            <!-- Content Table -->
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                    <div class=" d-flex justify-content-between">
                        <h5 class="card-title">Kelola Akun Admin </h5>
                        <?php if (session()->get('role') == '1') : ?>
                            <button type="button" class="btn btn-success mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
                                Tambah Akun
                            </button>
                        <?php endif ?>
                    </div>
                    <table class="table table-sm datatable">
                        <thead>
                            <tr>
                                <th scope="col" data-sortable="false">Nama</th>
                                <th scope="col" data-sortable="false">Hak Akses</th>
                                <th scope="col" data-sortable="false">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataAdmin as $item) : ?>
                                <tr>
                                    <td><?= $item['nama'] ?></td>
                                    <td><?php if ($item['role'] == 1) {
                                            echo 'Super Admin';
                                        } else if ($item['role'] == 2) {
                                            echo 'Admin Slip Gaji';
                                        } else {
                                            echo 'Admin Pustaka';
                                        } ?></td>
                                    <td>

                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-primary" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">Opsi</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal<?= $item['id'] ?>"><i class="bi bi-pencil"></i>Edit</a>
                                                <?php if (session()->get('role') == '1') : ?>
                                                    <a class="dropdown-item text-danger delete-button" data-id="<?= $item['id'] ?>" type="button"><i class="bi bi-trash"></i>Delete</a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- End Top Selling -->
        </div><!-- End Left side columns -->
        <div class="col-lg-12 col-md-12">
            <!-- Content Table KARYAWAN-->
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                    <div class=" d-flex justify-content-between">
                        <h5 class="card-title">Kelola Akun Karyawan</h5>
                        <?php if (session()->get('role') == '1') : ?>
                            <button type="button" class="btn btn-success mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#karyawanModal">
                                Tambah Karyawan
                            </button>
                        <?php endif ?>
                    </div>
                    <table class="table table-sm datatable">
                        <thead>
                            <tr>
                                <th scope="col" data-sortable="false">Nama</th>
                                <th scope="col" data-sortable="false">Jabatan</th>
                                <th scope="col" data-sortable="false">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataKaryawan as $item) : ?>
                                <tr>
                                    <td><?= $item['nama'] ?></td>
                                    <td><?= $item['jabatan'] ?></td>
                                    <td>

                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-primary" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">Opsi</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModalKaryawan<?= $item['id'] ?>"><i class="bi bi-pencil"></i>Edit</a>
                                                <?php if (session()->get('role') == '1') : ?>
                                                    <a class="dropdown-item text-danger delete-button-karyawan" data-id="<?= $item['id'] ?>" type="button"><i class="bi bi-trash"></i>Delete</a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- End Top Selling -->
        </div><!-- End Left side columns -->

    </div>
    <!-- modal tambah akun admin -->
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="<?= base_url("kelola-akun") ?>">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Hak Akses</label>
                            <div class="col-sm-10">
                                <select name="hak_akses" class="form-control">
                                    <option value="2">Admin Slip Gaji</option>
                                    <option value="3">Admin Pustaka</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal tambah akun Karyawan -->
    <div class="modal fade" id="karyawanModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="<?= base_url("kelola-karyawan") ?>">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="jabatan" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <?php foreach ($dataAdmin as $data) : ?>
        <div class="modal fade" id="editModal<?= $data['id'] ?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="<?= base_url("edit-akun") ?>">
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control">
                                    <input type="text" name="id" value="<?= $data['id'] ?>" class="form-control" hidden>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" value="<?= $data['email'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Ganti Password</label>
                                <div class="col-sm-10">
                                    <input type="text" name="old_password" value="<?= $data['password'] ?>" hidden>
                                    <input type="text" name="password" class="form-control" placeholder="Kosongkan Jika Tidak Diubah">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Hak Akses</label>
                                <div class="col-sm-10">
                                    <select name="hak_akses" class="form-control">
                                        <?php if ($data['role'] == 1) : ?>
                                            <option value="1">Super Admin</option>
                                        <?php endif ?>
                                        <option value="2">Admin Slip Gaji</option>
                                        <option value="3">Admin Pustaka</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- edit Modal Karyawan-->
    <?php foreach ($dataKaryawan as $data) : ?>
        <div class="modal fade" id="editModalKaryawan<?= $data['id'] ?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="<?= base_url("edit-karyawan") ?>">
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control">
                                    <input type="text" name="id" value="<?= $data['id'] ?>" class="form-control" hidden>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" value="<?= $data['email'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jabatan" value="<?= $data['jabatan'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Ganti Password</label>
                                <div class="col-sm-10">
                                    <input type="text" name="old_password" value="<?= $data['password'] ?>" hidden>
                                    <input type="text" name="password" class="form-control" placeholder="Kosongkan Jika Tidak Diubah">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</section>
<?= $this->endsection(); ?>

<?= $this->section('script'); ?>
<script>
    const deleteButtons = document.querySelectorAll(".delete-button");
    const deleteButtonKaryawan = document.querySelectorAll(".delete-button-karyawan");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function() {
            const id = this.getAttribute("data-id");

            Swal.fire({
                title: "Apakah Anda yakin akan menghapus Akun ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan hapus menggunakan Ajax
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('delete-akun') ?>", // Ganti dengan URL tindakan penghapusan di Controller Anda
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            console.log(data);
                            if (data.success) {
                                Swal.fire(
                                    "Dihapus!",
                                    data.msg,
                                    "success"
                                ).then(() => {
                                    // Muat ulang halaman setelah penghapusan
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    "Error!",
                                    data.msg,
                                    "error"
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                "Error!",
                                "An error occurred while deleting the item.",
                                "error"
                            );
                        },
                    });
                }
            });
        });
    });
    deleteButtonKaryawan.forEach((button) => {
        button.addEventListener("click", function() {
            const id = this.getAttribute("data-id");

            Swal.fire({
                title: "Apakah Anda yakin akan menghapus Akun ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan hapus menggunakan Ajax
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('delete-karyawan') ?>", // Ganti dengan URL tindakan penghapusan di Controller Anda
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            console.log(data);
                            if (data.success) {
                                Swal.fire(
                                    "Dihapus!",
                                    data.msg,
                                    "success"
                                ).then(() => {
                                    // Muat ulang halaman setelah penghapusan
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    "Error!",
                                    data.msg,
                                    "error"
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                "Error!",
                                "An error occurred while deleting the item.",
                                "error"
                            );
                        },
                    });
                }
            });
        });
    });
</script>
<?= $this->endsection(); ?>