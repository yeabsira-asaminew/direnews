<!-- File: application/views/upload_form.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Upload Docx Files</title>
</head>

<body>
    <?php echo form_open_multipart('docxtoexcel/do_upload'); ?>
    <input type="file" name="userfile" multiple />
    <input type="submit" value="Upload" />
    </form>
</body>

</html>