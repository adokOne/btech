<section id="layered_block_left" class="block">
   <h4 class="title_block"><?php echo $lang["catalog"]?></h4>
   <div class="block_content">
      <form action="#" id="layered_form">
         <div>
            <div class="layered_filter">
               <div class="layered_subtitle_heading">
                  <span class="layered_subtitle"><?php echo $lang["size"]?></span>
               </div>
               <ul id="ul_layered_manufacturer_0" class="col-lg-12 layered_filter_ul">
                  <?php foreach($sizes as $size):?>
                     <li class="nomargin hiddable col-lg-12">
                        <div class="checker" id="uniform-layered_manufacturer_<?php echo $size->id?>">
                           
                              <input type="checkbox" class="checkbox" name="layered_manufacturer_<?php echo $size->id?>" id="layered_manufacturer_<?php echo $size->id?>" value="<?php echo $size->id?>" />
                     
                        </div>
                        <label for="layered_manufacturer_<?php echo $size->id?>">
                           <a href="#" rel="nofollow"><?php echo $size->name?></a>
                        </label>
                     </li>
                  <?php endforeach;?>
               </ul>
            </div>
            <div class="layered_price" style="">
               <div class="layered_subtitle_heading">
                  <span class="layered_subtitle"><?php echo $lang["price"]?></span>
               </div>
               <ul id="ul_layered_price_0" class="col-lg-12 layered_filter_ul">

                  <li style="cursor: pointer;" class="nomargin  layered_list" onclick="$('#layered_price_range_min').val(0);$('#layered_price_range_max').val(50);reloadContent();">
                     - <?php echo sprintf($lang["price_from_to"],0,$active_currency,50,$active_currency);?>
                  </li>
                  <li style="cursor: pointer;" class="nomargin  layered_list" onclick="$('#layered_price_range_min').val(50);$('#layered_price_range_max').val(100);reloadContent();">
                     - <?php echo sprintf($lang["price_from_to"],50,$active_currency,100,$active_currency);?>
                  </li>
                  <li style="cursor: pointer;" class="nomargin  layered_list" onclick="$('#layered_price_range_min').val(100);$('#layered_price_range_max').val(150);reloadContent();">
                     - <?php echo sprintf($lang["price_from_to"],100,$active_currency,150,$active_currency);?>
                  </li>
                  <li style="cursor: pointer;" class="nomargin  layered_list" onclick="$('#layered_price_range_min').val(150);$('#layered_price_range_max').val(500);reloadContent();">
                     - <?php echo sprintf($lang["price_from_to"],150,$active_currency,500,$active_currency);?>
                  </li>
                  <li style="display: none;">
                     <input class="layered_price_range" id="layered_price_range_min" type="hidden" value="20">
                     <input class="layered_price_range" id="layered_price_range_max" type="hidden" value="82">
                  </li>
               </ul>
            </div>
         </div>
         <input type="hidden" name="id_category_layered" value="42">
      </form>
   </div>
   <div id="layered_ajax_loader" style="display: none;">
      <p>
         <img src="http://livedemo00.template-help.com/prestashop_51239/img/loader.gif" alt="">
         <br>Loading...
      </p>
   </div>
</section>