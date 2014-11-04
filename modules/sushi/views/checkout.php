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
                  <div class="breadcrumb">
                     <a href="#"><?php echo Kohana::lang("global.checkout")?></a>
                  </div>
                  <form data action="/create_order" method="post" enctype="multipart/form-data" id="contact">
                     <table class="table table-bordered">
                         <thead>
                           <tr>
                             <td class="name"><?php echo Kohana::lang("global.title")?></td>
                             <td></td>
                             <td class="quantity"><?php echo Kohana::lang("global.quantity")?></td>
                             <td class="price"><?php echo Kohana::lang("global.amount")?></td>
                             <td class="total"><?php echo Kohana::lang("global.total")?></td>
                           </tr>
                         </thead>
                         <tbody>
                           <?php foreach($cart["items"] as $item):?>
                              <tr>
                                 <td class="name">
                                    <a target="_blank" href="<?php url::base()?>item/<?php echo $item["id"]?>"><?php echo $item["name"]?></a>
                                    
                                 </td>
                                 <td>
                                    <img height="100px" width="100px" src="<?php echo url::base()?>upload/goods/<?php echo $item["id"]?>/main_pic_home.png" />
                                 </td>
                                 <td style="text-align:center;color:green" class="quantity"><b><?php echo $item["count"]?></b></td>
                                 <td class="price"><?php echo sprintf(Kohana::lang("global.price"),$item["price"])?></td>
                                 <td class="total"><?php echo sprintf(Kohana::lang("global.price"),($item["price"]*$item["count"]))?></td>
                              </tr>
                           <?php endforeach;?>
                         </tbody>
                         <tfoot>
                           <tr>
                             <td colspan="4" class="price"><b><?php echo Kohana::lang("global.to_pay")?>:</b></td>
                             <td class="total"><?php echo sprintf(Kohana::lang("global.price"),$cart["total"])?></td>
                           </tr>
                               </tfoot>
                       </table>
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
                                 <input class="span5" type="text" name="order[address]" value="" required="required">
                              </div>
                           </div>
                        </div>
                        <div class="span4">
                           <div class="control-group">
                              <div class="controls">
                                 <label class="control-label" for="phone"><?php echo Kohana::lang("global.message")?>:</label>
                                    <textarea class="span4" cols="10"  rows="8" name="order[comment]"></textarea>
                                    <div>
                                       <a id="do_order" class="button fright"><span><?php echo Kohana::lang("global.do_order")?></span></a>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                        
                  </form>
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