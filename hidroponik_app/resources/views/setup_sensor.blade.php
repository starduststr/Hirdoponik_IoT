@extends('layouts.layout')

@section('content')

<div class="container-fluid pt-4 px-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fa fa-plus"></i> Tambah Parameter
    </button>
    <div class="card">
        <div class="card-header bg-info">
            <div class="card-title text-white">
                <span>SETUP PARAMETER SENSOR</span>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-stripped">
                <thead>
                    <th>NO</th>
                    <th>Nama Tanaman</th>
                    <th>Usia Tanam</th>
                    <th>pH</th>
                    <th>PPM</th>
                    <th>AKSi</th>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($summary as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data['nama_tanaman'] }}</td>
                        <td>{{ $data['usia_tanam'] }}</td>
                        <td>{{ $data['ph'].' | '. $data['aksi_ph']}}</td>
                        <td>{{ $data['ppm'].' | '. $data['aksi_ppm']}}</td>
                        <td>
                            <button type="button" onclick="confirm_delete(this)" data-id="{{ $data['id'] }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus">Hapus
                            </button>
                            <button type="button" onclick="edit_data(this)" data-id="{{ $data['id'] }}" data-nama_tanaman="{{ $data['nama_tanaman'] }}" data-usia_tanam="{{ $data['usia_tanam'] }}" data-ph="{{ $data['ph'] }}" data-ppm="{{ $data['ppm'] }}" data-aksi_ph="{{ $data['aksi_ph'] }}" data-aksi_ppm="{{ $data['aksi_ppm'] }}"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">EDIT
                        </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Hapus -->
<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapusLabel">Apakah anda yakin?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Hapus data
          <form action="{{ route('delete_parameter') }}" method="post">
            @csrf
            <input type="hidden" name="id" id="id_hapus" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLabel">EDIT DATA</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('edit_parameter') }}" method="POST">
                @csrf
                <input type="hidden" id="e_id" name="id">
                <div class="row mb-3">
                    <label for="ph" class="col-sm-2 col-form-label">Tanaman</label>
                    <div class="row">
                        <div class="col">
                            <span>Nama Tanaman</span>
                            <input type="text" class="form-control" name="nama_tanaman" id="e_nama_tanaman">
                        </div>
                        <div class="col">
                            <span>Usia Tanam</span>
                            <input type="number" class="form-control" name="usia_tanam" id="e_usia_tanam">
                        </div>
                    </div>
                </div> 
                <div class="row mb-3">
                    <label for="ph" class="col-sm-2 col-form-label">pH</label>
                    <div class="row">
                        <div class="col">
                            <span>Parameter</span>
                            <input type="text" class="form-control" name="ph" id="e_ph">
                        </div>
                        <div class="col">
                            <span>Aksi</span>
                            <select name="aksi_ph" class="form-control" id="e_aksi_ph">
                                <option value="-" selected>--Pilih--</option>
                                <option value="pompa 1">POMPA 1</option>
                                <option value="pompa 2">POMPA 2</option>
                                <option value="pompa 3">POMPA 3</option>
                                <option value="pompa 4">POMPA 4</option>
                                <option value="pompa 5">POMPA 5</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ph" class="col-sm-2 col-form-label">PPM</label>
                    <div class="row">
                        <div class="col">
                            <span>Paramter</span>
                            <input type="number" class="form-control" name="ppm" id="e_ppm">
                        </div>
                        <div class="col">
                            <span>Aksi</span>
                            <select name="aksi_ppm" class="form-control" id="e_aksi_ppm">
                                <option value="-" selected>--Pilih--</option>
                                <option value="pompa 1">POMPA 1</option>
                                <option value="pompa 2">POMPA 2</option>
                                <option value="pompa 3">POMPA 3</option>
                                <option value="pompa 4">POMPA 4</option>
                                <option value="pompa 5">POMPA 5</option>
                            </select>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
      </div>
    </div>
  </div>


<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahLabel">TAMBAH DATA</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('create_parameter') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="ph" class="col-sm-2 col-form-label">Tanaman</label>
                    <div class="row">
                        <div class="col">
                            <span>Nama Tanaman</span>
                            <input type="text" class="form-control" name="nama_tanaman" id="">
                        </div>
                        <div class="col">
                            <span>Usia Tanam</span>
                            <input type="number" class="form-control" name="usia_tanam">
                        </div>
                    </div>
                </div> 
                <div class="row mb-3">
                    <label for="ph" class="col-sm-2 col-form-label">pH</label>
                    <div class="row">
                        <div class="col">
                            <span>Parameter</span>
                            <input type="text" class="form-control" name="ph" id="">
                        </div>
                        <div class="col">
                            <span>Aksi</span>
                            <select name="aksipH" class="form-control" id="">
                                <option value="-" selected>--Pilih--</option>
                                <option value="pompa 1">POMPA 1</option>
                                <option value="pompa 2">POMPA 2</option>
                                <option value="pompa 3">POMPA 3</option>
                                <option value="pompa 4">POMPA 4</option>
                                <option value="pompa 5">POMPA 5</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ph" class="col-sm-2 col-form-label">PPM</label>
                    <div class="row">
                        <div class="col">
                            <span>Paramter</span>
                            <input type="number" class="form-control" name="ppm" id="">
                        </div>
                        <div class="col">
                            <span>Aksi</span>
                            <select name="aksippm" class="form-control" id="">
                                <option value="-" selected>--Pilih--</option>
                                <option value="pompa 1">POMPA 1</option>
                                <option value="pompa 2">POMPA 2</option>
                                <option value="pompa 3">POMPA 3</option>
                                <option value="pompa 4">POMPA 4</option>
                                <option value="pompa 5">POMPA 5</option>
                            </select>
                        </div>
                    </div>
                </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div>


<script>
    function confirm_delete(e){
        var data = $(e);
        $('#id_hapus').val(data.data('id'));
    }

    function edit_data(e){
        var data = $(e);

        $('#e_id').val(data.data('id'));
        $('#e_nama_tanaman').val(data.data('nama_tanaman'));
        $('#e_usia_tanam').val(data.data('usia_tanam'));
        $('#e_ph').val(data.data('ph'));
        $('#e_ppm').val(data.data('ppm'));
        $('#e_aksi_ph').val(data.data('aksi_ph'));
        $('#e_aksi_ppm').val(data.data('aksi_ppm'));

    }
</script>
@endsection