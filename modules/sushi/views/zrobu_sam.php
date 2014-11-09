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
                            <form method="post">
                              <div class="make_pizza">
                                 <table id="optionsTable_132" class="table">
                                    <tbody>
                                       <tr>
                                          <th bgcolor="" colspan="5"><strong>Виберіть основу для суші</strong></th>
                                       </tr>
                                       <?php foreach($osnovu as $i=>$osnova):?>
                                         <tr data-optionid="<?php echo $osnova->id?>" data-optionvalue="<?php echo $osnova->id?>" class="optionRow">
                                            <td class="center">
                                               <img style="border-radius: 50%;" width="110" height="110" src="<?php echo $osnova->main_image();?>" alt="">
                                            </td>
                                            <td width="180"><strong><?php echo $osnova->name();?></strong></td>
                                            <td><?php echo $osnova->price;?> грн.</td>
                                            <td>
                                               <div class="count" oid="244">
                                                  <label class="radio" for="osnova<?php echo $osnova->id;?>">
                                                    <input data-price="<?php echo $osnova->price?>" class="osnova" <?php echo 0==$i ? "checked" : "" ?> type="radio" id="osnova<?php echo $osnova->id;?>" name="order[osnova]" value="<?php echo $osnova->id;?>"/>
                                                  </label>
                                               </div>
                                            </td>
                                         </tr>
                                         <?php endforeach;?>
                                         <tr>
                                            <th bgcolor="" colspan="5"><strong>Виберіть інгрідіенти суші</strong></th>
                                         </tr>
                                       <?php foreach($ingredients as $ingredient):?>
                                         <tr data-optionid="<?php echo $ingredient->id?>" data-optionvalue="<?php echo $ingredient->id?>" class="optionRow">
                                            <td class="center">
                                               <img style="border-radius: 50%;" src="<?php echo $ingredient->main_image();?>" alt="">
                                            </td>
                                            <td><strong><?php echo $ingredient->name();?></strong></td>

                                            <td><?php echo $ingredient->price?> грн.</td>
                                            <td>
                                               <div class="count" oid="<?php echo $ingredient->id?>">
                                                  <input type="button" value="Плюс" class="plus plusButton">
                                                  <input class="ingridient" data-price="<?php echo $ingredient->price?>" name="order[ingridient][<?php echo $ingredient->id?>]" type="text" class="countValue" value="0" readonly="readonly" data-weight="70" data-name="<?php echo $ingredient->name();?>" data-price="<?php echo $ingredient->price?>">
                                                  <input type="button" value="Мінус" class="minus minusButton">
                                               </div>
                                            </td>
                                         </tr>
                                       <?php endforeach;?>
                                       <tr> 
                                             <td class="price" colspan="3">До оплати: </td>
                                             <td class="total" ><b class="final_proce">0</b> грн.</td>
                                         </tr>
                                    </tbody>
                                 </table>
                              </div>
                           <div class="row">
                        <div class="span5">
                           <div class="control-group">
                              <label class="control-label" for="name"><span class="required">*</span><?php echo Kohana::lang("global.fio")?>:</label>
                              <div class="controls">
                                 <input class="span5" type="text" name="order[name]" value="" required="required">
                              </div>
                              <label class="control-label" for="phone"><span class="required">*</span> <?php echo Kohana::lang("global.phone")?>:</label>
                              <div class="controls">
                                 <input class="span5"  id="phone" type="text" name="order[phone]" value="" required="required">
                              </div>
                              <label class="control-label" for="email"><span class="required">*</span> <?php echo Kohana::lang("global.email")?>:</label>
                              <div class="controls">
                                 <input class="span5" type="email" name="order[email]" value="" required="required">
                              </div>
                                <label class="control-label" for="address"><span class="required">*</span> <?php echo Kohana::lang("global.addres")?>:</label>
                              <div class="controls">
                                 <input class="span5 " type="text" name="order[address]" value="" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="span4">
                           <div class="control-group">
                              <div class="controls">
                                 <label class="control-label" for="phone"><?php echo Kohana::lang("global.message")?>:</label>
                                    <textarea class="span4" cols="10"  rows="8" name="order[comment]"></textarea>
                                    <div>
                                       <a  class="button fright do_order disabled"><span><?php echo Kohana::lang("global.do_order")?></span></a>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                            </form>

















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