@extends('layout.dashboardLayout')

@section('title', 'Dashboard')

@section('nav_dashboard', 'active')

@section('page', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Portofolio</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $totalPortofolio }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection