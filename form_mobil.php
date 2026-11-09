<?php require "header.php"; ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1 class="h3 fw-bold mb-2"><?= aman($judulForm) ?></h1>
        <p class="text-secondary mb-4">Lengkapi informasi kendaraan berikut.</p>

        <?php if ($error !== ""): ?>
            <div class="alert alert-danger"><?= aman($error) ?></div>
        <?php endif; ?>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="<?= aman($aksi) ?>" method="post">
                    <input type="hidden" name="csrf" value="<?= aman($_SESSION["csrf"]) ?>">
                    <div class="mb-3">
                        <label for="nomor_kendaraan" class="form-label">Nomor Kendaraan</label>
                        <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan" maxlength="12" value="<?= aman($nomor) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                        <select class="form-select" id="jenis_kendaraan" name="jenis_kendaraan" required>
                            <option value="">Pilih jenis kendaraan</option>
                            <?php foreach (["Sedan", "Pickup", "Truk", "Bemo"] as $jenis): ?>
                                <option value="<?= aman($jenis) ?>" <?= $jenisKendaraan === $jenis ? "selected" : "" ?>><?= aman($jenis) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pemilik" class="form-label">Pemilik</label>
                        <input type="text" class="form-control" id="pemilik" name="pemilik" maxlength="50" value="<?= aman($pemilik) ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                        <input type="text" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" maxlength="4" value="<?= aman($tahun) ?>" placeholder="Contoh: 2022" required>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="dashboard.php" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php"; ?>
