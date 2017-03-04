<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    echo error_helper::check_errors();
    $base_url = CI_BASE_URL;
    
?>
    <div class='modal fade' id='jqmRateUsModal' role='dialog' aria-labelledby='jqmRateUsModal' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                    <h4 class='modal-title popup-title' id='modalMessageTitle'>
                        Rate Us
                    </h4>
                </div>
                <div class='modal-body' id='modalMessageBody'>
                    <label for="input-7-xs" class="control-label input-rate">Quality of Service</label>
                    <input id="input-7-xs" class="rating rating-loading" value="1" data-min="0" data-max="5" data-step="0.5" data-size="xs"><hr/>
                    
                    <label for="input-7-xs" class="control-label input-rate">Response Time</label>
                    <input id="input-7-xs" class="rating rating-loading" value="1" data-min="0" data-max="5" data-step="0.5" data-size="xs"><hr/>
                    
                    <label for="input-7-xs" class="control-label input-rate">Likeliness to retain our service</label>
                    <input id="input-7-xs" class="rating rating-loading" value="1" data-min="0" data-max="5" data-step="0.5" data-size="xs"><hr/>
                </div>
            </div>
        </div>
    </div>
    <div class='modal fade' id='jqmLogCallModal' role='dialog' aria-labelledby='jqmLogCallModal' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                    <h4 class='modal-title popup-title' id='modalMessageTitle'>Log a call</h4>
                </div>
                <div class='modal-body' id='modalMessageBody'>
                    <form class="form-inline">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-toolbar">
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-default btn-sm" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row height-10"></div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="input-label">Label</label>
                                    <input class="form-control input-sm" type="text" required="" autofocus="">
                                </div>
                            </div>
                    </form>
                </div>
                <div class='modal-footer'>
                    <!--<button type='button' class='btn btn-default btn-sm' data-dismiss='modal'>Close</button>--> 
                </div>
            </div>
        </div>
    </div>
    <div class='modal fade' id='jqmContactUsModal' role='dialog' aria-labelledby='jqmContactUsModal' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                    <h4 class='modal-title popup-title' id='modalMessageTitle'>Contact Us</h4>
                </div>
                <div class='modal-body' id='modalMessageBody'></div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'>Close</button> 
                </div>
            </div>
        </div>
    </div>
</body>
        <!-- Bootstrap core JavaScript
    ================================================== -->

    <script src="<?php echo $base_url; ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- JavaScripts -->
    <script src="<?php echo $base_url; ?>assets/js/services/jquery.easypiechart.min.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/carousel/jquery.bxslider.min.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/portfolio/grid.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/parallax/jquery.parallax-1.1.3.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/parallax/jquery.localscroll-1.2.7-min.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/parallax/jquery.scrollTo-min.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/ambixo.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/components.js"></script>
    

    <script>
      $('.easy-pie-chart').easyPieChart({
        animate: 2000,
        scaleColor: false,
        lineWidth: 20,
        lineCap: 'square',
        size: 180,
        trackColor: '#3e383a',
        barColor: '#D0C5BF',
      });
    </script>

    <!-- IMPORTANT: If you don't use Google Map, delete these two scripts to gain more speed -->
<!--    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script> 
      function initialize() {
        var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
        var mapOptions = {
          zoom: 4,
          center: myLatlng,
          scrollwheel: false 
        }
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Here I Am!'
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>-->

  </body>
</html>