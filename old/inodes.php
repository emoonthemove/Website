<?php
function countInodes($dir) {
    $fileCount = 0;
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)
    );
    foreach ($iterator as $file) {
        $fileCount++;
    }
    return $fileCount;
}
$publicHtmlDir = realpath('/home/kaboombg/'); // Променя се само директорията
if ($publicHtmlDir === false) {
    echo "Директорията public_html не е намерена.";
} else {
    echo "Общ брой файлове и директории в public_html: " . countInodes($publicHtmlDir);
}
?>