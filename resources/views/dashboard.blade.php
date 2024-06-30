@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Expenses Dashboard</div>

                <div class="card-body">
                    <canvas id="monthlyExpensesChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daily Expenses</div>

                <div class="card-body">
                    <canvas id="dailyExpensesChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
<script>
    var ctxMonthly = document.getElementById('monthlyExpensesChart').getContext('2d');
    var monthlyLabels = {!! $monthlyLabels !!};
    var monthlyData = {!! $monthlyData !!};

    var monthlyExpensesChart = new Chart(ctxMonthly, {
        type: 'line',
        data: {
            labels: monthlyLabels,
            datasets: [{
                label: 'Monthly Expenses',
                data: monthlyData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
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

    var ctxDaily = document.getElementById('dailyExpensesChart').getContext('2d');
    var dailyLabels = {!! $dailyLabels !!};
    var dailyData = {!! $dailyData !!};

    var dailyExpensesChart = new Chart(ctxDaily, {
        type: 'line',
        data: {
            labels: dailyLabels,
            datasets: [{
                label: 'Daily Expenses',
                data: dailyData,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
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
