<?php
header("Content-Type: application/json");

$url = "https://www.europapress.es/rss/rss.aspx?ch=00066";
$rss = simplexml_load_file($url);

if (!$rss) {
    echo json_encode(["error" => "No se pudo cargar el RSS"]);
    exit;
}

$noticias = [];

foreach ($rss->channel->item as $item) {
    $noticias[] = [
        "titulo" => (string) $item->title,
        "descripcion" => (string) $item->description,
        "link" => (string) $item->link
    ];
}

echo json_encode($noticias, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
