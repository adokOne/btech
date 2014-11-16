<?php include Kohana::find_file("views","header");?>

<div class="columns-container">
   <div id="top_column" class="center_column"></div>
   <div id="columns" class="container">
      <!-- Breadcrumb -->
      <div class="breadcrumb clearfix">
         <a class="home" href="<?php echo url::base()?>" title="<?php echo $lang["to_home"]?>">
         <i class="fa fa-home"></i>
         </a>
     		<span class="navigation-pipe">&gt;</span>
     		<span class="navigation_page"><?php echo $lang[$heading];?></span>
      </div>
      <!-- /Breadcrumb -->
      <div class="row">
         <div id="left_column" class="column col-xs-12 col-sm-3">
            <!-- MODULE Block best sellers -->
            <?php if(!in_array($heading, array("top_sellers"))) echo lesya::top();?>
            <!-- /MODULE Block best sellers -->	<!-- Block CMS module -->
            <!-- MODULE Block new products -->
            <?php if(!in_array($heading, array("new_products"))) echo lesya::new_items();?>
            <!-- /MODULE Block new products -->
            <!-- MODULE Block specials -->
            <?php if(!in_array($heading, array("specials"))) echo lesya::sale();?>
            <!-- /MODULE Block specials -->
         </div>
         <div id="center_column" class="center_column col-xs-12 col-sm-9">
         <h1 class="page-heading product-listing"><?php echo $lang[$heading];?></h1>
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