<!DOCTYPE html>
<html>
<head>

    <title>Form Inspeksi Trafo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .judul-section {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .tabel-tanpa-border th,
        .tabel-tanpa-border td {
            border: none !important;
            padding: 6px 10px;
            vertical-align: middle;
            font-size: 14px;
        }

        .tabel-tanpa-border th {
            font-weight: bold;
            text-align: left;
        }

        .label-sub {
            font-weight: bold;
            margin-top: 12px;
            margin-bottom: 6px;
        }

        .catatan-foto {
            margin-top: 12px;
            font-size: 13px;
        }

        .catatan-foto span {
            background-color: red;
            color: black;
            font-weight: bold;
            padding: 2px 4px;
        }
    </style>

</head>
<body>

<div class="container mt-4">

    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif

    <div class="alert alert-primary">

        <b>Petugas :</b>
        {{ session('nama') }}

        <br>

        <b>NIP :</b>
        {{ session('nip') }}

        <a href="/logout"
           class="btn btn-danger btn-sm float-end">
           Logout
        </a>

    </div>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3>PENGUKURAN BEBAN TRAFO DAN TEGANGAN UJUNG</h3>

        </div>

        <div class="card-body">

            <form action="/simpan-inspeksi" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-4">

                        <label>ULP</label>

                        <input type="text"
                               name="ulp"
                               class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label>ID GARDU</label>

                        <input type="text"
                               name="id_gardu"
                               class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label>MERK</label>

                        <input type="text"
                               name="merk"
                               class="form-control">

                    </div>

                </div>

                <br>

                <div class="row">

                    <div class="col-md-6">

                        <label>ALAMAT</label>

                        <input type="text"
                               name="alamat"
                               class="form-control">

                    </div>

                    <div class="col-md-3">

                        <label>PENYULANG</label>

                        <input type="text"
                               name="penyulang"
                               class="form-control">

                    </div>

                    <div class="col-md-3">

                        <label>DAYA</label>

                        <input type="text"
                               name="daya"
                               class="form-control">

                    </div>

                </div>

                <hr>

                <h4 class="judul-section">DATA BEBAN</h4>

                <div class="mb-2">A</div>

                <div class="table-responsive">
                    <table class="table tabel-tanpa-border">
                        <thead>
                            <tr>
                                <th>PHASA</th>
                                <th>RUTE A</th>
                                <th>RUTE B</th>
                                <th>RUTE C</th>
                                <th>RUTE D</th>
                                <th>INDUK</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>R</td>
                                <td><input type="text" name="arus_r" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_r_rute_b" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_r_rute_c" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_r_rute_d" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_r_induk" class="form-control form-control-sm"></td>
                            </tr>

                            <tr>
                                <td>S</td>
                                <td><input type="text" name="arus_s" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_s_rute_b" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_s_rute_c" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_s_rute_d" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_s_induk" class="form-control form-control-sm"></td>
                            </tr>

                            <tr>
                                <td>T</td>
                                <td><input type="text" name="arus_t" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_t_rute_b" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_t_rute_c" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_t_rute_d" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_t_induk" class="form-control form-control-sm"></td>
                            </tr>

                            <tr>
                                <td>N</td>
                                <td><input type="text" name="arus_n" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_n_rute_b" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_n_rute_c" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_n_rute_d" class="form-control form-control-sm"></td>
                                <td><input type="text" name="arus_n_induk" class="form-control form-control-sm"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <br>

                <h4 class="judul-section">DATA TEGANGAN</h4>

                <div class="label-sub">PHASA-NETRAL:</div>

                <div class="row mb-3">

                    <div class="col-md-2">
                        <label>R-N</label>
                        <input type="text" name="tegangan_vr" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2">
                        <label>S-N</label>
                        <input type="text" name="tegangan_vs" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2">
                        <label>T-N</label>
                        <input type="text" name="tegangan_vt" class="form-control form-control-sm">
                    </div>

                </div>

                <div class="label-sub">PHASA-PHASA:</div>

                <div class="row mb-3">

                    <div class="col-md-2">
                        <label>R-S</label>
                        <input type="text" name="tegangan_r_s" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2">
                        <label>R-T</label>
                        <input type="text" name="tegangan_r_t" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2">
                        <label>S-T</label>
                        <input type="text" name="tegangan_s_t" class="form-control form-control-sm">
                    </div>

                </div>

                <div class="label-sub">TEGANGAN UJUNG:</div>

                <div class="row mb-3">

                    <div class="col-md-2">
                        <input type="text" name="tegangan_ujung" class="form-control form-control-sm">
                    </div>

                </div>

                <br>

                <h4 class="judul-section">FOTO DOKUMENTASI PENGUKURAN</h4>

                <div class="label-sub">BEBAN INDUK</div>

                <div class="row mb-3">

                    <div class="col-md-3">
                        <label>R</label>
                        <input type="file" name="foto_beban_r" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-3">
                        <label>S</label>
                        <input type="file" name="foto_beban_s" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-3">
                        <label>T</label>
                        <input type="file" name="foto_beban_t" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-3">
                        <label>N</label>
                        <input type="file" name="foto_beban_n" class="form-control form-control-sm">
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label>Tegangan Ujung</label>
                        <input type="file" name="foto_tegangan_ujung" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-6">
                        <label>Pelanggan</label>
                        <input type="file" name="foto_pelanggan" class="form-control form-control-sm">
                    </div>

                </div>

                <div class="catatan-foto">
                    <span>Catatan :</span>
                    Untuk Tegangan Ujung di Ukur Beban Rute Yang Tertinggi Setiap Gardu
                </div>

                <br>

                <button class="btn btn-success">

                    Simpan Data

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>