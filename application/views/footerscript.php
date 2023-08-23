<!-- Vendor JS -->
<script data-cfasync="false" src="<?php echo base_url(); ?>../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-3.11.2.min.js"></script>

<!--Plugins JS-->
<script src="<?php echo base_url(); ?>assets/js/plugins/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/countdownTimer.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/scrollup.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery.zoom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/slick.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/infiniteslidev2.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery.sticky-sidebar.js"></script>

<!-- Main Js -->
<script src="<?php echo base_url(); ?>assets/js/vendor/index.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/set.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/qrcode.js" type="text/javascript"></script>
<script src="<?php echo base_url (); ?>admin_assets/bower_components/bootstrap/js/dist/alert.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notify.js" type="text/javascript"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-624ea8b9c225af99"></script>
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="5ea96142-9753-4431-8bda-924c73213501";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_transla.te_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>



                        $("#qrcode").html("");
                        var txt = $.trim($('input[name="qrvalue"]').val());
                        generateQRcode('125', '125', txt);
                        
                    function generateQRcode(width, height, text) {
                        $('#qrcode').qrcode({width: width, height: height, text: text});
                    }


            </script>
            
            
            
<script>
  //voice to text convert
    
  function startDictation() {
 
    if (window.hasOwnProperty('webkitSpeechRecognition')) {
 
      var recognition = new webkitSpeechRecognition();
 
      recognition.continuous = false;
      recognition.interimResults = false;
 
      recognition.lang = "en-US";
      recognition.start();
 
      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
      };
 
      recognition.onerror = function(e) {
        recognition.stop();
      }
 
    }
  }
</script>

<!--google captcha link-->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
        </script>

<!--google captcha code-->
<script type="text/javascript">
      var verifyCallback = function(response) {
       
      };
      var onloadCallback = function() {
        
        widgetId1 = grecaptcha.render('example1', {
          'sitekey' : '<?php echo CAPTCHA_SITE_KEY; ?>',
          'callback' : verifyCallback,
          'theme' : 'light'
        });
      };
    </script>