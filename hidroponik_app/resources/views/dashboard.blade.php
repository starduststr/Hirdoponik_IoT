@extends('layouts.layout')

@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-temperature-low fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Suhu</p>
                    <h6 class="mb-0">25C</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-water fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Kelembapan</p>
                    <h6 class="mb-0">75%</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-flask fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">pH</p>
                    <h6 class="mb-0">5.8</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-spinner fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">TDS</p>
                    <h6 class="mb-0">871</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                {{-- <i class="fa fa-water fa-3x text-primary"></i> --}}
                <div class="ms-6">
                    <p class="mb-2">Air Tandon</p>
                    <h6 class="mb-0"><progress value="57" max="100"></progress></h6>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-leaf fa-3x text-primary"></i>
                <div class="ms-6">
                    <p class="mb-2">Usia Tanam</p>
                    <h6 class="mb-0">10 Hari</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-flask fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Set Parameter pH</p>
                    <h6 class="mb-0">5.5</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-spinner fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Set Parameter TDS</p>
                    <h6 class="mb-0">871</h6>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Riwayat perubahan</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-center align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col" >Perubahan ke</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">pH (sebelum)</th>
                        <th scope="col">pH (setelah)</th>
                        <th scope="col">PPM (sebelum)</th>
                        <th scope="col">PPM (sesudah)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ date('Y-m-d') }} 10:34:00</td>
                        <td>272</td>
                        <td>356</td>
                        <td>340</td>
                        <td>500</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ date('Y-m-d') }} 11:23:00</td>
                        <td>272</td>
                        <td>356</td>
                        <td>340</td>
                        <td>500</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ date('Y-m-d') }} 20:34:00</td>
                        <td>272</td>
                        <td>356</td>
                        <td>340</td>
                        <td>500</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection