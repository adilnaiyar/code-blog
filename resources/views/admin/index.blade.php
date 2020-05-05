@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<!-- Content Row -->
<div class="row">
  <!-- users -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h5>Users</h5></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countUser}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Posts -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h5>Posts</h5></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countPost}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- category -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><h5>Category</h5></div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countCategories}}</div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--comments -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h5>Comments</h5></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countComment}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Content Row -->
<div class="row">
  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">CodeHacking Overview</h6>
      </div>
      <div class="card-body">
        <div class="chart-bar">
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>
  </div>
  <!-- Pie Chart -->
  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">CodeHacking Sources</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="myPieChart"></canvas>
        </div>
        <div class="mt-4 text-center small">
          <span class="mr-2">
            <i class="fas fa-circle text-primary"></i> Users
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Posts
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-info"></i> Comments
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@include("includes.chart")