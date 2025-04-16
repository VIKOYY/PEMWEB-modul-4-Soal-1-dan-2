<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Survei</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
  <div class="w-full max-w-2xl bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">Form Survei Kepuasan</h2>
    
    <form action="simpan.php" method="POST" class="space-y-4 mb-8">
      <div>
        <label class="block font-medium">Nama:</label>
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
        <label class="block font-medium">Usia:</label>
        <input type="number" name="usia" required min="1" class="w-full p-2 border rounded">
      </div>

      <div>
        <label class="block font-medium">Apakah Anda puas dengan layanan kami?</label>
        <select name="jawaban" required class="w-full p-2 border rounded">
          <option value="Ya">Ya</option>
          <option value="Tidak">Tidak</option>
          <option value="Mungkin">Mungkin</option>
        </select>
      </div>

      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Kirim Survei</button>
    </form>

    <h2 class="text-xl font-semibold mb-2">Hasil Survei</h2>
    <canvas id="hasilChart" height="100"></canvas>
  </div>

  <script>
    fetch('get_data.php')
      .then(res => res.json())
      .then(data => {
        const labels = data.map(d => d.jawaban);
        const values = data.map(d => d.jumlah);

        const ctx = document.getElementById('hasilChart');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Hasil Survei',
              data: values,
              backgroundColor: ['#34D399', '#F87171', '#FBBF24'],
              borderWidth: 4
            }]
          }
        });
      });
  </script>
</body>
</html>
