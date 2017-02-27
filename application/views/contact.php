<head>
 <script type="text/javascript" src="js/contact.js"></script>
  <title>Mangala Studio</title>
</head>
 <div class="page-top" id="templatemo_contact">
        </div> <!-- /.page-header -->
        <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>

        <div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-6 map-wrapper">
                        <h3 class="widget-title">Our Location</h3>
                        
                            <div id="map"></div>
    <script>
      $(document).ready(function(){
        initMap();
        function initMap() { 
        var uluru = {lat: 6.358006, lng: 80.918974};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
      });
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCwY3HEdDtrFG9nbeDisgNJNtKGqyO_ddE &callback=initMap">
    </script>

                        <div class="contact-infos">
                            <ul>
                                <li>07 Danduma Junction,Sewanagala</li>
                                <li>Embilipitiya</li>
                                <li>Tel:  071 750 2687</li>
                                <li>Email: <a href="mailto:mangalastudio@hotmail.com">mangalastudio@hotmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6">
                        <h3 class="widget-title">Contact Us</h3>
                        <div class="contact-form">
                            <form name="contactform" id="contactform" action="#" method="post">
                                <p>
                                    <input name="name" type="text" id="name" placeholder="Your Name">
                                </p>
                                <p>
                                    <input name="email" type="text" id="email" placeholder="Your Email"> 
                                </p>
                                <p>
                                    <input name="subject" type="text" id="subject" placeholder="Subject"> 
                                </p>
                                <p>
                                    <textarea name="message" id="message" placeholder="Message"></textarea>    
                                </p>
                                <input type="submit" class="mainBtn" id="submit" value="Send Message">
                            </form>
                        </div> <!-- /.contact-form -->
                    </div>
                </div>
            </div>
        </div>




