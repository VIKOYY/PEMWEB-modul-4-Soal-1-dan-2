<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pemilu 2025</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
  <div class="bg-white shadow-lg p-6 rounded-xl w-full max-w-2xl">
    <h1 class="text-2xl font-bold text-center mb-6">Formulir Pemilihan Umum</h1>

    <form action="vote.php" method="POST" class="space-y-4">
      <div>
        <label class="block font-medium">NIK:</label>
        <input type="text" name="nik" required class="w-full p-2 border rounded">
      </div>

      <div>
        <label class="block font-medium">Nama Lengkap:</label>
        <input type="text" name="nama" required class="w-full p-2 border rounded">
      </div>

      <div>
        <label class="block font-medium">Jenis Kelamin:</label>
        <select name="gender" required class="w-full p-2 border rounded">
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <div>
        <label class="block font-medium">Alamat:</label>
        <textarea name="alamat" required class="w-full p-2 border rounded"></textarea>
      </div>

      <div>
        <label class="block font-medium">Pilih Calon:</label>
        <select name="calon_id" required class="w-full p-2 border rounded">
          <option value="">-- Pilih Calon --</option>
          <?php
          include 'koneksi.php';
          $data = $koneksi->query("SELECT * FROM calon");
          while ($row = $data->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['nama']}</option>";
          }
          ?>
        </select>
      </div>

      <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
        Kirim Suara
      </button>
    </form>
  </div>
</body>
</html>
