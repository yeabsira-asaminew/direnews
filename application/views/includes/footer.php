<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
</head>

<footer class="bg-black text-light">
    <style>
        .list-inline-item i {
            font-size: 24px;
            color: white;

            /* Set the icon color to white */
            transition: color 0.3s;
            /* Add a transition effect for smooth color change */
        }

        .list-inline-item i:hover {
            color: grey;
            /* Change the icon color to grey on hover */
        }
    </style>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <h5><?php echo $this->lang->line('About'); ?></h5>
                <p><?php echo $this->lang->line('Info'); ?></p1>
            </div>
            <div class="col-md-4">
                <h3><?php echo $this->lang->line('Social_Media'); ?></h3>
                <ul class="list-inline">
                    <li ... ... class="list-inline-item"><a href="https://m.facebook.com/profile.php?id=118379761271367" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCse-IYatGVTzXoKjwgQGE5w" target="_blank"><i class="fa fa-youtube"></i></a></li>

                    <li class="list-inline-item"><a href="https://twitter.com/diretvnews" target="_blank"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5><?php echo $this->lang->line('Contact'); ?></h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt"></i><?php echo $this->lang->line('Address'); ?></li>
                    ... ... <li><i class="fas fa-phone-alt"></i> +251 ********</li>
                    <li><i class="fas fa-envelope"></i> info@example.com</li>
                </ul>
            </div>
        </div>
        <hr>
        <div ... ... class="row">
            <div class="col-md-6">
                <p><?php echo $this->lang->line('Address'); ?></p>
            </div>
        </div>
    </div>
</footer>