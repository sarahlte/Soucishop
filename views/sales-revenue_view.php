<?php 
require "./controllers/graph_controller.php";
?>
<div class="container graph-log">
    <div class='revenu'>
        <div class="revenus-display">
            <p>Chiffre d'affaire de la semaine : <?= $ca_semaine?> €</p>
            <p>Bénéfice de la semaine : <?= $benef_semaine?> €</p>
        </div>
        <div>
        <canvas id="myChart"></canvas>
        </div>
        <div>
            <canvas id="myChart2"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const ctx2 =document.getElementById('myChart2');

        console.log(<?php echo json_encode($datas_v); ?>)
        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: <?= json_encode($date) ?>,
            datasets: [{
                label: "Chiffre d'affaire par jour",
                data: <?php echo json_encode($datas_v)?>,
                borderWidth: 1,
            }, 
            {
                label: "Benefice par jour",
                data: <?php echo json_encode($datas_b)?>,
                borderWidth: 1,
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
        console.log(<?= json_encode($datas_bs)?>)
        new Chart(ctx2, {
            type: 'line',
            data: {
            labels: <?= json_encode($date) ?>,
            datasets: [{
                label: "Meilleures ventes par jour",
                data: <?php echo json_encode($datas_bs)?>,
                borderWidth: 1,
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
</div>