<?php include Kohana::find_file("views","header");?>

<div class="columns-container">
   <div id="top_column" class="center_column"></div>
   <div id="columns" class="container">
      <!-- Breadcrumb -->
      <div class="breadcrumb clearfix">
         <a class="home" href="<?php echo url::base()?>" title="<?php echo $lang["to_home"]?>">
         <i class="fa fa-home"></i>
         </a>
         <?php  foreach(array_reverse($active_category->parents()) as $seo):?>
	         <span class="navigation-pipe">&gt;</span>
	         <a href="<?php echo $seo->url();?>" title="<?php echo $seo->name();?>"><?php echo $seo->name();?></a>
     	   <?php endforeach;?>
     		<span class="navigation-pipe">&gt;</span>
     		<span class="navigation_page"><?php echo $active_category->name();?></span>
      </div>
      <!-- /Breadcrumb -->
      <div class="row">
         <div id="left_column" class="column col-xs-12 col-sm-3">
            <!-- Block layered navigation module -->
            <?php echo lesya::filters();?>
            <!-- /Block layered navigation module -->
            <!-- MODULE Block best sellers -->
            <?php echo lesya::top();?>
            <!-- /MODULE Block best sellers -->	<!-- Block CMS module -->
            <!-- MODULE Block new products -->
            <?php echo lesya::new_items();?>
            <!-- /MODULE Block new products -->
            <!-- MODULE Block specials -->
            <?php echo lesya::sale();?>
            <!-- /MODULE Block specials -->
         </div>
         <div id="center_column" class="center_column col-xs-12 col-sm-9">
            <div class="content_scene_cat">
               <!-- Category image -->
               <div class="content_scene_cat_bg row">
                  <div class="category-image hidden-xs col-xs-12 col-sm-5 col-md-4 col-lg-3">
                     <img class="img-responsive" src="<?php echo $active_category->main_image();?>" alt="<?php echo $active_category->name();?>">
                  </div>
                  <div class="cat_desc  col-xs-12 col-sm-7 col-md-8 col-lg-9">
                     <span class="category-name"><?php echo $active_category->name();?></span>
                     <div id="category_description_short" class="rte">
                        <p><?php echo $active_category->desc();?></p>
                     </div>
                  </div>
               </div>
            </div>
            <h1 class="page-heading product-listing">
               <span class="cat-name"><?php echo $active_category->name()?>&nbsp;</span>
               <span class="heading-counter"><?php echo sprintf($lang["theare"],$total)?></span>
            </h1>
            <?php if(count($active_category->children)):?>
				<div id="subcategories">
				   <p class="subcategory-heading"><?php echo $lang["subcategories"]?></p>
				   <ul class="clearfix">
				   	  <?php foreach($active_category->children as $cat):?>
				      <li>
				         <div class="subcategory-image">
				            <a href="<?php echo $cat->url()?>" title="<?php echo $cat->name()?>" class="img">
				            <img class="replace-2x" src="<?php echo $cat->main_image("sub")?>" alt="<?php echo $cat->name()?>">
				            </a>
				         </div>
				         <h5>
				            <a class="subcategory-name" href="<?php echo $cat->url()?>" title="<?php echo $cat->name()?>"><?php echo $cat->name()?></a>
				         </h5>
				      </li>
				      <?php endforeach;?>
				   </ul>
				</div>
			<?php endif;?>
			<?php if(count($items)):?>
	            <div class="content_sortPagiBar clearfix">
	               <div class="sortPagiBar clearfix">
	                  <form id="productsSortForm" action="#" class="productsSortForm">

                        <div class="select selector1">
                            <label for="selectProductSort"><?php echo $lang["sort_by"]?></label>
                            <select id="selectProductSort" class="selectProductSort form-control">
                                <option value="name:asc" selected="selected">--</option>
                                <option value="price:asc"><?php echo $lang["price"]?>: <?php echo $lang["lowest_p"]?></option>
                                <option value="price:desc"><?php echo $lang["price"]?>: <?php echo $lang["higest_p"]?></option>
                                <option value="created_at:asc"><?php echo $lang["novinky"]?>: <?php echo $lang["lowest_n"]?></option>
                                <option value="created_at:desc"><?php echo $lang["novinky"]?>: <?php echo $lang["higest_n"]?></option>
                            </select>
                        </div>




	                  </form>
	                  <!-- /Sort products -->
	               </div>
	               <div class="top-pagination-content clearfix">
	                  <!-- Pagination -->
	                  <?php echo $pagination;?>
	                  <!-- /Pagination -->
	               </div>
	            </div>
        	<?php endif;?>
            <!-- Products list -->
            <ul class="product_list row grid">
           	<?php foreach($items as $k=>$item):?>
                 <?php $cls = "ajax_block_product col-xs-12 col-sm-6 col-md-4 ".lesya::line_cls($k,true); include Kohana::find_file("views","_big_item");?>
              <?php  endforeach;?>
            </ul>
            <?php if(strlen($pagination)):?>
	            <div class="content_sortPagiBar">
	               <div class="bottom-pagination-content clearfix">
	                  <!-- Pagination -->
	                  <?php  echo $pagination;?>
	                  <!-- /Pagination -->
	               </div>
	            </div>
        	<?php endif;?>
         </div>
         <!-- #center_column -->
      </div>
      <!-- .row -->
   </div>
   <!-- #columns -->  
</div>

<?php include Kohana::find_file("views","footer");?>