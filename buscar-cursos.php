<?php 

require 'vendor/autoload.php';

use Maxleme\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);

//debug: seguindo o exemplo proposto na aula o terminal não esta trazendo as informações, então gerei o html para verificar o q o request esta trazendo 
//file_put_contents('alura.html', $html);

$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso. PHP_EOL;
}