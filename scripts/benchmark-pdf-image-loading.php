<?php
// Isolated image-loading benchmark. No database writes or official PDF files.
require dirname(__DIR__) . '/vendor/autoload.php';
$app = require dirname(__DIR__) . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$images = glob(public_path('assets/images/basic/crop/*.{jpg,jpeg,png,JPG,JPEG,PNG}'), GLOB_BRACE);
$images = array_slice($images ?: [], 0, 6);
if (count($images) < 2) { fwrite(STDERR, 'Not enough images' . PHP_EOL); exit(1); }
echo 'Images: ' . count($images) . PHP_EOL;
foreach (['remote', 'local'] as $mode) {
  $html = '<html><body>';
  foreach ($images as $path) {
    $url = $mode === 'local' ? 'file://' . $path : asset('assets/images/basic/crop/' . basename($path));
    $html .= '<div style="width:220px;height:150px;background-size:contain;background-repeat:no-repeat;background-image:url(' . htmlspecialchars($url, ENT_QUOTES) . ')"></div>';
  }
  $html .= '</body></html>';
  $start = microtime(true);
  try {
    $pdf = Barryvdh\DomPDF\Facade\Pdf::loadHTML($html);
    $data = $pdf->output();
    printf('%s: %.3f seconds; %d bytes' . PHP_EOL, $mode, microtime(true)-$start, strlen($data));
  } catch (Throwable $e) { fprintf(STDERR, '%s failed: %s' . PHP_EOL, $mode, $e->getMessage()); }
}
