<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dire News | Contact Us</title>

    <link rel="icon" type="image/x-icon" href="assets/images/logo.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <style>
        .map-container {
            height: 400px;
            position: relative;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
</head>
<header>
    <?php include APPPATH . 'views/includes/contact_header.php'; ?>
</header>

<body>
    <br>
    <br>
    <br>
    <br>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <br>
                <h2><?php echo $this->lang->line('Social_Media'); ?></h2>
                <p><i class="fas fa-map-marker-alt"></i><?php echo $this->lang->line('Address'); ?></p>
                <p><i class="fas fa-phone-alt"></i> +251 *****</p>
                <p><i class="fas fa-envelope"></i> info@example.com</p>
                <p><i class="fas fa-clock"></i> <?php echo $this->lang->line('Working_Date'); ?></p>
            </div>
            <!--
            <div class="col-md-6">
                <br>
                <h2><?php echo $this->lang->line('Contact_Message'); ?></h2>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label"><?php echo $this->lang->line('Full_Name'); ?></label>
                        <input type="text" class="form-control" id="name" placeholder="<?php echo $this->lang->line('Enter_Name'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><?php echo $this->lang->line('Email'); ?></label>
                        <input type="email" class="form-control" id="email" placeholder="<?php echo $this->lang->line('Enter_Email'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label"><?php echo $this->lang->line('Contact_Message'); ?></label>
                        <textarea class="form-control" id="message" rows="5" placeholder="<?php echo $this->lang->line('Enter_Message'); ?>"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('Send_Message'); ?></button>
                </form>
            </div>
        </div>
    -->
            <div class="row mt-5">
                <div class="col">
                    <h2><?php echo $this->lang->line('Location'); ?></h2>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15763.123456789!2d41.8582734!3d9.5862996!3m2!1i1024!2i768!4f13.1!4m3!3e2!4m0!4m0!5e0!3m2!1sen!2sus!4v1634167890123!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <br>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
<?php include APPPATH . 'views/includes/footer.php'; ?>

</html>