<?php
function download($path = '.')
{
    $directory = @dir($path) or die('Brak dostępu do katalogu.');

    while ($file_or_dir = $directory->read()) {
        if (is_file($path . '/' . $file_or_dir)) {
            echo '<a href="' . $path . '/' . $file_or_dir . '">' . $file_or_dir . '</a><br />';
        } elseif (is_dir($path . '/' . $file_or_dir)) {
            $subdirectory = urlencode($path . '/' . $file_or_dir);
            echo '<a href="DirTrav.php?patch=' . $subdirectory . '">' . $file_or_dir . '</a><br />';
        }
    }

    $directory->close();
}

if (!isset($_GET['patch'])) {
    download();
} else {
    $cleaned_path = str_replace('..', '', $_GET['patch']);
    download($cleaned_path);
}
?>