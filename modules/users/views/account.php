<?php include Kohana::find_file("views","header");?>
<div class="columns-container">
   <div id="top_column" class="center_column"></div>
   <div id="columns" class="container">
      <!-- Breadcrumb -->
      <div class="breadcrumb clearfix">
         <a class="home" href="<?php echo url::base();?>" title="<?php echo $lang["to_home"]?>">
         <i class="fa fa-home"></i>
         </a>
       	 <span class="navigation-pipe">
         &gt;
         </span>
         <a  href="<?php echo url::base();?>users/logout" title="<?php echo $lang["logout"]?>">
         	<?php echo $lang["logout"]?>
         </a>
         <span class="navigation-pipe">&gt;</span>
         <span class="navigation_page"><?php echo $lang["my_account"]?></span>
      </div>
      <!-- /Breadcrumb -->
      <div class="row">
         <div id="center_column" class="center_column col-xs-12 col-sm-12">
            <h1 class="page-heading"><?php echo $lang["my_account"]?></h1>
            <p class="info-account"><?php echo $lang["wellcome_to_account"]?></p>
            <div class="row addresses-lists">
               <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                  <ul class="myaccount-link-list">
                     <li>
                        <a href="<?php echo url::base()?>users/orders" title="<?php echo $lang["my_orders"]?>">
                        <i class="fa fa-list-ol"></i>
                        <span><?php echo $lang["my_orders"]?></span>
                        </a>
                     </li>
                     <li>
                        <a href="<?php echo url::base()?>users/profile" title="<?php echo $lang["my_profile"]?>">
                        <i class="fa fa-user"></i>
                        <span><?php echo $lang["my_profile"]?></span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <ul class="footer_links clearfix">
               <li>
                  <a class="btn btn-default btn-sm icon-left" href="<?php echo url::base();?>" title="<?php echo $lang["to_home"]?>">
                  <span>
                  <?php echo $lang["to_home"]?>
                  </span>
                  </a>
               </li>
            </ul>
         </div>
         <!-- #center_column -->
      </div>
      <!-- .row -->
   </div>
   <!-- #columns -->  
</div>
<?php include Kohana::find_file("views","footer");?>
