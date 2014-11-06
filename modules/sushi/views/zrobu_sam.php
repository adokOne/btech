<?php include Kohana::find_file("views","header");?>

<section>
   <div id="container">
   <p id="back-top"> <a href="#top"><span></span></a> </p>
   <div class="container">
      <?php include Kohana::find_file("views","notify");?>
      <div class="row">
         <div class="span12">
            <div class="row">
               <div class="span9  " id="content">
                  <script type="text/javascript">
                     if ($('.container').width() > 480) {
                       (function($){$.fn.equalHeights=function(minHeight,maxHeight){tallest1=(minHeight)?minHeight:0;this.each(function(){if($(this).height()>tallest1){tallest1=$(this).height()}});if((maxHeight)&&tallest1>maxHeight)tallest1=maxHeight;return this.each(function(){$(this).height(tallest1)})}})(jQuery)
                     $(window).load(function(){
                       if($(".maxheight-feat1").length){
                       $(".maxheight-feat1").equalHeights()}
                     });
                     };
                  </script>
                  <script type="text/javascript">
                     if ($('.container').width() > 723) {
                       (function($){$.fn.equalHeights=function(minHeight,maxHeight){tallest=(minHeight)?minHeight:0;this.each(function(){if($(this).height()>tallest){tallest=$(this).height()}});if((maxHeight)&&tallest>maxHeight)tallest=maxHeight;return this.each(function(){$(this).height(tallest)})}})(jQuery)
                     $(window).load(function(){
                       if($(".maxheight-feat").length){
                       $(".maxheight-feat").equalHeights()}
                     });
                     };
                  </script>
                  <div class="box featured">
                     <div class="box-heading">Суші "Зроби Сам"</div>
                     <div class="box-content">
                        <div class="box-product">
                          <div class="category-info">
                            <div class="tab-content ">
                              <p>Виберіть основу для суші</p>
                                <?php foreach($osnovu as $osnova):?>
                                  <div class="span4">
                                    <div class="left">
                                      <img src="<?php echo $osnova->main_image();?>">
                                      <label style="padding-left: 40px;" class="radio" for="osnova-<?php echo $osnova->id;?>"><?php echo $osnova->name();?><input checked type="radio" name="order[osnova]" value="<?php echo $osnova->id;?>" id="osnova-<?php echo $osnova->id;?>"></label>
                                    </div>
                                  </div>
                                <?php endforeach;?>
                            </div>
                            <div class="tab-content ">
                               <p>Виберіть інгрідіенти суші</p>
                                <ul>
                                <?php foreach($ingredients as $ingredient):?>
                                  <div class="span2">
                                    <div class="left">
                                      <img src="<?php echo $ingredient->main_image();?>">
                                      <label class="checkbox" for="ing-<?php echo $ingredient->id;?>"><?php echo $ingredient->name();?><input checked type="checkbox" name="order[ingridient]" value="<?php echo $ingredient->id;?>" id="ing-<?php echo $ingredient->id;?>"></label>
                                    </div>
                                  </div>
                                <?php endforeach;?>
                                </ul>
                            </div>
                          </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
               <aside class="span3" id="column-left">
                  <div class="box category">
                     <div class="box-heading"><?php echo Kohana::lang("global.categories")?></div>
                     <div class="box-content">
                        <div class="box-category">
                           <ul>
                        <?php foreach($categories as $category):  ?> 
                        <li class="cat-header <?php echo isset($active_category) && $active_category->id == $category->id ? "active" : ""?> <?php echo count($category->children) ? "parent" : ""?>">
                           <a href="<?php echo isset($active_category) && $active_category->id == $category->id ? "#" : url::base()."category/".$category->seo_name?>"><?php echo $category->name();?></a>
                           <?php if(count($category->children)):?>
                           <ul class="active">
                              <?php foreach($category->children as $cat):?> 
                                 <li class="<?php echo isset($active_category) && $active_category->id == $cat->id ? "active" : ""?>">
                                    <a href="<?php echo isset($active_category) && $active_category->id == $cat->id ? "#" : url::base()."category/".$cat->seo_name?>"><?php echo $cat->name();?></a>
                                 </li>
                              <?php endforeach;?>
                           </ul>
                           <?php endif;?>
                        </li>
                        <?php endforeach;?>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="clear"></div>
               </aside>
               </div>
            </div>
            <div class="clear"></div>
         </div>
      </div>
   </div>
   <div class="clear"></div>
</section>
<?php include Kohana::find_file("views","footer");?>