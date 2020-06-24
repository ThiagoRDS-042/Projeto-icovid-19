<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="/projeto-icovid-19/view/css/pages/home.css">
    <title>IcóVid-19</title>
</head>

<body>
    <?php
    require_once('view/nav.php');
    ?>
    <main>
        <div id="map"> </div>

        <div class="painel">
            <h1>Painel Covid</h1>
            <p><strong>Icó/CE</strong></p>
        </div>

        <div class="fonte">
            <p>Fonte: <a href="https://www.facebook.com/saudeico/" target="blank">Secretária Municipal de Saúde</a></p>
        </div>

        <div class="container">
            <div class="card card-1">
                <p><strong>Confirmados:</strong></p>
                <p><strong>142</strong></p>
            </div>
            <div class="card card-2">
                <p><strong>Suspeitos:</strong></p>
                <p><strong>42</strong></p>
            </div>
            <div class="card card-3">
                <p><strong>Recuperados:</strong></p>
                <p><strong>66</strong></p>
            </div>
            <div class="card card-4">
                <p><strong>Mortes:</strong></p>
                <p><strong>3</strong></p>
            </div>
        </div>

        <div class="topico">
            <h1>Números de casos por Cidade</h1>
        </div>

        <div class="cidades">
            <p><strong>Icó/CE</strong></p>
            <p><strong>Icó/CE</strong></p>
            <p><strong>Icó/CE</strong></p>
            <p><strong>Icó/CE</strong></p>
            <p><strong>Icó/CE</strong></p>
        </div>

        <div class="fonte">
            <p>Fonte: <a href="#" target="blank">Desconehcido</a></p>
        </div>

        <div class="grafico">
            <div class="progress">
                <div class="progress-bar grafic001" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"> 30.500</div>
            </div>
            <div class="progress">
                <div class="progress-bar grafic002" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">55.000</div>
            </div>
            <div class="progress">
                <div class="progress-bar grafic001" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">75.000</div>
            </div>
            <div class="progress">
                <div class="progress-bar grafic002" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">100.000</div>
            </div>
            <div class="progress">
                <div class="progress-bar grafic001" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">7.500.000</div>
            </div>
        </div>

        <script src="controller/js/mapa/map.js" type="text/javascript"></script>

        <script async defer src="http://maps.googleapis.com/maps/api/js?Key=AIzaSyDM5zICrkNb0o28MMT0G-VmO-XJULdSvu4&callback=initMap" type="text/javascript"></script>
    </main>
    <?php
    require_once('view/footer.php');
    ?>
</body>

</html>