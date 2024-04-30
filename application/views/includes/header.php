<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <style>
                .logo {
                    height: 40px;
                    width: auto;
                }
            </style>
            <a href="<?php echo site_url('Welcome'); ?>">
                <img src="assets/images/logo.png" alt="DDMM" class="logo">
            </a>
            <a class="navbar-brand" href="<?php echo site_url('Welcome'); ?>"> <?php echo $this->lang->line('Dire_News'); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Welcome'); ?>"><?php echo $this->lang->line('Home'); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Contact_us'); ?>"><?php echo $this->lang->line('Contact'); ?></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $this->lang->line('Language'); ?></a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="<?php echo site_url("Welcome/switchLang/english"); ?>">English</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url("Welcome/switchLang/amharic"); ?>">አማርኛ</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url("Welcome/switchLang/oromo"); ?>">Afaan Oromoo</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url("Welcome/switchLang/somali"); ?>">Af Somali</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Rest of your page content goes here -->

</body>

</html>