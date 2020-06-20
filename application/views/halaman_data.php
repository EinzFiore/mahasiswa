<section class="data-page pt-4">
    <div class="container">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat Datang!</strong> You should check in on some of 
                those fields below.
        </div>
        <div class="card">
            <div class="card-body">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-secondary active" href="#">
                        List Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-secondary" href="#" data-toggle="modal"
                            data-target="#tambahData">
                        Tambah Data</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link btn btn-outline-secondary">
                        Hapus Data</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url()?>home"
                        class="nav-link btn btn-outline-secondary">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class="addPage pt-3">
    <div class="container">
        <div class="jumbotron">
            <div class="row">
            <?php
            foreach ($d_mahasiswa as $data_m) { ?>
                <div class="col-sm-3">
                    <div class="card" style="width: 14rem;">
                        <div class="card-body text-center">
                            <img class="img-thumbnail img-fluid" width="50%" 
                    src="<?= base_url('assets')?>/img/enjun.jpg" alt="">
                            <h5 class="card-title"><?= $data_m->nama_lengkap ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                            <?= $data_m->jk ?></h6>
                            <p><?= $data_m->prodi ?></p>
                            <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal"
                            data-target="#detail<?= $data_m->nim ?>">Detail</a>
                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#editData<?= $data_m->nim ?>">Edit</a>
                            <a href="<?= base_url('C_data/delete/') . $data_m->nim; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php
foreach ($d_mahasiswa as $data_m) { ?>
<!-- Modal -->
<div class="modal fade" id="detail<?= $data_m->nim ?>" tabindex="-1" role="dialog"
     aria-labelledby="Detail" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-5">
                <img class="img-thumbnail img-fluid" width="100%" 
                src="<?= base_url('assets')?>/img/enjun.jpg" alt="">
            </div>
            <div class="col-sm-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama  : </strong>
                        <?= $data_m->nama_lengkap; ?></li>
                    <li class="list-group-item"><strong>NIM   : </strong>
                        <?= $data_m->nim; ?></li>
                    <li class="list-group-item"><strong>Email : </strong>
                        <?= $data_m->email; ?></li>
                    <li class="list-group-item"><strong>Kampus: </strong>
                        <?= $data_m->kampus; ?></li>
                </ul>
            </div>
        </div>
        <blockquote class="blockquote text-center">
            <p><strong>Quotes :</strong></p>
            <p class="mb-0"><?= $data_m->quotes ?></p>
            <footer class="blockquote-footer"><?= $data_m->nama_lengkap ?></footer>
        </blockquote>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editData<?= $data_m->nim; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('c_data/update_data/') . $data_m->nim?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" name="nama" value="<?= $data_m->nama_lengkap ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <select class="custom-select my-1 mr-sm-2" name="jk" id="inlineFormCustomSelectPref">
                <option selected><?= $data_m->jk ?></option>
                <option>---------------</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Prodi Jurusan</label>
            <input type="text" name="prodi" value="<?= $data_m->prodi ?>" class="form-control">
        </div>
        <label for="exampleInputEmail1">Upload Foto</label>
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nama Kampus</label>
            <input type="text" value="<?= $data_m->kampus ?>" name="kampus" class="form-control">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Quotes</label>
            <textarea class="form-control" name="quotes" rows="3"><?= $data_m->quotes ?></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END Modal Edit Data -->


<?php } ?>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('c_data')?>/tambah_data" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">NIM</label>
            <input type="text" name="nim" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <select class="custom-select my-1 mr-sm-2" name="jk" id="inlineFormCustomSelectPref">
                <option selected>Choose...</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Prodi Jurusan</label>
            <input type="text" name="prodi" class="form-control">
        </div>
        <label for="exampleInputEmail1">Upload Foto</label>
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nama Kampus</label>
            <input type="text" name="kampus" class="form-control">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Quotes</label>
            <textarea class="form-control" name="quotes" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END Modal Tambah Data -->
