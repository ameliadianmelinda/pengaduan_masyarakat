<style>
    #pengaduan {
        font-family: 'Times New Roman', Times, serif;
        border-collapse: collapse;
        width: 100%;
    }

    #pengaduan td,
    #pengaduan th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #pengaduan tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #pengaduan tr:hover {
        background-color:aquamarine;
    }

    #pengaduan th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: darkblue;
        color: white;
    }

</style>

<title>LAPOR.ID</title>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <center>
                <h2>LAYANAN PENGADUAN MASYARAKAT TAHUN 2023</h2>
            </center>
            <br>

            <div class="card mb-2">
                <div class="card-body">

                    <table id="pengaduan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Judul</th>
                                <th>Isi Laporan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pengaduan as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td style="width:50px;"><?= $p['nik']; ?></td>
                                    <td style="width:90px;"><?= $p['judul_laporan']; ?></td>
                                    <td style="width:2  00px;"><?= $p['isi_laporan']; ?></td>
                                    <td style="width:100px;"><?= date('d-m-Y', strtotime($p['tanggal_pengaduan'])); ?></td>
                                    <td>
                                        <?php if ($p['status'] == "0") : ?>
                                            Pending
                                        <?php elseif ($p['status'] == "1") : ?>
                                            Proses
                                        <?php elseif ($p['status'] == "2") : ?>
                                            Selesai
                                        <?php elseif ($p['status'] == "3") : ?>
                                            Ditolak
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>