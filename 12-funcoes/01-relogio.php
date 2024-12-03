<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data e Hora Atual</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            font-family: Arial, sans-serif;
            color: #ffffff;
        }

        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.3);
            padding: 20px 40px;
            border-radius: 10px; /* Correção: border-radiuns -> border-radius */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .time {
            font-size: 3em;
            font-weight: bold;
            margin: 10px 0;
        }

        .date {
            font-size: 1.5em;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="date" id="current-date"></div>
        <div class="time" id="current-time"></div>
    </div>

    <script>
        // Função para atualizar a data e hora dinamicamente
        function updateDateTime() { // Correção: "funcion" -> "function"
            const now = new Date();
            const optionDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const optionTime = { hour: '2-digit', minute: '2-digit', second: '2-digit' };

            // Formatando data e hora
            document.getElementById('current-date').textContent = now.toLocaleDateString('pt-BR', optionDate);
            document.getElementById('current-time').textContent = now.toLocaleTimeString('pt-BR', optionTime);
        }

        // Atualiza a cada segundo
        setInterval(updateDateTime, 1000);

        // Chamada inicial
        updateDateTime();
    </script>
</body>

</html>
