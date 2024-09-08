@extends('app.app')
@section('content')
<div class="row">
    <div class="col mt-5 d-flex justify-content-center">
      @if(session('error'))
      <div class="alert alert-danger" role="alert">
        {{session('error')}}
      </div>
      @endif
      @if(session('success'))
      <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>
      @endif
      <div class="card p-5">
        <div class="card-body ">
          <h5 class="card-title">Input Pilihan Beasiswa</h5>
          <form method="POST" action="{{route('kategory_beasiswa.store')}}">
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Kategori Beasiswa</label>
              <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" required>
            </div>
           
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          
          <table class="table">
            <tr>
                <th>ID</th>
              <th>Nama</th>      
            </tr>
            @foreach ($pilihan_beasiswa as $item)
            <tr>
                <td>{{$item->id}}</td>
              <td>{{$item->nama_kategori}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>

      
    </div>
   </div>
   
   <h3 class="mt-3">Data Pendaftaran Beasiswa</h3>
   <div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
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
          @foreach($beasiswa as $beaswa)
        <tr>
            <th scope="row">{{$beaswa->id}}</th>
            <td>{{$beaswa->nama}}</td>
            <td>{{$beaswa->email}}</td>
            <td>{{$beaswa->no_hp}}</td>
            <td>{{$beaswa->semester}}</td>
            <td>{{$beaswa->ipk}}</td>
            <td>{{$beaswa->kategori->nama_kategori}}</td>
            <td>
               
                <a href="{{
                    asset('storage/data_file/' . $beaswa->file)
                }}" class="btn btn-primary btn-sm" target="_blank" download>Download Berkas</a>
            </td>
            <td>
              <select class="form-select" id="verify_user" data-id="<?= $beaswa->id; ?>" name="verified_user"
                required>
                <option value="1" <?=$beaswa->status_ajuan == 1 ? 'selected' : ''; ?>>Sudah Diverifikasi</option>
                <option value="2" <?=$beaswa->status_ajuan == 2 ? 'selected' : ''; ?>>Berkas Ditolak</option>
                <option value="3" <?=$beaswa->status_ajuan == 3 ? 'selected' : ''; ?>>Belum Diverifikasi</option>
            </select>
            </td>
          </tr>
          @endforeach
        
        </tbody>
    </table>
</div>
@endsection

