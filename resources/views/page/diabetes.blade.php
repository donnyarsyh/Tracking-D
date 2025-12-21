@extends('main.index')

@section('content')
    <div class="container-form-diabetes">

        {{-- FORM INPUT --}}
        <div class="kolom-input-form-diabetes card-diabetes">
            <form method="POST" action="/diabetes/predict" class="form-prediksi">
                @csrf

                <h2 class="form__judul-diabetes">Formulir Diabetes</h2>
                <p class="form__deskripsi-diabetes">
                    Isi form sesuai dengan hasil terakhir pengecekan dari dokter
                </p>

                <input type="number" step="0.01" name="Glucose" placeholder="Glukosa" required
                    class="form__input-diabetes">
                <input type="number" step="0.01" name="BloodPressure" placeholder="Tekanan Darah" required
                    class="form__input-diabetes">
                <input type="number" step="0.01" name="SkinThickness" placeholder="Ketebalan Kulit" required
                    class="form__input-diabetes">
                <input type="number" name="Pregnancies" placeholder="Jumlah Kehamilan" required
                    class="form__input-diabetes">
                <input type="number" step="0.01" name="Insulin" placeholder="Insulin" required
                    class="form__input-diabetes">
                <input type="number" step="0.01" name="BMI" placeholder="BMI" required class="form__input-diabetes">
                <input type="number" step="0.01" name="DiabetesPedigreeFunction" placeholder="Riwayat Diabetes" required
                    class="form__input-diabetes">
                <input type="number" name="Age" placeholder="Usia" required class="form__input-diabetes">

                <button type="submit" class="hasil-ai-diabetes__tombol-generate btn-primary">
                    Prediksi
                </button>
            </form>
        </div>

        {{-- HASIL PREDIKSI --}}
        <div class="kolom-hasil-ai-diabetes card-ai-diabetes">

            @isset($response)
                @if ($response['prediction'] == 0)
                    <div class="hasil-ai-diabetes__konten_good">
                        <h2 class="hasil-ai-diabetes__judul_good">
                            {{ $response['label'] }}
                        </h2>

                        <p class="hasil-ai-diabetes__deskripsi">
                            Tingkat risiko: <b>{{ $response['risk_level'] }}</b><br>
                            Probabilitas: <b>{{ $response['probability'] }}</b>
                        </p>
                    </div>
                @else
                    <div class="hasil-ai-diabetes__konten_bad">
                        <h2 class="hasil-ai-diabetes__judul_bad">
                            {{ $response['label'] }}
                        </h2>

                        <p class="hasil-ai-diabetes__deskripsi">
                            Tingkat risiko: <b>{{ $response['risk_level'] }}</b><br>
                            Probabilitas: <b>{{ $response['probability'] }}</b>
                        </p>
                    </div>
                @endif

                <div class="hasil-ai-diabetes__gambar">
                    @if ($response['prediction'] == 1)
                        <img src="{{ asset('images/bad.jpg') }}" alt="Risiko Diabetes">
                    @else
                        <img src="{{ asset('images/good.jpg') }}" alt="Tidak Diabetes">
                    @endif
                </div>
            @else
                {{-- Tampilan awal sebelum submit --}}
                <div class="hasil-ai-diabetes__konten_good">
                    <h2 class="hasil-ai-diabetes__judul_good">
                        Hasil Prediksi
                    </h2>
                    <p class="hasil-ai-diabetes__deskripsi">
                        Silakan isi formulir untuk melihat hasil prediksi diabetes.
                    </p>
                </div>

                <div class="hasil-ai-diabetes__gambar">
                    <img src="{{ asset('images/doctor-ai.png') }}" alt="Dokter AI">
                </div>
            @endisset

        </div>
    </div>
@endsection
