<!DOCTYPE html>
<html>

<head>
    <title>File Converter</title>
</head>

<body>
    <h2>File Converter</h2>
    <form action="<?php echo site_url('fileconverter/convert'); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple required><br><br>
        <button type="submit">Convert</button>
    </form>
</body>

</html>