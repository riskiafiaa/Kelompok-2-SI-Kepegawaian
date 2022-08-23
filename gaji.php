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
                    <h1 class="m-0">Dashboard | Data Pegawai</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Gaji Pokok</th>
                                        <th>Tunjangan Jabatan</th>
                                        <th>Tunjangan Harian</th>
                                        <th>Bonus</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($gaji as $key => $g) : ?>
                                        <tr>
                                            <th scope="row"><?= ++$key; ?></th>
                                            <td><?= $g['gaji_pokok']; ?></td>
                                            <td><?= $g['tj_jabatan']; ?></td>
                                            <td><?= $g['tj_harian']; ?></td>
                                            <td><?= $g['bonus']; ?></td>
                                            <td><a data-toggle="modal" data-target="#Modal"><button type="button" class="btn btn-info">Detail</button></a></td>
                                        </tr>
                                    <?php endforeach ?>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Add Data Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="barang-input-proses.php" method="post" enctype="multipart/form-data" class="form-group">
                    No.:
                    <input type="text" name="kodebrg" class="form-control form-control-user" required="">
                    Nama Pegawai:
                    <input type="text" name="merk" class="form-control form-control-user" required="">
                    Jabatan:
                    <input type="text" name="jmlh" class="form-control form-control-user" required="">

                </form>
            </div>
        </div>
    </div>
</div>

<!--End Section Content-->
<?= $this->endsection(); ?>