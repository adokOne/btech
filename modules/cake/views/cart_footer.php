
  <div class="corner bottom"></div>
  <section class="delivery">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-1 col-md-6 col-sm-6 col-xs-12">
          <div class="row shipping">
            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
              <img src="/img/front/ship.png" alt=".">
            </div>
            <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12">
              <div class="info_text">
                <p><?php echo Kohana::lang("global.dostavka")?></p>
                <p><?php echo Kohana::lang("global.po_kievu")?></p>
                <p class="tel"><?php echo Kohana::lang("global.site_phone")?></p>
                <p class="mail"><?php echo Kohana::lang("global.site_mail")?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-6 col-xs-12">
          <div class="row pack">
            <div class="col-lg-5 col-lg-offset-1 col-md-6 col-sm-6 col-xs-12">
              <img src="/img/front/pack.png" alt=".">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="info_text"> 
                <p><?php echo Kohana::lang("global.pack")?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="toTop" style=""></div>


  <!-- JavaScript -->

  <!--[if lt IE 9]>
    <script>
        var e = ("article,aside,figcaption,figure,footer,header,hgroup,nav,section,time").split(',');
      for (var i = 0; i < e.length; i++) {
          document.createElement(e[i]);
        }
    </script>
  <![endif]-->
  
  <script>
    $(document).ready(function(){
        $( "#datepicker" ).datepicker({
          showOtherMonths: true,
          minDate:0
        });

        $('.radio').iCheck({
          cursor: true
        });
          $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('.hideme').each( function(i){
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},500);
                    
            }
            
        }); 
    
    });

        $("body").niceScroll({
          cursorcolor:"#b61f2f",
          cursorwidth: "15px",
          cursorborder: "none",
          cursorborderradius: "10px"
        });

 
      $(window).scroll(function() {
        if($(this).scrollTop() != 0) {
          $('#toTop').fadeIn();
        } else {
          $('#toTop').fadeOut();
        }
      });
      $('#toTop').click(function() {
        $('body,html').animate({scrollTop:0},800);
      });

    });
  </script>
  
</body>
</html>