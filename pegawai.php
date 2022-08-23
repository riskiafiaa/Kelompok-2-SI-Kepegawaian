<!-- Header Footer-->
<?= $this->extend('layout/template'); ?>

<!--Section Content-->
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-15">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Fixed Header Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>NIP</th>
                                        <th>TTL</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Jabatan</th>
                                        <th>Jumlah Kehadiran</th>
                                        <th>Total Lembur</th>
                                        <th>Nominal Gaji</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($datapegawai as $key => $dp) : ?>
                                        <tr>
                                            <th scope="row"><?= ++$key; ?></th>
                                            <td><?= $dp['nama_pegawai']; ?></td>
                                            <td><?= $dp['nip']; ?></td>
                                            <td><?= $dp['ttl']; ?></td>
                                            <td><?= $dp['jenis_kelamin']; ?></td>
                                            <td><?= $dp['alamat']; ?></td>
                                            <td><?= $dp['jabatan']; ?></td>
                                            <td><?= $dp['jumlah_kehadiran']; ?></td>
                                            <td><?= $dp['total_lembur']; ?></td>
                                            <td><?= $dp['nominal_gaji']; ?></td>
                                            <td>
                                                <a href=""><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default" onclick="edit(<?= $dp['id'] ?>)">Edit</button></a>
                                                <a href=""><button type="button" class="btn btn-danger" onclick="hapus(<?= $dp['id'] ?>)">Delete</button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <th scope="row"><?= ++$key ?></th>
                                        <td><?= $dp['nama_pegawai']; ?></td>
                                        <td><?= $dp['nip']; ?></td>
                                        <td><?= $dp['ttl']; ?></td>
                                        <td><?= $dp['jenis_kelamin']; ?></td>
                                        <td><?= $dp['alamat']; ?></td>
                                        <td><?= $dp['jabatan']; ?></td>
                                        <td><?= $dp['jumlah_kehadiran']; ?></td>
                                        <td><?= $dp['total_lembur']; ?></td>
                                        <td><?= $dp['nominal_gaji']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default" onclick="edit(<?= $dp['id'] ?>)">Edit</button>
                                            <button type="button" class="btn btn-danger" onclick="hapus(<?= $dp['id'] ?>)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                            $linkPagination = $pager->links();
                            $linkPagination = str_replace('<li class="active">', '<li class="page-item active">', $linkPagination);
                            $linkPagination = str_replace('<li>', '<li class="page-item">', $linkPagination);
                            $linkPagination = str_replace("<a", "<a class='page-link'", $linkPagination);
                            echo $linkPagination;
                            ?>
                        </div>
                        <!-- /content-panel -->
                        <!-- Button trigger modal -->
                        <div class="container">
                            <div class="card-body">
                                <button type="button" class="btn btn-success btn-sm m-3" data-toggle="modal" data-target="#modal-default">
                                    + Tambah Pegawai
                                </button>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>

                                <?php endif; ?>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Pegawai</h4>

                <button type="button" class="close tombol-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger error" role="alert" style="display:none;">

                </div>
                <div class="alert alert-primary sukses" role="alert" style="display:none;">

                </div>
                <form>
                    <div class="card-body">
                        <input type="hidden" id="id">
                        <div class="form-group">
                            <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
                        </div>
                        <div class="form-group">
                            <label for="ttl" class="col-sm-2 col-form-label">TTL</label>
                            <input type="text" class="form-control" id="ttl" name="ttl">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">jenis_kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">

                                <option value="selected">Pilih</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="al" class="col-sm-2 col-form-label">Alamat</label>
                            <input type="text" class="form-control" id="al" name="al">
                        </div>
                        <div class="form-group">
                            <label for="jab" class="col-sm-2 col-form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jab" name="jab">
                        </div>
                        <div class="form-group">
                            <label for="hadir" class="col-sm-2 col-form-label">Total Kehadiran</label>
                            <input type="number" class="form-control" id="hadir" name="hadir" min="1">
                        </div>
                        <div class="form-group">
                            <label for="lembur" class="col-sm-2 col-form-label">Total Lembur</label>
                            <input type="number" class="form-control" id="lembur" name="lembur" min="1">
                        </div>
                        <div class="form-group">
                            <label for="gaji" class="col-sm-2 col-form-label">Nominal Gaji</label>
                            <input type="text" class="form-control" id="gaji" name="gaji">
                        </div>



                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <!-- <button type="submit" class="btn btn-primary" id="tombolSimpan">Simpan</button> -->
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default tombol-tutup" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="tombolSimpan">Simpan</button>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function hapus($id) {
        var result = confirm('Yakin Mau Melakukan Proses delete?');
        if (result) {
            window.location = "<?= site_url("Pegawai/hapus") ?>/" + $id;
        }
    }

    function edit($id) {
        $.ajax({

            url: "<?= base_url('Pegawai/edit'); ?>/" + $id,
            type: "GET",
            success: function(hasil) {
                var $obj = $.parseJSON(hasil);
                if ($obj.id != '') {
                    $('#id').val($obj.id);
                    $('#nip').val($obj.nip);
                    $('#nama_pegawai').val($obj.nama_pegawai);
                    $('#jenis_kelamin').val($obj.jenis_kelamin);
                    $('#alamat').val($obj.alamat);
                    $('#jabatan').val($obj.jabatan);
                    $('#total_lembur').val($obj.total_lembur);
                    $('#nominal_gaji').val($obj.nominal_gaji);

                }
            }
        });


    }

    function bersihkan() {
        $('#id').val('');
        $('#nip').val('');
        $('#nama_pegawai').val('');
        $('#jenis_kelamin').val('');
        $('#alamat').val('');
        $('#jabatan').val('');
        $('#total_lembur').val('');
        $('#nominal_gaji').val('');
    }
    $('.tombol-tutup').on('click', function() {
        if ($('.sukses').is(":visible")) {
            window.location.href = "<?= current_url() . "?" . $_SERVER['QUERY_STRING']; ?>";
        }
        $('.alert').hide();
        bersihkan();
    });
    $('#tombolSimpan').on('click', function() {

        var $id = $('#id').val();
        var $nip = $('#nip').val();
        var $nama_pegawai = $('#nama_pegawai').val();
        var $jenis_kelamin = $('#jenis_kelamin').val();
        var $jabatan = $('#jabatan').val();
        var $total_lembur = $('#total_lembur').val();
        var $nominal_gaji = $('#nominal_gaji').val();
        $.ajax({
            url: "<?= base_url('Pegawai/simpan'); ?>",
            type: "POST",
            data: {
                id: $id,
                nama_pegawai: $nama_pegawai,
                nip: $nip,
                ttl: $ttl,
                jenis_kelamin: $jenis_kelamin,
                alamat: $alamat,
                jabatan: $jabatan,
                jumlah_kehadiran: $jumlah_kehadiran,
                total_lembur: $total_lembur,
                nominal_gaji: $nominal_gaji

            },
            success: function(hasil) {
                var $obj = $.parseJSON(hasil);
                if ($obj.sukses == false) {
                    $('.sukses').hide();
                    $('.error').show();
                    $('.error').html($obj.error);
                } else {
                    $('.error').hide();
                    $('.sukses').show();
                    $('.sukses').html($obj.sukses);
                }
            }
        });
        bersihkan();
    });
</script>

<!--End Section Content-->
<?= $this->endsection(); ?>