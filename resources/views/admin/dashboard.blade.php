<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AgriSoko Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="text-center mb-4">📊 AgriSoko Admin Dashboard</h2>

    <div class="row mb-4">
        @foreach ($loanStats as $stat)
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-capitalize">{{ $stat->status }}</h5>
                    <p class="card-text">Loans: <strong>{{ $stat->total }}</strong></p>
                    <p class="card-text">Total Amount: <strong>Ksh {{ number_format($stat->total_amount) }}</strong></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <canvas id="loanChart"></canvas>
</div>

<script>
    const ctx = document.getElementById('loanChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($loanStats->pluck('status')) !!},
            datasets: [{
                label: 'Loan Distribution',
                data: {!! json_encode($loanStats->pluck('total')) !!},
                backgroundColor: ['#007bff', '#ffc107', '#28a745', '#dc3545'],
            }]
        }
    });
</script>

</body>
</html>
