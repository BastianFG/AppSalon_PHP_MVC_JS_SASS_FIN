<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100%;
            display: flex;
            flex-direction: column;
            background-color: #1a1b15;
            font-family: "Poppins", sans-serif;
        }
        h1 {
        display: block;
        font-size: em;
        margin-block-start: 0.67em;
        margin-block-end: 0.67em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
        unicode-bidi: isolate;
        }

        h3 {
    display: block;
    font-size: 3em;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    unicode-bidi: isolate;
}
        .dashboard-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin: 15px;
            text-align: center;
            background-color: #1e1e1e;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dashboard-card h3 {
            margin-bottom: 15px;
        }
        .dashboard-card .btn {
            width: 100%;
        }
        .total {
            font-weight: bold;
        }
        .boton-eliminar {
            background-color: red;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .panel-admin {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .panel-admin > div {
            flex: 1 1 30%;
            margin: 10px;
        }
        .boton {
        background-color: #0da6f3;
        padding: 1.5rem 4rem;
        color: #fff;
        margin-top: 2rem;
        font-size: 2rem;
        font-weight: 400;
        display: inline-block;
        font-weight: 700;
        border: none;
        transition-property: background-color;
        transition-duration: .3s;
        text-align: center;
        display: block;
        width: 100%;
        margin: 5rem 0;
        }
        @media(min-width: 768px) {
            .boton {
         width: 292px;
        }
    }
        .boton:hover {
            background-color: #0984c1;
        }
        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Panel de Administración</h1>

        <?php include_once __DIR__ . '/../templates/barra.php'; ?>

        <h2 class="mt-5">Servicios solicitados en el mes</h2>
        <div class="chart-container">
            <canvas id="serviciosChart"></canvas>
        </div>

        <h2 class="mt-5">Días de la semana más frecuentes para citas</h2>
        <div class="chart-container">
            <canvas id="diasChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const servicios = <?php echo json_encode($servicios); ?>;
            const diasConteo = <?php echo json_encode($diasConteo); ?>;
            const diasSemana = <?php echo json_encode($diasSemana); ?>;

            // Servicios Chart
            const serviciosCtx = document.getElementById('serviciosChart').getContext('2d');
            new Chart(serviciosCtx, {
                type: 'bar',
                data: {
                    labels: servicios.map(s => s.nombre),
                    datasets: [{
                        label: 'Cantidad',
                        data: servicios.map(s => s.cantidad),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#ffffff'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.2)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#ffffff'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.2)'
                            }
                        }
                    }
                }
            });

            // Días Chart
            const diasCtx = document.getElementById('diasChart').getContext('2d');
            new Chart(diasCtx, {
                type: 'bar',
                data: {
                    labels: Object.keys(diasConteo).map(dia => diasSemana[dia]),
                    datasets: [{
                        label: 'Cantidad',
                        data: Object.values(diasConteo),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#ffffff'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.2)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#ffffff'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.2)'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
