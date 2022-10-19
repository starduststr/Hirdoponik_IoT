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
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">pH</p>
                    <h6 class="mb-0">7372</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">TDS</p>
                    <h6 class="mb-0">871</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection