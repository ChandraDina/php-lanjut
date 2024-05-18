<?php
$filelist = glob('gambar/*');
foreach ($filelist as $filename) {
    if (is_file($filename)) {
        echo $filename, '<br>';
    }
}