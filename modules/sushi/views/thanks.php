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
                     <a href="#">Дякуємо за замовлення!</a>
                  </div>
                  <h1><?php echo Kohana::lang("global.order_processed")?></h1>
                  <div class="box-container">
                     <?php echo $page->text();?>
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