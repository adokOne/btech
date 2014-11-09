<footer>
  <div class="container footer_top">
    <div class="row">
      <div class="span2">
        <h3><?php echo Kohana::lang("global.info")?></h3>
        <ul>
            <li><a href="<?php echo url::base();?>pages/about"><?php echo Kohana::lang("global.about")?></a></li>
            <li><a href="<?php echo url::base();?>pages/delivery"><?php echo Kohana::lang("global.delivery")?></a></li>
        </ul>
      </div>
      <div class="span2">
        <h3><?php echo Kohana::lang("global.customer_service")?></h3>
        <ul>
            <li><a href="<?php echo url::base();?>contacts"><?php echo Kohana::lang("global.contacts")?></a></li>
            <li><a href="<?php echo url::base();?>feedbacks"><?php echo Kohana::lang("global.feedbacks")?></a></li>
        </ul>
      </div>
      <div class="span2">
        <h3><?php echo Kohana::lang("global.extras")?></h3>
        <ul>
           <!-- <li><a href="<?php echo url::base();?>specials"><?php echo Kohana::lang("global.specials")?></a></li> -->
            <li><a href="<?php echo url::base();?>gifts"><?php echo Kohana::lang("global.gifts")?></a></li>
        </ul>
      </div>
      <div class="span4 contact">
        <h3><?php echo Kohana::lang("global.contacts")?></h3>
        <ul>
        <li><i class="icon-map-marker"></i><?php echo Kohana::lang("global.foter_address")?></li>
        <li class="foot-phone"><i class=" icon-phone"></i><?php echo Kohana::lang("global.foter_phone")?></li>       </ul>
      </div>
      
    </div>
    
  </div>
  <div class="hr"></div>
  <div class="container">
    <div class="row">
      <div class="span12">
        <div id="powered">
          <div class="copyrights">Powered By <a href="https://vk.com/adok_one">adok</a> <span>&copy; 2014</span><!-- [[%FOOTER_LINK]] --></div>
          <ul class="social">           
            <li><a href="http://facebook.com" class="tooltip-2" title="Facebook"><i class=" icon-facebook"></i></a></li>
            <li><a href="http://twitter.com" class="tooltip-2" title="Twitter"><i class=" icon-twitter"></i></a></li>
            <li><a href="http://accounts.google.com" class="tooltip-2" title="Google +"><i class=" icon-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

</div>
</div>
</div>
<div id="prod_template">
  <table class="cart">
  <tr class="first">
    <td class="image">
      <a target="_blank" href="<?php echo url::base()?>item/%id%">
        <img height="70px" width="70px" src="<?php echo url::base()?>upload/goods/%id%/main_pic_home.png">
      </a>
    </td>
   <td class="name">
      <a target="_blank" href="<?php echo url::base()?>item/%id%">%name%</a>
      <div>
      </div>
      <span class="quantity">%count%&nbsp;x</span>
      <span class="total">%price% грн.</span>
      <div class="remove" data-id="%id%">
         <span><i class="icon-remove-sign"></i><?php echo Kohana::lang("global.remove")?></span>
      </div>
   </td>
  </tr>
</table>

</div>
</body></html>