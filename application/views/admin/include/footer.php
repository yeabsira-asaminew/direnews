html
<footer style="background-color: #f2f2f2; padding: 20px;">
    <div class="footer-container" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="contact-info" style="display: flex; align-items: center;">
            <div class="phone" style=" margin-right: 20px;">
                <i class="fas fa-phone" style="margin-right: 5px;"></i>
                <span>Phone: <?php echo $phone_number; ?></span>
            </div>
            <div class="email" style=" margin-right: 20px;">
                <i class="fas fa-envelope" style="margin-right: 5px;"></i>
                <span>Email: <?php echo $email_address; ?></span>
            </div>
            <div class="location" style=" margin-right: 20px;">
                <i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i>
                <span>Location: <?php echo $location_address; ?></span>
            </div>
        </div>
        <div id="map" width: 300px; height: 200px;></div>
    </div>
</footer>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 37.7749,
                lng: -122.4194
            },
            zoom: 12
        });
    }
</script>