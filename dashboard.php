<?php
require "fungsi.php";
periksaLogin();
require "koneksi.php";

echo '<div class="alert alert-info m-3">';
echo '<strong>Bukti Session Login</strong><br>';
echo '<pre class="mb-0">';
print_r([
    "id" => $_SESSION["id"] ?? null,
    "email" => $_SESSION["email"] ?? null,
    "nama" => $_SESSION["nama"] ?? null
]);
echo '</pre>';
echo '</div>';

$pesan = $_SESSION["pesan"] ?? null;
unset($_SESSION["pesan"]);

$hasil = $koneksi->query(
    "SELECT no_id, nomor_kendaraan, jenis_kendaraan, pemilik, tahun_pembuatan
     FROM mobil018 ORDER BY no_id DESC"
);

require "header.php";
?>
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="h3 fw-bold mb-1">Data Kendaraan</h1>
        <p class="text-secondary mb-0">Kelola daftar kendaraan rental mobil.</p>
    </div>
    <a href="tambah.php" class="btn btn-primary">+ Tambah Kendaraan</a>
</div>

<?php if ($pesan): ?>
    <div class="alert alert-<?= aman($pesan["tipe"]) ?>"><?= aman($pesan["teks"]) ?></div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-3 p-md-4">
        <h2 class="h5 fw-bold mb-3">Daftar Mobil</h2>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No.</th><th>Nomor Kendaraan</th><th>Jenis Kendaraan</th>
                        <th>Pemilik</th><th>Tahun</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php while ($mobil = $hasil->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= aman($mobil["nomor_kendaraan"]) ?></td>
                        <td><?= aman($mobil["jenis_kendaraan"]) ?></td>
                        <td><?= aman($mobil["pemilik"]) ?></td>
                        <td><?= aman($mobil["tahun_pembuatan"]) ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="edit.php?id=<?= (int) $mobil["no_id"] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="hapus.php" method="post" class="m-0" onsubmit="return confirm('Hapus data kendaraan ini?')">
                                    <input type="hidden" name="id" value="<?= (int) $mobil["no_id"] ?>">
                                    <input type="hidden" name="csrf" value="<?= aman($_SESSION["csrf"]) ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php if ($hasil->num_rows === 0): ?>
                    <tr><td colspan="6" class="text-center text-secondary">Belum ada data kendaraan.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require "footer.php"; ?>
