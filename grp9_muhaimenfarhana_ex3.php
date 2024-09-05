<?php
$filename = "example.txt";
$additionalContent = "Additional content added.";

if (file_exists($filename)) {
    echo "File exists.<br>";

    $fileContents = file_get_contents($filename);
    echo "File contents:<br>$fileContents<br>";

    if (strpos($fileContents, $additionalContent) === false) {
        $newContent = $fileContents . "<br>" . $additionalContent;
        file_put_contents($filename, $newContent);
        echo "File updated.<br>";
    } else {
        echo "Content already added.<br>";
    }

    echo "Updated file contents:<br>" . file_get_contents($filename) . "<br>";

    $fileLines = file($filename);
    echo "File lines:<br>";
    foreach ($fileLines as $lineNumber => $lineContent) {
        echo "Line $lineNumber: $lineContent";
    }
} else {
    $initialContent = "This is the initial content of the file.";
    file_put_contents($filename, $initialContent);
    echo "The file $filename has been created with initial content.\n";
}
?>
