@extends('main.index')

@section('content')
    <div class="container-form-diabetes">
        <div class="kolom-input-form-diabetes card-diabetes">
            <form action="#" method="POST" class="form-prediksi">
                <h2 class="form__judul-diabetes">Formulir Diabetes</h2>
                <p class="form__deskripsi-diabetes">Isi form sesuai dengan hasil terakhir pengecekan dari dokter
                    agar sistem dapat membantu memanajemen kondisi tubuh untuk pasien diabetes</p>
                <input type="number" step="0.01" name="glukosa" placeholder="Glukosa" required
                    class="form__input-diabetes">
                <input type="number" step="0.01" name="tekanan_darah" placeholder="Tekanan Darah" required
                    class="form__input-diabetes">
                <input type="number" step="0.01" name="skinthickness" placeholder="SkinThickness" required
                    class="form__input-diabetes">
                <input type="number" name="pregnancies" placeholder="Pregnancies" required class="form__input-diabetes">
                <input type="number" step="0.01" name="insulin" placeholder="Insulin" required
                    class="form__input-diabetes">
                <input type="number" step="0.01" name="bmi" placeholder="BMI" required class="form__input-diabetes">
                <input type="number" step="0.01" name="riwayat_diabetes" placeholder="Riwayat Diabetes" required
                    class="form__input-diabetes">
                <input type="number" name="usia" placeholder="Usia" required class="form__input-diabetes">
            </form>
        </div>
        <div class="kolom-hasil-ai-diabetes card-ai-diabetes">
            <div class="hasil-ai-diabetes__konten_good">
                <h2 class="hasil-ai-diabetes__judul_good">Bagus!!</h2>
                <p class="hasil-ai-diabetes__deskripsi">Lorem ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
            </div>
            <div class="hasil-ai-diabetes__gambar">
                <img src="{{ asset('images/good.jpg') }}" alt="Karakter Dokter AI">
            </div>
            <button type="submit" form="form-prediksi"
                class="hasil-ai-diabetes__tombol-generate btn-primary">Generate</button>
        </div>
    </div>
@endsection
