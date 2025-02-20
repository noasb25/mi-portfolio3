<?php
$rss_url = "https://www.europapress.es/rss/rss.aspx?ch=00066";
$rss = simplexml_load_file($rss_url);

if (!$rss) {
    die("Error cargando el feed RSS");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias RSS</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Últimas Noticias de EuropaPress</h1>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Noticia</th>
                        <th>Descripción</th>
                        <th>Enlace</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rss->channel->item as $item): ?>
                        <tr>
                            <td><?php echo $item->title; ?></td>
                            <td><?php echo $item->description; ?></td>
                            <td><a href="<?php echo $item->link; ?>" target="_blank" class="link-noticia">Leer más</a></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="3" class="volver-inicio">
                            <a href="../index.php" class="btn-volver">Volver al inicio</a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> - Proyecto UT7 | Actividad 2</p>
        </footer>
    </div>
</body>
</html>
