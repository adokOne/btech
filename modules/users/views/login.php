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
         <span class="navigation_page">	<?php echo $lang["Authentication"]?></span>
      </div>
      <!-- /Breadcrumb -->
      <div class="row">
         <div id="center_column" class="center_column col-xs-12 col-sm-12">
            <h1 class="page-heading"><?php echo $lang["Authentication"]?></h1>
            <div class="row">
               <div class="col-xs-12 col-sm-6">
                  <form action="<?php echo url::base()?>users/registration" method="post" id="create-account_form" class="box">
                     <h3 class="page-subheading"><?php echo $lang["Create_ac"]?></h3>
                     <div class="form_content clearfix">
                        <p><?php echo $lang["enter_email"]?></p>
                        <div class="alert alert-danger" id="create_account_error" style="display:none"></div>
                        <div class="form-group">
                           <label for="email_create"><?php echo $lang["email"]?></label>
                           <input required="required" type="email" class="is_required validate account_input form-control"  id="email_create" name="email" value="">
                        </div>
                        <div class="form-group">
                           <label for="name_create"><?php echo $lang["name"]?></label>
                           <input required="required" type="text" class="is_required validate account_input form-control"  id="name_create" name="username" value="">
                        </div>
                        <div class="submit">
                      	   <button class="btn btn-default btn-md" type="submit" id="SubmitCreate" >
                           <span>
                           <i class="fa fa-user left"></i>
                           <?php echo $lang["Create_ac"]?>
                           </span>
                           </button>
                           
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-xs-12 col-sm-6">
                  <form action="<?php echo url::base()?>users/login" method="post" id="login_form" class="box">
                     <h3 class="page-subheading"><?php echo $lang["already_registered"]?></h3>
                     <div class="form_content clearfix">
                        <div class="form-group">
                           <label for="email"><?php echo $lang["email"]?></label>
                           <input class="is_required validate account_input form-control" data-validate="isEmail" type="email" id="email" name="email" value="">
                        </div>
                        <div class="form-group">
                           <label for="passwd"><?php echo $lang["pass"]?></label>
                           <span>
                           <input class="is_required validate account_input form-control" type="password" id="passwd" name="password" value="">
                           </span>
                        </div>
                        <p class="lost_password form-group">
                           <a href="<?php echo url::base()?>users/forgot" title="<?php echo $lang["forgot"]?>" rel="nofollow"><?php echo $lang["forgot"] ?>?</a>
                        </p>
                        <p class="submit">
                           <button type="submit" id="SubmitLogin"  class="btn btn-default btn-md">
                           <span>
                           <i class="fa fa-lock left"></i>
                           <?php echo $lang["sign_in"]?>
                           </span>
                           </button>
                        </p>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- #center_column -->
      </div>
      <!-- .row -->
   </div>
   <!-- #columns -->  
</div>
<?php include Kohana::find_file("views","footer");?>