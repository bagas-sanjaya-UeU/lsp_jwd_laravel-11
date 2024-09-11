@extends('app.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Semester</th>
                    <th scope="col">IPK</th>
                    <th scope="col">jenis_beasiswa</th>
                    <th scope="col">Berkas</th>
                    <th scope="col">Status Ajuan</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($beasiswa as $beaswa)
                    <tr>

                        <th scope="row">{{ $beaswa->id }}</th>
                        <td>{{ $beaswa->nama }}</td>
                        <td>{{ $beaswa->alamat }}</td>
                        <td>{{ $beaswa->email }}</td>
                        <td>{{ $beaswa->no_hp }}</td>
                        <td>{{ $beaswa->semester }}</td>
                        <td>{{ $beaswa->ipk }}</td>
                        <td>{{ $beaswa->kategori->nama_kategori }}</td>
                        <td>

                            <a href="{{ asset('storage/data_file/' . $beaswa->file) }}" class="btn btn-primary btn-sm"
                                target="_blank" download>Download Berkas</a>
                        </td>
                        <td>
                            @if ($beaswa->status_ajuan == 1)
                                <p><span class="badge bg-success">Berkas Diterima</span></p>
                            @elseif($beaswa->status_ajuan == 2)
                                <p><span class="badge bg-danger">Berkas Ditolak</span></p>
                            @elseif($beaswa->status_ajuan == 3)
                                <p><span class="badge bg-warning">Belum Diverifikasi</span></p>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
