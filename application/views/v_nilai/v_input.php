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
                            <th>Nama Alternatif</th>
                            <td>
                                <input type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>" placeholder="Nama Alternatif" required>                                
                            </td>
                        </tr>
                        <tr>
                            <th>Kriteria</th>
                            <th>Nama Subkriteria</th>
                        </tr>
                        <?php foreach ($kriteria as $key) :
                            $where = array('id_kriteria' => $key->id_kriteria);
                            $sub_kriteria = $this->m_data->edit_data($where, 'sub_kriteria')->result();
                            if ($sub_kriteria != NULL) : ?>
                                <input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
                                <tr>
                                    <td>
                                        <label for="<?= $key->id_kriteria ?>"><?= $key->nama_kriteria ?></label>
                                    </td>
                                    <td>
                                        <select name="sub_kriteria[]" id="" class=" form-control" required>
                                            <option value=""> --- Pilih --- </option>
                                            <?php foreach ($sub_kriteria as $s) : ?>
                                                <option value="<?= $s->id_subkriteria ?>">
                                                    <?= ' | Nilai : ' . $s->nilai . ' | '; ?>
                                                    <?= $s->nama_subkriteria; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-primary" value="Tambah"></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </section>
</div>