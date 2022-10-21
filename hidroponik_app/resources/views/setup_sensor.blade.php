@extends('layouts.layout')

@section('content')

<div class="container-fluid pt-4 px-4">
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
                    <th>Usia Tanam</th>
                    <th>pH</th>
                    <th>PPM</th>
                    <th>AKSi</th>
                </thead>

                <tbody>
                    <td>1</td>
                    <td>10 Hari</td>
                    <td>4.8 | pompa 1</td>
                    <td>384 | pompa 2</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus">Hapus
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">EDIT
                      </button>
                    </td>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="button" class="btn btn-primary">Ya</button>
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
            <form>
                <div class="row mb-3">
                    <label for="ph" class="col-sm-2 col-form-label">pH</label>
                    <div class="row">
                        <div class="col">
                            <span>Paramter</span>
                            <input type="number" class="form-control" name="ph" id="">
                        </div>
                        <div class="col">
                            <span>Aksi</span>
                            <select name="aksipH" class="form-control" id="">
                                <option value="-" selected>--Pilih--</option>
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
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ph" class="col-sm-2 col-form-label">Tandon</label>
                    <div class="row">
                        <div class="col">
                            <span>Paramter</span>
                            <input type="number" class="form-control" name="ph" id="">
                        </div>
                        <div class="col">
                            <span>Aksi</span>
                            <select name="aksipH" class="form-control" id="">
                                <option value="-" selected>--Pilih--</option>
                            </select>
                        </div>
                    </div>
                </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Simpan Perubahan</button>
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
            <form>
                <div class="row mb-3">
                    <label for="ph" class="col-sm-2 col-form-label">pH</label>
                    <div class="row">
                        <div class="col">
                            <span>Paramter</span>
                            <input type="number" class="form-control" name="ph" id="">
                        </div>
                        <div class="col">
                            <span>Aksi</span>
                            <select name="aksipH" class="form-control" id="">
                                <option value="-" selected>--Pilih--</option>
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
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ph" class="col-sm-2 col-form-label">Tandon</label>
                    <div class="row">
                        <div class="col">
                            <span>Paramter</span>
                            <input type="number" class="form-control" name="ph" id="">
                        </div>
                        <div class="col">
                            <span>Aksi</span>
                            <select name="aksipH" class="form-control" id="">
                                <option value="-" selected>--Pilih--</option>
                            </select>
                        </div>
                    </div>
                </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection