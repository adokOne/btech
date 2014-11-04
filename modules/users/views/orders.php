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
         	<?php echo $lang["my_orders"]?>
         </span>
      </div>
      <!-- /Breadcrumb -->
      <div class="row">
         <div id="center_column" class="center_column col-xs-12 col-sm-12">
            <h1 class="page-heading"><?php echo $lang["my_orders"]?></h1>
            <p class="info-account"><?php echo $lang["wellcome_to_my_orders"]?></p>
            <?php if($user->orders->count()):?>

            <?php else:?>
               <div class="block-center" id="block-history">
                   <p class="alert alert-warning"><?php echo $lang["no_orders"]?>.</p>
               </div>
            <?php endif;?>
            <div class="block-center" id="block-history">
               <table id="order-list" class="table table-bordered footab default footable-loaded footable">
                  <thead>
                     <tr>
                        <th class="first_item footable-first-column" data-sort-ignore="true"><?php echo $lang["order_num"]?>:</th>
                        <th class="item footable-sortable"><?php echo $lang["order_date"]?><span class="footable-sort-indicator"></span></th>
                        <th data-hide="phone" class="item footable-sortable"><?php echo $lang["total"]?><span class="footable-sort-indicator"></span></th>
                        <th data-sort-ignore="true" data-hide="phone,tablet" class="item"><?php echo $lang["pay_type"]?></th>
                        <th class="item footable-sortable"><?php echo $lang["status"]?><span class="footable-sort-indicator"></span></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($user->orders as $order):?>
                        <tr class="first_item ">
                           <td class="history_link bold footable-first-column"><span class="footable-toggle"></span>
                              <a class="color-myaccount" href="<?php echo url::base()."users/order/".$order->id?>">
                                 <?php echo $order->id;?>
                              </a>
                           </td>
                           <td data-value="<?php echo $order->time;?>" class="history_date bold">
                              <?php echo date("d.m.Y",$order->time);?>
                           </td>
                           <td class="history_price" data-value="<?php echo $order->total_price;?>">
                              <span class="price">
                                 <?php echo $order->total_price." ".$lang["currencies"][$active_currency];?>
                              </span>
                           </td>
                           <td class="history_method"> <?php echo Kohana::lang("admin.pay_types.{$order->pay_type}");?></td>
                           <td data-value="10" class="history_state">
                              <span class="label" style="background-color: <?php echo Kohana::lang("admin.order_statuses_color.{$order->status}");?>; border-color:#4169E1;">
                                 <?php echo Kohana::lang("admin.order_statuses.{$order->status}");?>
                              </span>
                           </td>
                        </tr>
                     <?php endforeach;?>
                  </tbody>
               </table>
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