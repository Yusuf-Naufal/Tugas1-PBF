<?= $this->extend ('admin/layout/template')?>

<?= $this->Section ('content')?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?= $title; ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Static Navigation</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Kategori Produk
                            </div>
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambahmodal">
                                <i class="fas fa-plus"></i> Tambah Kategori
                                </button>
                                
                                <!-- alert jika data berhasil bertambah -->
                                <?php if(session('success')):?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session('success')?>
                                    </div>
                                <?php endif;?>

                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Tanggal Input</th>
                                            <th>Fungsi</th>
                                        </tr>
                                    </thead>
                                    
                                    <!-- INI UNTUK CREATE -->
                                    <tbody>
                                        <?php $no=1; ?> 
                                        <?php foreach($daftar_kategori as $kategori): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $kategori->nama_kategori;?></td>
                                                <td><?= $kategori->tanggal_input;?></td>
                                                <!-- <td><?= date('d/m/y H:i:s',strtotime($kategori->tanggal_input))?></td> -->
                                                <td style="width: 15%; text-align: center;">
                                                    <button type="button" class="btn btn-success btn-sm" 
                                                    data-bs-toggle="modal" data-bs-target="#ubahModal<?= $kategori->id_kategori;?>">
                                                    <i class="fas fa-edit"></i> Ubah</button>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#hapusModal<?= $kategori->id_kategori;?>">
                                                    <i class="fas fa-trash-alt"></i> Hapus</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- MODAL TAMBAH-->
                <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('daftar-kategori/tambah')?>" method="post">
                                <!-- Security dari CI -->
                                <?= csrf_field()?> 

                                <div>
                                    <label for="nama_kategori"><b>Nama Kategori</b></label>
                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                                    <label for="tanggal_input">Tanggal</label>
                                    <input type="date" name="tanggal_input" required>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                


                <?php foreach ($daftar_kategori as $kategori) : ?>
                <!-- MODAL UBAH -->
                <div class="modal fade" id="ubahModal<?= $kategori->id_kategori;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('daftar-kategori/ubah/'.$kategori->id_kategori)?>" method="post">
                                <!-- Security dari CI -->
                                <?= csrf_field()?> 

                                <div>
                                    <label for="nama_kategori"><b>Nama Kategori</b></label>
                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                    value="<?= $kategori->nama_kategori?>" required>

                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <?php foreach ($daftar_kategori as $kategori) : ?>
                <!-- MODAL HAPUS -->
                <div class="modal fade" id="hapusModal<?= $kategori->id_kategori;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('daftar-kategori/hapus/'.$kategori->id_kategori)?>" method="post">
                                <!-- Security dari CI -->
                                <?= csrf_field()?> 

                                <p>Yakin Data : <?= $kategori->nama_kategori;?>, Akan dihapus?</p>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
<?= $this->endSection ()?>