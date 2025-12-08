<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perekrutan </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            overflow-x: hidden;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?office,indonesia,team') no-repeat center center/cover;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
            animation: slideIn 1.5s ease-out;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
        }
        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            animation: fadeInUp 1s ease-out 0.5s both;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.9) !important;
            backdrop-filter: blur(10px);
        }
        .card-custom {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }
        .btn-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(255, 107, 107, 0.5);
        }
        .form-control {
            border-radius: 15px;
            border: 2px solid #ddd;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #ff6b6b;
            box-shadow: 0 0 10px rgba(255, 107, 107, 0.3);
        }
        .table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            font-weight: bold;
        }
        .table tbody tr {
            transition: background 0.3s ease;
        }
        .table tbody tr:hover {
            background: rgba(255, 107, 107, 0.1);
        }
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .loading {
            display: none;
            text-align: center;
            margin-top: 20px;
        }
        .loading.show {
            display: block;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-building"></i> Perekrutan Kandidat Karyawan</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1 class="display-4">Sistem Perekrutan Karyawan</h1>
            <p class="lead">Menggunakan Metode TOPSIS untuk Seleksi Kandidat Terbaik</p>
            <i class="fas fa-chart-line fa-3x mt-3"></i>
        </div>
    </section>

    <div class="container my-5 fade-in">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card-custom">
                    <h3 class="text-center mb-4"><i class="fas fa-user-plus text-primary"></i> Input Kandidat</h3>
                    <form id="candidateForm">
                        <div class="mb-3">
                            <label for="candidateName" class="form-label"><i class="fas fa-user"></i> Nama Kandidat</label>
                            <input type="text" class="form-control" id="candidateName" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="exp" class="form-label"><i class="fas fa-clock"></i> Pengalaman (tahun)</label>
                                <input type="number" class="form-control" id="exp" min="0" max="20" required>
                            </div>
                            <div class="col-6">
                                <label for="edu" class="form-label"><i class="fas fa-graduation-cap"></i> Pendidikan (skor 1-10)</label>
                                <input type="number" class="form-control" id="edu" min="1" max="10" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="tech" class="form-label"><i class="fas fa-cogs"></i> Keterampilan Teknis (skor 1-10)</label>
                                <input type="number" class="form-control" id="tech" min="1" max="10" required>
                            </div>
                            <div class="col-6">
                                <label for="soft" class="form-label"><i class="fas fa-handshake"></i> Soft Skills (skor 1-10)</label>
                                <input type="number" class="form-control" id="soft" min="1" max="10" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-custom mt-4 w-100"><i class="fas fa-plus"></i> Tambah Kandidat</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card-custom">
                    <h3 class="text-center mb-4"><i class="fas fa-trophy text-warning"></i> Hasil Ranking TOPSIS</h3>
                    <p class="text-muted">Kriteria: Pengalaman (Benefit, Bobot 0.3), Pendidikan (Benefit, 0.2), Teknis (Benefit, 0.3), Soft Skills (Benefit, 0.2)</p>
                    <button id="calculateBtn" class="btn btn-custom mb-3 w-100"><i class="fas fa-calculator"></i> Hitung Ranking</button>
                    <div class="loading" id="loading">
                        <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                        <p>Menghitung...</p>
                    </div>
                    <table class="table table-striped mt-3" id="resultsTable">
                        <thead>
                            <tr>
                                <th><i class="fas fa-medal"></i> Ranking</th>
                                <th><i class="fas fa-user"></i> Nama Kandidat</th>
                                <th><i class="fas fa-chart-bar"></i> Closeness Coefficient</th>
                            </tr>
                        </thead>
                        <tbody id="resultsBody">
                            <!-- Hasil akan muncul di sini -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="alert alert-secondary mt-4">
    <h5><i class="fas fa-list-ol"></i> Skala Penilaian Kriteria</h5>

    <p>
        Agar penilaian setiap kandidat konsisten dan dapat dihitung menggunakan metode 
        <b>TOPSIS</b>, setiap kriteria diberikan skala nilai numerik berdasarkan tingkat kualitasnya.
        Semakin tinggi nilai, semakin baik performa kandidat pada kriteria tersebut.
    </p>

    <hr>

    <h6>🎓 Skala Penilaian Pendidikan</h6>
    <p>Semakin tinggi tingkat pendidikan, semakin besar nilai yang diberikan.</p>
    <table class="table table-bordered">
        <tr><th>Keterangan</th><th>Nilai</th></tr>
        <tr><td>SMA / SMK</td><td>4</td></tr>
        <tr><td>D3</td><td>6</td></tr>
        <tr><td>S1</td><td>8</td></tr>
        <tr><td>S2 / S3</td><td>10</td></tr>
    </table>

    <hr>

    <h6>🛠 Skala Penilaian Keterampilan Teknis</h6>
    <p>Menilai kemampuan teknis kandidat dalam bidang pekerjaannya.</p>
    <table class="table table-bordered">
        <tr><th>Keterangan</th><th>Nilai</th></tr>
        <tr><td>Pemula</td><td>4</td></tr>
        <tr><td>Menengah</td><td>6</td></tr>
        <tr><td>Mahir</td><td>8</td></tr>
        <tr><td>Expert</td><td>10</td></tr>
    </table>

    <hr>

    <h6>🤝 Skala Penilaian Soft Skill</h6>
    <p>Menilai kemampuan komunikasi, kerja sama, kepemimpinan, dan perilaku profesional kandidat.</p>
    <table class="table table-bordered">
        <tr><th>Keterangan</th><th>Nilai</th></tr>
        <tr><td>Kurang</td><td>4</td></tr>
        <tr><td>Cukup</td><td>6</td></tr>
        <tr><td>Baik</td><td>8</td></tr>
        <tr><td>Sangat Baik</td><td>10</td></tr>
    </table>

    <p class="mt-3">
        Data nilai ini kemudian digunakan sebagai input pada proses perhitungan 
        <b>TOPSIS</b> agar sistem dapat menentukan kandidat terbaik berdasarkan 
        perhitungan matematis yang objektif.
    </p>
</div>

        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2025 Sistem Perekrutan dengan TOPSIS - Dibuat untuk Masa Depan Karir Anda.</p>
        <i class="fas fa-star text-warning"></i>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let candidates = [];

        // Animasi fade-in saat scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        });
        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        document.getElementById('candidateForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('candidateName').value;
            const exp = parseFloat(document.getElementById('exp').value);
            const edu = parseFloat(document.getElementById('edu').value);
            const tech = parseFloat(document.getElementById('tech').value);
            const soft = parseFloat(document.getElementById('soft').value);
            candidates.push({ name, criteria: [exp, edu, tech, soft] });
            alert('Kandidat ditambahkan dengan sukses!');
            this.reset();
        });

        document.getElementById('calculateBtn').addEventListener('click', function() {
            if (candidates.length < 2) {
                alert('Tambahkan minimal 2 kandidat untuk perhitungan TOPSIS.');
                return;
            }

            const loading = document.getElementById('loading');
            loading.classList.add('show');
            this.disabled = true;

            setTimeout(() => {
                // Bobot kriteria (sesuaikan jika perlu)
                const weights = [0.3, 0.2, 0.3, 0.2]; // Pengalaman, Pendidikan, Teknis, Soft Skills
                const isBenefit = [true, true, true, true]; // Semua benefit

                // Matriks keputusan
                const matrix = candidates.map(c => c.criteria);

                // Normalisasi
                const normalized = [];
                for (let j = 0; j < matrix[0].length; j++) {
                    const col = matrix.map(row => row[j]);
                    const norm = Math.sqrt(col.reduce((sum, val) => sum + val ** 2, 0));
                    normalized.push(col.map(val => val / norm));
                }
                const normMatrix = normalized[0].map((_, i) => normalized.map(col => col[i]));

                // Matriks terbobot
                const weighted = normMatrix.map(row => row.map((val, j) => val * weights[j]));

                // Ideal positif dan negatif
                const idealPositive = weights.map((_, j) => Math.max(...weighted.map(row => row[j])));
                const idealNegative = weights.map((_, j) => Math.min(...weighted.map(row => row[j])));

                // Jarak ke ideal
                const distancesPositive = weighted.map(row => Math.sqrt(row.reduce((sum, val, j) => sum + (val - idealPositive[j]) ** 2, 0)));
                const distancesNegative = weighted.map(row => Math.sqrt(row.reduce((sum, val, j) => sum + (val - idealNegative[j]) ** 2, 0)));

                // Closeness coefficient
                const closeness = distancesPositive.map((dp, i) => distancesNegative[i] / (dp + distancesNegative[i]));

                // Ranking
                const ranked = candidates.map((c, i) => ({ ...c, closeness: closeness[i] }))
                    .sort((a, b) => b.closeness - a.closeness);

                // Tampilkan hasil
                const tbody = document.getElementById('resultsBody');
                tbody.innerHTML = '';
                ranked.forEach((c, index) => {
                    const medal = index === 0 ? '🥇' : index === 1 ? '🥈' : index === 2 ? '🥉' : '';
                    const row = `<tr>
                        <td>${medal} ${index + 1}</td>
                        <td>${c.name}</td>
                        <td>${c.closeness.toFixed(4)}</td>
                    </tr>`;
                    tbody.innerHTML += row;
                });

                loading.classList.remove('show');
                this.disabled = false;
            }, 2000); // Simulasi loading 2 detik
        });
    </script>
</body>
</html>
