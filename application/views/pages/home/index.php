<main role="main" class="container mt-1">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body text-dark">
                            Kategori: <strong><?= isset($category) ? $category : 'Semua kategori' ?></strong>
                            <span class="float-end">
                                Urutkan Harga:
                                <a href="<?= base_url("/shop/sortby/asc") ?>" class="badge bg-warning">Termurah</a> |
                                <a href="<?= base_url("/shop/sortby/desc") ?>" class="badge bg-warning">Termahal</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal untuk menampilkan gambar produk -->
            <?php foreach ($content as $row) : ?>
                <div class="modal fade" id="imageModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel<?= $row->id ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel<?= $row->id ?>">Gambar Produk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= $row->image ? base_url("/assets/images/product/$row->image") : base_url("/assets/images/product/default.png") ?>" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <div class="row">
                <?php foreach ($content as $row) : ?>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="<?= $row->image ? base_url("/assets/images/product/$row->image") : base_url("/assets/images/product/default.png") ?>" alt="" height="150" class="card-img-top" data-toggle="modal" data-target="#imageModal<?= $row->id ?>" />
                            <div class="card-body">
                                <h6 class="card-title"><?= $row->product_title ?></h6>
                                <p class="card-text"><strong>Rp<?= number_format($row->price, 0, ',', '.') ?></strong></p>
                                <p class="card-text">
                                    <button type="button" class="btn btn-info btn-sm text-light" data-toggle="modal" data-target="#descriptionModal<?= $row->id ?>">
                                        Lihat Deskripsi
                                    </button>
                                </p>
                                <p class="card-text">Stok: <strong><?= $row->stock ?></strong></p>
                                <a href="<?= base_url("/shop/category/$row->category_slug") ?>" class="badge bg-warning"><i class="fas fa-tags"></i><?= $row->category_title ?></a>
                            </div>
                            <div class="card-footer">
                                <form action="<?= base_url("/cart/add") ?>" method="POST">
                                    <input type="hidden" name="id_product" value="<?= $row->id ?>">
                                    <div class="input-group">
                                        <input type="number" name="qty" value="1" class="form-control" />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-shopping-cart"></i> tambah
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="descriptionModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel<?= $row->id ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content card">
                                <div class="modal-header card-header">
                                    <h5 class="modal-title" id="descriptionModalLabel<?= $row->id ?>">Deskripsi Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body card-body">
                                    <?= $row->description ?>
                                </div>
                                <div class="modal-footer card-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <nav aria-label="Page navigation example">
                <?= $pagination ?>
            </nav>
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header bg-info text-light">Pencarian</div>
                        <div class="card-body">
                            <form action="<?= base_url("/shop/search") ?>" method="POST">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>" class="form-control" />
                                    <div class="input-group-append">
                                        <button class="btn btn-info text-light" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header bg-info text-light">Kategori</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="<?= base_url('/home') ?>" class="text-dark">Semua Kategori</a></li>
                            <?php foreach (getCategories() as $category) : ?>
                                <li class="list-group-item"><a href="<?= base_url("/shop/category/$category->slug") ?>" class="text-dark"><?= $category->title ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
