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
                                <h5 class="card-title">Data Pustaka</h5>
                                <?php if (session()->get('role') == '1') : ?>
                                    <button type="button" class="btn btn-success mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
                                        Upload File
                                    </button>
                                <?php endif ?>
                            </div>
                            <table class="table table-sm datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" data-sortable="false">Tanggal</th>
                                        <th scope="col" data-sortable="false">Nama File</th>
                                        <th scope="col" data-sortable="false">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datafile as $item) : ?>
                                        <tr>
                                            <td><?= $item['tanggal'] ?></td>
                                            <td><?= $item['nama_file'] ?></td>
                                            <td>

                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-primary" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">Opsi</a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="<?= base_url('file/' . $item['nama_file']) ?>" download><i class="bi bi-download"></i>Download</a>
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
                </div><!-- End Top Selling -->

            </div>
        </div><!-- End Left side columns -->

    </div>

    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Data Pustaka</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="<?= base_url("upload-pustaka") ?>">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="file" type="file" id="formFile">
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
                        url: "<?= base_url('delete-pustaka') ?>", // Ganti dengan URL tindakan penghapusan di Controller Anda
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