<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('content'); ?>
<section class="section dashboard">

    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Content Table -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <div class=" d-flex justify-content-between">
                                <h5 class="card-title">Data Slip Gaji</h5>
                                <?php if (session()->get('role') == '1' || session()->get('role') == '2') : ?>
                                    <button type="button" class="btn btn-success mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
                                        Upload File
                                    </button>
                                <?php endif ?>
                            </div>
                            <table class="table table-sm datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" data-sortable="false">Tanggal</th>
                                        <th scope="col" data-sortable="false">Nama Karyawan</th>
                                        <th scope="col" data-sortable="false">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($datafile as $data) :
                                    ?>
                                        <tr>
                                            <td><?= $data['tanggal'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td>
                                                <div class="d-flex justify-content-left">
                                                    <a class="btn btn-primary" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">Opsi</i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#imageModal<?= $data['tanggal'] ?>"><i class="bi bi-eye"></i>Lihat Slip Gaji</a>
                                                        <a class="dropdown-item" href="<?= base_url('file/' . $data['nama_file']) ?>" download><i class="bi bi-download"></i>Download</a>
                                                        <?php if (session()->get('role') == '1' || session()->get('role') == '2') : ?>
                                                            <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id'] ?>"><i class="bi bi-pencil"></i>Edit</a>
                                                            <a class="dropdown-item text-danger delete-button" data-id="<?= $data['id'] ?>" type="button"><i class="bi bi-trash"></i>Delete</a>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach
                                    ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Top Selling -->

            </div>
        </div><!-- End Left side columns -->

    </div>
    <!-- tambahModal -->
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Data Slip Gaji</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="<?= base_url("upload") ?>">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="karyawan" class="col-sm-2 col-form-label">Karyawan</label>
                            <div class="col-sm-10">
                                <select name="id_karyawan" id="karyawan" class="form-control">
                                    <?php foreach ($user as $item) : ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['nama'] ?> - <?= $item['jabatan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="file" type="file" id="formFile" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <?php foreach ($datafile as $i) : ?>
        <div class="modal fade" id="editModal<?= $i['id'] ?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Slip Gaji</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="<?= base_url("edit-gaji") ?>">
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" value="<?= $i['tanggal'] ?>" class="form-control" required>
                                    <input type="hidden" name="id" value="<?= $i['id'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="karyawan" class="col-sm-2 col-form-label">Karyawan</label>
                                <div class="col-sm-10">
                                    <select name="id_karyawan" id="karyawan" class="form-control">
                                        <?php foreach ($user as $item) : ?>
                                            <option value="<?= $item['id'] ?>" <?= ($i['user_id'] == $item['id']) ? 'selected' : '' ?>><?= $item['nama'] ?> - <?= $item['jabatan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="file" type="file" id="formFile">
                                    <input type="hidden" class="form-control" value="<?= $i['nama_file'] ?>" name="old_file">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-form-label">File Upload Sebelumnya</label>
                                <img class="img-fluid" src="<?= base_url('file/' . $i['nama_file']) ?>" alt="">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <?php foreach ($datafile as $item) : ?>
        <div class="modal fade" id="imageModal<?= $item['tanggal'] ?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Slip Gaji</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="img-fluid" src="<?= base_url('file/' . $item['nama_file']) ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</section>
<?= $this->endsection(); ?>

<?= $this->section('script'); ?>
<script>
    const deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function() {
            const id = this.getAttribute("data-id");

            Swal.fire({
                title: "Apakah Anda yakin akan menghapus produk ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Gak Jadi Ah!",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan hapus menggunakan Ajax
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('delete') ?>", // Ganti dengan URL tindakan penghapusan di Controller Anda
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            console.log(response);
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