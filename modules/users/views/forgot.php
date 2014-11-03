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
         <a href="<?php echo url::base()?>users" title="<?php echo $lang["Authentication"]?>" rel="nofollow">
         <?php echo $lang["Authentication"]?>
         </a>
         <span class="navigation-pipe">&gt;</span>
         <?php echo $lang["forgot"] ?>
      </div>
      <!-- /Breadcrumb -->
      <div class="row">
         <div id="center_column" class="center_column col-xs-12 col-sm-12">
            <div class="box">
               <h1 class="page-subheading"><?php echo $lang["forgot"] ?>?</h1>
               <p><?php echo $lang["enter_for_forgot"] ?></p>
               <form action="<?php echo url::base()?>users/get_pass" method="post" class="std" id="form_forgotpassword">
                  <fieldset>
                     <div class="form-group">
                        <label for="email"><?php echo $lang["email"] ?></label>
                        <input class="form-control" type="email" id="email" name="email" value="">
                     </div>
                     <p class="submit">
                        <button type="submit" class="btn btn-default btn-md icon-right"><span><?php echo $lang["retrive_pass"]?></span></button>
                     </p>
                  </fieldset>
               </form>
            </div>
            <ul class="clearfix footer_links">
               <li>
                  <a class="btn btn-default btn-sm icon-left" href="<?php echo url::base()?>users" title="Back to Login" rel="nofollow">
                  <span>
                  <?php echo $lang["back_to_login"]?> 
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