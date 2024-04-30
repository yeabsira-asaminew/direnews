<?php

require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Display the file converter form
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>File Converter</title>
    </head>

    <body>
        <h2>File Converter</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="files[]" multiple required><br><br>
            <button type="submit">Convert</button>
        </form>
    </body>

    </html>
<?php
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the file conversion
    $allowedTypes = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    $uploadErrors = [];
    $filePaths = [];

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_type = $_FILES['files']['type'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $file_error = $_FILES['files']['error'][$key];

        if ($file_error !== UPLOAD_ERR_OK) {
            $uploadErrors[] = "Error uploading $file_name: $file_error";
            continue;
        }

        if (!in_array($file_type, $allowedTypes)) {
            $uploadErrors[] = "Invalid file type for $file_name";
            continue;
        }

        if ($file_size > $maxSize) {
            $uploadErrors[] = "File size exceeds the limit for $file_name";
            continue;
        }

        $file_path = './uploads/' . $file_name;
        move_uploaded_file($tmp_name, $file_path);

        $filePaths[] = $file_path;
    }

    if (!empty($uploadErrors)) {
        echo implode('<br>', $uploadErrors);
        exit;
    }

    $spreadsheet = new Spreadsheet();

    foreach ($filePaths as $key => $file_path) {
        $objReader = IOFactory::createReader('Word2007');
        $objPHPExcel_temp = $objReader->load($file_path);

        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex($key)->setTitle($file_name);
        $spreadsheet->setActiveSheetIndex($key)->fromArray($objPHPExcel_temp->getActiveSheet()->toArray(null, true, true, true));
    }

    $spreadsheet->setActiveSheetIndex(0);

    $filename = 'converted_file.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $objWriter = new Xlsx($spreadsheet);
    $objWriter->save('php://output');
} else {
    // Invalid request method
    http_response_code(405);
    echo 'Invalid request method';
}
