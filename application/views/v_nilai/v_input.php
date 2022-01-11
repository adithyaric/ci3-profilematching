<div class="navbar-bg"></div>
<div class="main-content">
    <section class="section">
        <!-- Header -->
        <div class="section-header">
            <h1>Detail Data</h1>
        </div>
        <!-- End Header -->
        <div class="section-body">
            <form action="<?= base_url() . $aksi . '/tambah_aksi'; ?>" method="post">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <tr>
                            <th>Nama Bibit padi</th>
                            <td>
                                <input type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>" placeholder="Nama Bibit padi" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Kriteria</th>
                            <th>Keterangan</th>
                        </tr>
                        <?php foreach ($kriteria as $key) :
                            $where = array('id_kriteria' => $key->id_kriteria);
                            $bobot_kriteria = $this->m_data->edit_data($where, 'bobot_kriteria')->result();
                            if ($bobot_kriteria != NULL) : ?>
                                <input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
                                <tr>
                                    <td>
                                        <label for="<?= $key->id_kriteria ?>"><?= $key->nama_kriteria ?></label>
                                    </td>
                                    <td>
                                        <select name="bobot_kriteria[]" id="" class=" form-control" required>
                                            <option value=""> --- Pilih --- </option>
                                            <?php foreach ($bobot_kriteria as $s) : ?>
                                                <option value="<?= $s->id_bobotkriteria ?>">
                                                    <?= $s->nama_bobotkriteria; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-primary" value="Tambah">
                                <a href="<?php echo base_url()  . 'admin/nilai'; ?>"><button type="button" class="btn btn-info">Kembali</button></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </section>
</div>