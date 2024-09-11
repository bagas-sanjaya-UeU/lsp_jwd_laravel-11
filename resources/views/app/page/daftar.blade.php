@extends('app.app')
@section('content')
    <div class="row">
        <div class="col mt-1 d-flex justify-content-center">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card p-5">
                <div class="card-body ">
                    <h5 class="card-title">Registrasi Beasiswa</h5>
                    <form method="POST" action="{{ route('store.beasiswa') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Masukan Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                aria-describedby="emailHelp" required>
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Masukan Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" required>
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Masukan Nomor HP</label>
                                    <input type="number" min="1"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        minlength="8" maxlength="14" name="no_hp" class="form-control" required>
                                    @error('no_hp')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Semester Saat ini</label>
                                        <select class="form-select" aria-label="Default select example" name="semester">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                        @error('semester')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">IPK Terakhir</label>
                                            <input type="text" name="ipk" id="ipk_terakhir" value=""
                                                class="form-control" readonly>
                                            @error('ipk')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Pilihan Beasiswa</label>
                                                <select class="form-select" id="pilihan_beasiswa"
                                                    aria-label="Default select example" name="jenis_beasiswa">
                                                    @foreach ($pilihan_beasiswa as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('jenis_beasiswa')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Upload berkas Syarat</label>
                                                    <input class="form-control" name="file" type="file" id="formFile"
                                                        required>
                                                    @error('file')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                    <button type="submit" id="submit_btn"
                                                        class="btn btn-primary">Daftar</button>
                                                    <button type="reset" class="btn btn-danger">Batal</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {

        let pilihan_beasiswa = document.getElementById('pilihan_beasiswa');
        let submit_btn = document.getElementById('submit_btn');
        let file = document.getElementById('formFile');

        let ipk_terakhir = 0;
        let ipk = Math.random() * (4 - 2) + 2;

        ipk_terakhir = Math.round(ipk * 100) / 100;

        // Set nilai ipk ke inputan
        document.getElementById('ipk_terakhir').value = ipk_terakhir;

        // Cek apakah ipk terakhir dibawah 3 jika iya maka disable pilihan beasiswa , file dan submit
        if (ipk_terakhir < 3) {
            pilihan_beasiswa.disabled = true;
            file.disabled = true;
            submit_btn.disabled = true;
        } else {
            pilihan_beasiswa.disabled = false;
            file.disabled = false;
            submit_btn.disabled = false;
        }
    });
</script>
