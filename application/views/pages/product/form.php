<main role="main" class="container mt-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-primary text-light">
                    <span>Formulir Produk</span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="title" class="mb-2">Produk</label>
                                <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                                <?= form_error('title') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="mb-2">Deskripsi</label>
                                <?= form_textarea(['name' => 'description', 'value' => $input->description, 'rows' => 4, 'class' => 'form-control']) ?>
                                <?= form_error('description') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price" class="mb-2">Harga</label>
                                <?= form_input(['type' => 'number', 'name' => 'price', 'value' => $input->price, 'class' => 'form-control', 'required' => true]) ?>
                                <?= form_error('price') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_category" class="mb-2">Kategori</label>
                                <?= form_dropdown('id_category', getDropdownList('category', ['id', 'title']), $input->id_category, ['class' => 'form-control']) ?>
                                <?= form_error('id_category') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="is_available" class="mb-2">Ada Stock</label>
                                <div class="form-check form-check-inline">
                                    <?= form_radio(['name' => 'is_available', 'value' => 1, 'checked' => $input->is_available == 1 ? true : false, 'class' => 'form-check-input']) ?>
                                    <label class="form-check-label">Tersedia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <?= form_radio(['name' => 'is_available', 'value' => 0, 'checked' => $input->is_available == 0 ? true : false, 'class' => 'form-check-input']) ?>
                                    <label class="form-check-label">Kosong</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="stock" class="mb-2">Stok</label>
                                <?= form_input(['type' => 'number', 'name' => 'stock', 'value' => $input->stock, 'class' => 'form-control', 'required' => true]) ?>
                                <?= form_error('stock') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image" class="mb-2">Gambar</label>
                                <div class="mb-2">
                                    <?= form_upload('image', '', ['class' => 'form-control']) ?>
                                </div>
                                <?php if ($this->session->flashdata('image_error')) : ?>
                                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif ?>
                                <?php if ($input->image) : ?>
                                    <img src="<?= base_url("/assets/images/product/$input->image") ?>" alt="" class="img-thumbnail" height="150">
                                <?php endif ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="slug" class="mb-2">Slug</label>
                                <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true]) ?>
                                <?= form_error('slug') ?>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>
