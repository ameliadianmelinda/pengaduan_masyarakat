<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-xxl p-0" style="margin-left: 2em; margin-top:2em; width:95%;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin/updatetanggapan/<?= $pengaduan['id_pengaduan']; ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-1">
                                    <label for="name" class="form-label form-label mb-2">Isi Tanggapan</label>
                                    <input name="tanggapan" placeholder="Tanggapan Anda" type="text" class="form-control mt-2 mb-2">
                                </div>
                                <button type="submit" class="me-1 btn btn-primary mt-4">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?= $this->endSection(); ?>