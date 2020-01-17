<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Gráfico com Chart.js</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

    <?php
    //Simulação de dados
    $dataDb = array(
        array('nome' => 'Caio', 'faltas' => 8),
        array('nome' => 'Henrique', 'faltas' => 4),
        array('nome' => 'João', 'faltas' => 1),
        array('nome' => 'José', 'faltas' => 0),
        array('nome' => 'Paulo', 'faltas' => 20),
        array('nome' => 'Jorge', 'faltas' => 13),
        array('nome' => 'Carlos', 'faltas' => 15),
        array('nome' => 'Júlio', 'faltas' => 11)
    );

    //Cores do gráfico
    $colors = array(
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(200, 72, 221, 0.2)',
        'rgba(89, 58, 12, 0.2)',
        'rgba(183, 162, 127, 0.2)'
    );

    //Array de labels
    $labels = array();

    //Preenchendo os labels com os nomes dos alunos
    foreach ($dataDb as $item) {
        array_push($labels, $item['nome']);
    }

    //Array de dados
    $dataGraphic = array();

    //Preenchendo os dados do gráfico, que são o número de faltas dos alunos
    foreach ($dataDb as $item) {
        array_push($dataGraphic, $item['faltas']);
    }

    ?>

    <canvas id="myChart"></canvas>
    <script src="package/dist/Chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: '# faltas',
                    data: <?php echo json_encode($dataGraphic); ?>,
                    backgroundColor: <?php echo json_encode($colors); ?>,
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                layout: {
                    padding: {
                        left: 200,
                        right: 200,
                        top: 10,
                        bottom: 100
                    }
                }
            }
        });
    </script>
</body>

</html>