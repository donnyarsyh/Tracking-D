<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur - Tracking-D | Prediksi AI</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    </head>
<body>
    <header class="header">
        <div class="header__logo">Tracking-D</div>
        <nav class="header__navigasi">
            <a href="#" class="navigasi__item aktif">Home</a>
            <a href="#" class="navigasi__item">Fitur</a>
            <a href="#" class="navigasi__item">Tutorial</a>
        </nav>
        <div class="header__profil-user">
            <img src="{{ asset('images/user.png') }}" alt="User Avatar"> </div>
    </header>

    <main class="bagian-fitur-utama">
        <div class="salam-pengguna">
            <h1 class="salam__judul">Selamat Datang, Shabri</h1>
            <p class="salam__deskripsi">Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
        </div>

        <div class="wadah-prediksi">
            <div class="kolom-input-form">
                <form action="#" method="POST" class="form-prediksi">
                    <h2 class="form__judul">Formulir</h2>
                    <p class="form__deskripsi">Isi form sesuai dengan hasil terakhir pengecekan dari dokter agar sistem dapat membantu memanajemen kondisi dan gaya hidup tubuh yang baik untuk pasien diabetes</p>

                    <input type="number" step="0.01" name="glukosa" placeholder="Glukosa" required class="form__input">
                    <input type="number" step="0.01" name="tekanan_darah" placeholder="Tekanan Darah" required class="form__input">
                    <input type="number" step="0.01" name="skinthickness" placeholder="SkinThickness" required class="form__input">
                    <input type="number" name="pregnancies" placeholder="Pregnancies" required class="form__input">
                    <input type="number" step="0.01" name="insulin" placeholder="Insulin" required class="form__input">
                    <input type="number" step="0.01" name="bmi" placeholder="BMI" required class="form__input">
                    <input type="number" step="0.01" name="riwayat_diabetes" placeholder="Riwayat Diabetes" required class="form__input">
                    <input type="number" name="usia" placeholder="Usia" required class="form__input">
                </form> </div>

            <div class="kolom-hasil-ai">
                <div class="hasil-ai__konten">
                    <h2 class="hasil-ai__judul">Bagus!!</h2>
                    <p class="hasil-ai__deskripsi">Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                </div>
                <div class="hasil-ai__gambar">
                    <img src="{{ asset('images/good.jpg') }}" alt="Karakter Dokter AI"> 
                </div>
                <button type="submit" form="form-prediksi" class="hasil-ai__tombol-generate">Generate</button>
            </div>
        </div>

    </main>
</body>
</html>