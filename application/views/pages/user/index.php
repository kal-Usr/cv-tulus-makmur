 <main role="main" class="container mt-4">
     <?php $this->load->view('layouts/_alert') ?>
     <div class="row">
         <div class="col-md-10 mx-auto mt-2">
             <div class="card">
                 <div class="card-header bg-primary text-light">
                     <span>Pengguna</span>
                     <a href="<?= base_url('user/create') ?>" class="btn btn-sm btn-success mb-2">Tambah</a>

                     <div class="float-right">
                         <form action="<?= base_url("user/search") ?>" method="POST">
                             <div class="input-group">
                                 <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>">
                                 <div class="input-group-append">
                                     <button class="btn btn-primary btn-sm" type="submit">
                                         <i class="fas fa-search"></i>
                                     </button>
                                     <a href="<?= base_url("user/reset") ?>" class="btn btn-primary btn-sm">
                                         <i class="fas fa-eraser"></i>
                                     </a>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table">
                             <thead>
                                 <tr>
                                     <th scope="col">#</th>
                                     <th scope="col">Pengguna</th>
                                     <th scope="col">E-Mail</th>
                                     <th scope="col">Role</th>
                                     <th scope="col">Status</th>
                                     <th scope="col"></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no = 0;
                                    foreach ($content as $row) : $no++; ?>
                                     <tr>
                                         <td><?= $no ?></td>
                                         <td>
                                             <p>
                                                 <img src="<?= $row->image ? base_url("assets/images/user/$row->image") : base_url("assets/images/user/anonim.jpg") ?>" alt="" height="50">
                                                 <?= $row->name ?>
                                             </p>
                                         </td>
                                         <td><?= $row->email ?></td>
                                         <td><?= $row->role ?></td>
                                         <td><?= $row->is_active ? 'Aktif' : 'Tidak Aktif' ?></td>
                                         <td>

                                         <?= form_open(base_url("user/delete/$row->id"), ['method' => 'POST']) ?>
                                         <?= form_hidden('id', $row->id) ?>
                                             <a href="<?= base_url("user/edit/$row->id") ?>" class="btn btn-sm">
                                                     <i class="fas fa-edit text-info"></i>
                                             </a>
                                             <button class="btn btn-sm" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
                                                 <i class="fas fa-trash text-danger"></i>
                                             </button>
                                        <?= form_close() ?>
                                         </td>
                                     </tr>
                                 <?php endforeach ?>
                             </tbody>
                         </table>
                     </div>

                     <!-- Pagination -->
                     <nav aria-label="Page navigation example">
                         <?= $pagination ?>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 </main>