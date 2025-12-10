<div class="container-menu-diabetes">
    <div class="container-judul-menu-diabetes">
        <h1 class="judul-menu-diabetes">Cek Diabetes</h1>
        <p class="deskripsi__menu-diabetes">Lorem ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text</p>
    </div>
    <div class="page-menu">
        <div class="menu-item active" onclick="window.location='{{ route('diabetes.page') }}'">
            <img src="{{ asset('images/icon-diabetes.png') }}" alt="diabetes">
            <span>Diabetes</span>
        </div>

        <div class="menu-item" onclick="window.location='{{ route('lifestyle.page') }}'">
            <img src="{{ asset('images/icon-lifestyle.png') }}" alt="lifestyle">
            <span>Lifestyle</span>
        </div>

        <div class="menu-item" onclick="window.location='{{ route('profile.page') }}'">
            <img src="{{ $user->avatar ?? asset('images/user.png') }}" alt="Foto Profile">
            <span>Profil</span>
        </div>
    </div>
</div>
