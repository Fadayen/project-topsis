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

        @media (max-width: 576px) {
    #topsisSteps table {
        min-width: 600px;
    }

    #topsisSteps th,
    #topsisSteps td {
        white-space: nowrap;
        font-size: 12px;
        padding: 6px;
    }
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
        <div class="row flex-column">
            <div class="col-12 mb-4">
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


<div id="reportArea">

    <!-- ================= DAFTAR KANDIDAT ================= -->
    <div class="card-custom mt-3 mb-4">
        <h4 class="text-center mb-3">
            <i class="fas fa-users"></i> Daftar Kandidat
        </h4>

        <div class="table-responsive">
            <table class="table table-striped align-middle text-center">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Pengalaman</th>
                        <th>Pendidikan</th>
                        <th>Teknis</th>
                        <th>Soft Skills</th>
                    </tr>
                </thead>
                <tbody id="candidateList">
                    <!-- Data kandidat -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- ================= HASIL TOPSIS ================= -->
    <div class="card-custom mb-5">
        <h3 class="text-center mb-3">
            <i class="fas fa-trophy text-warning"></i> Hasil Ranking TOPSIS
        </h3>

        <p class="text-muted small text-center">
            Pengalaman (0.3) • Pendidikan (0.2) • Teknis (0.3) • Soft Skills (0.2)
        </p>

        <button id="calculateBtn" class="btn btn-custom w-100 mb-3">
            <i class="fas fa-calculator"></i> Hitung Ranking
        </button>

        <div class="loading text-center my-3" id="loading">
            <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
            <p class="mt-2">Menghitung...</p>
        </div>

        <div class="table-responsive">
            <table class="table table-striped align-middle text-center" id="resultsTable">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Nama</th>
                        <th>Nilai Ci</th>
                    </tr>
                </thead>
                <tbody id="resultsBody">
                    <!-- Hasil -->
                </tbody>
            </table>
        </div>

        <button class="btn btn-success w-100 mt-3" id="downloadPdfBtn">
            <i class="fas fa-file-pdf"></i> Download Laporan PDF
        </button>

        <hr>

        <h4 class="text-center mt-4">Proses Perhitungan TOPSIS</h4>
        <div id="topsisSteps" class="mt-3"></div>
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

        function renderCandidateList() {
    const tbody = document.getElementById("candidateList");
    tbody.innerHTML = "";

    candidates.forEach(c => {
        tbody.innerHTML += `
            <tr>
                <td>${c.name}</td>
                <td>${c.criteria[0]}</td>
                <td>${c.criteria[1]}</td>
                <td>${c.criteria[2]}</td>
                <td>${c.criteria[3]}</td>
            </tr>
        `;
    });
}

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        document.getElementById('candidateForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('candidateName').value;
            const exp = parseFloat(document.getElementById('exp').value);
            const edu = parseFloat(document.getElementById('edu').value);
            const tech = parseFloat(document.getElementById('tech').value);
            const soft = parseFloat(document.getElementById('soft').value);
            candidates.push({ name, criteria: [exp, edu, tech, soft] });
            renderCandidateList();   // ← tambahkan ini
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

            const weights = [0.3, 0.2, 0.3, 0.2];
            const matrix = candidates.map(c => c.criteria);

            // ================= 1. MATRKS KEPUTUSAN (X) =================
let html = `
<h5 class="mt-4">1️⃣ Matriks Keputusan (X)</h5>

<div class="table-responsive">
<table class="table table-bordered text-center align-middle">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Pengalaman</th>
            <th>Pendidikan</th>
            <th>Teknis</th>
            <th>Soft Skills</th>
        </tr>
    </thead>
    <tbody>
`;

candidates.forEach(c => {
    html += `
        <tr>
            <td>${c.name}</td>
            <td>${c.criteria[0]}</td>
            <td>${c.criteria[1]}</td>
            <td>${c.criteria[2]}</td>
            <td>${c.criteria[3]}</td>
        </tr>
    `;
});

html += `
    </tbody>
</table>
</div>
`;


            // ================= 2. NORMALISASI =================
const normalized = [];
for (let j = 0; j < matrix[0].length; j++) {
    const col = matrix.map(row => row[j]);
    const norm = Math.sqrt(col.reduce((s, v) => s + v * v, 0));
    normalized.push(col.map(val => val / norm));
}

const normMatrix = normalized[0].map((_, i) => normalized.map(col => col[i]));

html += `
<h5 class="mt-4">2️⃣ Matriks Normalisasi (R)</h5>

<div class="table-responsive">
<table class="table table-bordered text-center align-middle">
    <thead>
        <tr>
            <th>Pengalaman</th>
            <th>Pendidikan</th>
            <th>Teknis</th>
            <th>Soft Skills</th>
        </tr>
    </thead>
    <tbody>
`;

normMatrix.forEach(row => {
    html += `
        <tr>
            <td>${row[0].toFixed(4)}</td>
            <td>${row[1].toFixed(4)}</td>
            <td>${row[2].toFixed(4)}</td>
            <td>${row[3].toFixed(4)}</td>
        </tr>
    `;
});

html += `
    </tbody>
</table>
</div>
`;


            // ================= 3. TERBOBOT =================
const weighted = normMatrix.map(row => row.map((val, j) => val * weights[j]));

html += `
<h5 class="mt-4">3️⃣ Matriks Terbobot (Y)</h5>

<div class="table-responsive">
<table class="table table-bordered text-center align-middle">
    <thead>
        <tr>
            <th>Pengalaman</th>
            <th>Pendidikan</th>
            <th>Teknis</th>
            <th>Soft Skills</th>
        </tr>
    </thead>
    <tbody>
`;

weighted.forEach(row => {
    html += `
        <tr>
            <td>${row[0].toFixed(4)}</td>
            <td>${row[1].toFixed(4)}</td>
            <td>${row[2].toFixed(4)}</td>
            <td>${row[3].toFixed(4)}</td>
        </tr>
    `;
});

html += `
    </tbody>
</table>
</div>
`;


            // ================= 4. A+ & A- =================
const idealPositive = weights.map((_, j) => Math.max(...weighted.map(row => row[j])));
const idealNegative = weights.map((_, j) => Math.min(...weighted.map(row => row[j])));

html += `
<h5 class="mt-4">4️⃣ Solusi Ideal</h5>

<div class="row">
    <div class="col-12 col-md-6 mb-2">
        <div class="card p-2 text-center">
            <strong>A⁺ (Ideal Positif)</strong>
            <div>${idealPositive.map(v => v.toFixed(4)).join(" | ")}</div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card p-2 text-center">
            <strong>A⁻ (Ideal Negatif)</strong>
            <div>${idealNegative.map(v => v.toFixed(4)).join(" | ")}</div>
        </div>
    </div>
</div>
`;


            // ================= 5. D+ & D- =================
const dPlus = [];
const dMinus = [];

weighted.forEach(row => {
    dPlus.push(Math.sqrt(row.reduce((s, v, j) => s + (v - idealPositive[j]) ** 2, 0)));
    dMinus.push(Math.sqrt(row.reduce((s, v, j) => s + (v - idealNegative[j]) ** 2, 0)));
});

html += `
<h5 class="mt-4">5️⃣ Jarak D⁺ dan D⁻</h5>

<div class="table-responsive">
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>Nama</th>
            <th>D⁺</th>
            <th>D⁻</th>
        </tr>
    </thead>
    <tbody>
`;

dPlus.forEach((v, i) => {
    html += `
        <tr>
            <td>${candidates[i].name}</td>
            <td>${v.toFixed(4)}</td>
            <td>${dMinus[i].toFixed(4)}</td>
        </tr>
    `;
});

html += `
    </tbody>
</table>
</div>
`;


            // ================= 6. NILAI PREFERENSI =================
const closeness = dPlus.map((dp, i) => dMinus[i] / (dp + dMinus[i]));

html += `
<h5 class="mt-4">6️⃣ Nilai Preferensi (Ci)</h5>

<div class="table-responsive">
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>Nama Kandidat</th>
            <th>Nilai Ci</th>
        </tr>
    </thead>
    <tbody>
`;

closeness.forEach((v, i) => {
    html += `
        <tr>
            <td>${candidates[i].name}</td>
            <td>${v.toFixed(4)}</td>
        </tr>
    `;
});

html += `
    </tbody>
</table>
</div>
`;

// ✅ WAJIB ADA
document.getElementById("topsisSteps").innerHTML = html;


            // ================= RANKING =================
            const ranked = candidates.map((c, i) => ({ ...c, closeness: closeness[i] }))
            .sort((a, b) => b.closeness - a.closeness);

            const tbody = document.getElementById('resultsBody');
            tbody.innerHTML = '';
            ranked.forEach((c, index) => {
            tbody.innerHTML += `<tr>
                <td>${index+1}</td>
                <td>${c.name}</td>
                <td>${c.closeness.toFixed(4)}</td>
            </tr>`;
            });

            loading.classList.remove('show');
            this.disabled = false;

            }, 2000);

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <script>
document.getElementById("downloadPdfBtn").addEventListener("click", function () {

    const element = document.getElementById("reportArea");

    const opt = {
        margin: 10,
        filename: 'Laporan-TOPSIS.pdf',
        image: { type: 'jpeg', quality: 1 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    html2pdf().set(opt).from(element).save();
});

</script>

</body>
</html>