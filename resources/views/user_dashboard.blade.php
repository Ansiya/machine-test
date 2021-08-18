@extends('layouts.public')

@section('content')

@php
if(isset($_SESSION['us_id']))
{
     $us_id=$_SESSION['us_id'];
}
$userdata=App\Http\Controllers\LoginController::getuserdata($us_id);
@endphp

{{ csrf_field() }}



      <div class="panel-header panel-header-lg">
        
      </div>
      <div class="content">
        <div class="row">
         
          <div class="col-lg-12 col-md-12">
            <div class="card card-chart">
              <div class="card-header">
               <?php $user=App\Models\UserProfile::where('up_user',$us_id)->first(); ?>
                <h2 class="card-title">Hi {{$user->up_first_name}}!!!</h2>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="barChartSimpleGradientsNumbers"></canvas>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
@endsection