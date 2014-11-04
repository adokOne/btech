<?php include Kohana::find_file("views","header");?>

<div class="columns-container">
   <div id="top_column" class="center_column"></div>
   <div id="columns" class="container">
      <!-- Breadcrumb -->
      <div class="breadcrumb clearfix">
         <a class="home" href="<?php echo url::base();?>" title="<?php echo $lang["to_home"]?>">
         <i class="fa fa-home"></i>
         </a>
         <span class="navigation-pipe">&gt;</span>
         <a href="<?php echo url::base()?>users/account" title="<?php echo $lang["my_account"]?>">
         <?php echo $lang["my_account"]?>
         </a>
          <span class="navigation-pipe">
         &gt;
         </span>
         <a  href="<?php echo url::base();?>users/logout" title="<?php echo $lang["logout"]?>">
         	<?php echo $lang["logout"]?>
         </a>
         <span class="navigation-pipe">
         &gt;
         </span>
         <span class="navigation_page">
         	<?php echo $lang["personal"]?>
         </span>

      </div>
      <!-- /Breadcrumb -->
      <div class="row">
         <div id="center_column" class="center_column col-xs-12 col-sm-12">
            <div class="box">
               <h1 class="page-subheading">
                  <?php echo $lang["personal"]?>
               </h1>
               <p class="required">
                  <sup>*</sup><?php echo $lang["Required"]?>
               </p>
               <form action="<?php echo url::base()?>users/update" method="post" class="std">
                  <fieldset>
                     <div class="required form-group">
                        <label for="firstname" class="required"><?php echo $lang["name"]?></label>
                        <input class="is_required validate form-control" required="required" type="text" id="firstname" name="name" value="<?php echo $user->name?>">
                     </div>
                     <div class="required form-group">
                        <label for="email" class="required"><?php echo $lang["email"]?></label>
                        <input class="is_required validate form-control" data-validate="isEmail" type="email" name="email" id="email" value="<?php echo $user->email?>">
                     </div>
                     <div class="required form-group">
                        <label for="phone" class="required"><?php echo $lang["phone"]?></label>
                        <input class="is_required validate form-control" data-validate="isEmail" type="text" name="phone" id="phone" value="<?php echo $user->phone?>">
                     </div>
                     <div class="required form-group">
                        <label for="address" class="required"><?php echo $lang["address"]?></label>
                        <input class="is_required validate form-control" data-validate="isEmail" type="text" name="address" id="address" value="<?php echo $user->address?>">
                     </div>
                     <div class="required form-group">
                        <label for="old_passwd" class="required"><?php echo $lang["current_pass"]?></label>
                        <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="password" id="old_passwd">
                     </div>
                     <div class="password form-group">
                        <label for="passwd"><?php echo $lang["new_pass"]?></label>
                        <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="new_password" id="passwd">
                     </div>
                     <div class="password form-group">
                        <label for="confirmation"><?php echo $lang["pass_confirm"]?></label>
                        <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="password_confirmation" id="confirmation">
                     </div>
                     <div class="form-group">
                        <button type="submit" name="submitIdentity" class="btn btn-default btn-md icon-right">
                        <span><?php echo $lang["save"]?></span>
                        </button>
                     </div>
                  </fieldset>
               </form>
               <!-- .std -->
            </div>
         </div>
         <!-- #center_column -->
      </div>
      <!-- .row -->
   </div>
   <!-- #columns -->  
</div>

<?php include Kohana::find_file("views","footer");?>