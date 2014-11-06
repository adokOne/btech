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
                     <div class="box-heading">Відгуки</div>
                     <div class="box-content">
                        <div class="box-product">
                          <div class="category-info">
                            <div class="tab-content">
                              <div class="box-container">
                                <?php foreach($feedbacks as $feedback):?>
                                   <div class="about-page" style="min-height: 65px;">
                                      <i class="icon-thumbs-up <?php echo $feedback->is_negative ? "rotate180" : ""?>">like</i>
                                      <div class="extra-wrap">
                                         <h3><?php echo $feedback->name; ?><small style="float: right;" ><?php echo date("d.m.Y",$feedback->created_at); ?></small></h3>
                                         <p><?php echo $feedback->text; ?></p>
                                      </div>
                                   </div>
                                 <?php endforeach;?>
                                 <div class="about-page" >
                                    <form action="/feedbacks" method="post" id="feedback">
                                      <div class="content contact-f form-horizontal">
                                         <h2>Поділіться своїми враженнями</h2>
                                         <div class="control-group">
                                            <label class="control-label" for="name">Ім'я:</label>
                                            <div class="controls state-success">
                                               <input required="required" class="span5 valid" type="text" name="feedback[name]" value="">
                                            </div>
                                         </div>
                                         <div class="control-group">
                                            <label class="control-label" for="email">Email:</label>
                                            <div class="controls">
                                               <input required="required" class="span5" type="email" name="feedback[email]" value="">
                                            </div>
                                         </div>
                                         <div class="control-group">
                                            <label class="control-label" for="message">Повідомлення:</label>
                                            <div class="controls">
                                               <textarea required="required" class="span5" name="feedback[text]" cols="40" rows="4"></textarea>
                                            </div>
                                         </div>
                                        <div class="control-group">
                                           <div class="controls">
                                           <label class="radio" for="voucher-7">Позитивно <input checked type="radio" name="feedback[is_negative]" value="0" id="voucher-7">
                                           </label>
                                           <label class="radio" for="voucher-6">Негативно <input type="radio" name="feedback[is_negative]" value="1" id="voucher-6">
                                           </label>
                                           </div>
                                        </div>
                                         <div class="control-group">
                                            <div class="controls">
                                               <div class="buttons"><a onclick="$('#feedback').submit();" class="button"><span>Надіслати</span></a></div>
                                            </div>
                                         </div>
                                      </div>
                                    </form>
                                 </div>
                              </div>
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