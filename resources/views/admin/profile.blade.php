@extends('layouts.adminApp')

@section('content')

<div class="container-fluid"> 
  <h1 class="text-center my-4">RFP System Dashboard</h1> 
  <div class="row"> 
    <div class="col-md-6"> 
      <h3 class="text-center">Proposals by Solution</h3> 
      <table class="table table-bordered"> 
        <thead> 
          <tr> 
            <th>Solution</th> 
            <th>Total Proposals</th> 
          </tr> 
        </thead> 
        <tbody> 
          @foreach ($solutions as $solution)
          <tr> 
            <td>{{$solution->name}}</td> 
            <td>{{$solution->user->presales_tickets_count}}</td> 
          </tr> 
          @endforeach
          
        </tbody> 
      </table> 
    </div> 
    <div class="col-md-6"> 
      <h3 class="text-center mb-4">Proposal Status</h3> 
      <div class="row"> 
        <div class="col-md-6"> 
          <div class="card bg-info mb-3"> 
            <div class="card-header text-white">Pending Proposals</div> 
            <div class="card-body"> 
              <h5 class="card-title">{{$pending_proposals}}</h5> 
            </div> 
          </div> 
        </div> 
        <div class="col-md-6"> 
          <div class="card bg-success mb-3"> 
            <div class="card-header text-white">Completed Proposals</div> 
            <div class="card-body"> 
              <h5 class="card-title">{{$complated_proposals}}</h5> 
            </div> 
          </div> 
        </div> 
      </div> 
      <h3 class="text-center">Proposals by Month</h3>
      <canvas id="proposalChart"></canvas>
    </div> 
  </div> 
</div> 


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    
var ctx = document.getElementById('proposalChart').getContext('2d');
var proposalChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Number of Requests',
            data: <?php echo json_encode($requestCounts); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            pointRadius: 3,
            pointBackgroundColor: 'rgba(54, 162, 235, 1)',
            pointBorderColor: '#fff',
            pointHoverRadius: 5,
            pointHoverBackgroundColor: 'rgba(54, 162, 235, 1)',
            pointHoverBorderColor: 'rgba(220, 220, 220, 1)',
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
  </script>

@endsection