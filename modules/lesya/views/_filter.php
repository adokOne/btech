<section id="layered_block_left" class="block">
   <h4 class="title_block"><?php echo $lang["catalog"]?></h4>
   <div class="block_content">
      <form action="<?php echo url::base().url::current();?>" id="layered_form">
         <div>
            <div class="layered_filter">
               <div class="layered_subtitle_heading">
                  <span class="layered_subtitle"><?php echo $lang["size"]?></span>
               </div>
               <ul id="ul_layered_manufacturer_0" class="col-lg-12 layered_filter_ul">
                  <?php foreach($sizes as $size):?>
                     <li class="nomargin hiddable col-lg-12">
                        <div class="checker" id="uniform-layered_manufacturer_<?php echo $size->id?>">
                           
                              <input type="checkbox"  <?php echo isset($_GET["size"]) && isset($_GET["size"][$size->id]) ? "checked" : ""?> class="checkbox" name="size[<?php echo $size->id?>]" id="layered_manufacturer_<?php echo $size->id?>" value="<?php echo $size->id?>" />
                     
                        </div>
                        <label for="layered_manufacturer_<?php echo $size->id?>">
                           <a href="#" rel="nofollow"><?php echo $size->name?></a>
                        </label>
                     </li>
                  <?php endforeach;?>
               </ul>
            </div>
            <div class="layered_filter">
               <div class="layered_subtitle_heading">
                  <span class="layered_subtitle"><?php echo $lang["rukav_dlina"]?></span>
               </div>
               <ul id="ul_layered_manufacturer_0" class="col-lg-12 layered_filter_ul">
                  <?php foreach(ORM::factory("rukav")->find_all() as $size):?>
                     <li class="nomargin hiddable col-lg-12">
                        <div class="checker" id="uniform-layered_manufacturer_<?php echo $size->id?>">
                           
                              <input type="checkbox"  <?php echo isset($_GET["rukav"]) && isset($_GET["rukav"][$size->id]) ? "checked" : ""?> class="checkbox" name="rukav[<?php echo $size->id?>]" id="layered_manufacturer_<?php echo $size->id?>" value="<?php echo $size->id?>" />
                     
                        </div>
                        <label for="layered_manufacturer_<?php echo $size->id?>">
                           <a href="#" rel="nofollow"><?php echo $size->name()?></a>
                        </label>
                     </li>
                  <?php endforeach;?>
               </ul>
            </div>
            <div class="layered_filter">
               <div class="layered_subtitle_heading">
                  <span class="layered_subtitle"><?php echo $lang["colors"]?></span>
               </div>
               <ul id="ul_layered_manufacturer_0" class="col-lg-12 layered_filter_ul">
                  <?php foreach(ORM::factory("color")->find_all() as $size):?>
                     <li class="nomargin hiddable col-lg-12">
                        <div class="checker" id="uniform-layered_manufacturer_<?php echo $size->id?>">
                           
                              <input type="checkbox"  <?php echo isset($_GET["color"]) && isset($_GET["color"][$size->id]) ? "checked" : ""?> class="checkbox" name="color[<?php echo $size->id?>]" id="layered_manufacturer_<?php echo $size->id?>" value="<?php echo $size->id?>" />
                     
                        </div>
                        <label for="layered_manufacturer_<?php echo $size->id?>">
                           <a href="#" rel="nofollow"><?php echo $size->name()?></a>
                        </label>
                     </li>
                  <?php endforeach;?>
               </ul>
            </div>
            <div class="layered_filter">
               <div class="layered_subtitle_heading">
                  <span class="layered_subtitle"><?php echo $lang["types"]?></span>
               </div>
               <ul id="ul_layered_manufacturer_0" class="col-lg-12 layered_filter_ul">
                  <?php foreach(ORM::factory("type")->find_all() as $size):?>
                     <li class="nomargin hiddable col-lg-12">
                        <div class="checker" id="uniform-layered_manufacturer_<?php echo $size->id?>">
                           
                              <input type="checkbox"  <?php echo isset($_GET["type"]) && isset($_GET["type"][$size->id]) ? "checked" : ""?> class="checkbox" name="type[<?php echo $size->id?>]" id="layered_manufacturer_<?php echo $size->id?>" value="<?php echo $size->id?>" />
                     
                        </div>
                        <label for="layered_manufacturer_<?php echo $size->id?>">
                           <a href="#" rel="nofollow"><?php echo $size->name()?></a>
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

                  <li style="cursor: pointer;" class="nomargin  layered_list" onclick="$('#layered_price_range_min').val(0);$('#layered_price_range_max').val(50);$(this).parents('form').submit();">
                     - <?php echo sprintf($lang["price_from_to"],0,$active_currency,50,$active_currency);?>
                  </li>
                  <li style="cursor: pointer;" class="nomargin  layered_list" onclick="$('#layered_price_range_min').val(50);$('#layered_price_range_max').val(100);$(this).parents('form').submit();">
                     - <?php echo sprintf($lang["price_from_to"],50,$active_currency,100,$active_currency);?>
                  </li>
                  <li style="cursor: pointer;" class="nomargin  layered_list" onclick="$('#layered_price_range_min').val(100);$('#layered_price_range_max').val(150);$(this).parents('form').submit();">
                     - <?php echo sprintf($lang["price_from_to"],100,$active_currency,150,$active_currency);?>
                  </li>
                  <li style="cursor: pointer;" class="nomargin  layered_list" onclick="$('#layered_price_range_min').val(150);$('#layered_price_range_max').val(500);$(this).parents('form').submit();">
                     - <?php echo sprintf($lang["price_from_to"],150,$active_currency,500,$active_currency);?>
                  </li>
                  <li style="display: none;">
                     <input name="price_min" class="layered_price_range" id="layered_price_range_min" type="hidden" value="20">
                     <input name="price_max" class="layered_price_range" id="layered_price_range_max" type="hidden" value="82">
                  </li>
               </ul>
            </div>
         </div>
      </form>
   </div>
   <div id="layered_ajax_loader" style="display: none;">
      <p>
         <img src="/img/loader.gif" alt="">
         <br>Loading...
      </p>
   </div>
</section>