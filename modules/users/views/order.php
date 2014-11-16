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
            <div class="block-center" id="block-history">
               <div id="block-order-detail" class="unvisible" style="display: block;">
                  <div class="info-order box">
                     <p><strong class="dark"><?php echo $lang["pay_type"]?>:</strong> <span class="color-myaccount"><?php echo Kohana::lang("admin.pay_types.{$order->pay_type}");?></span></p>
                  </div>
                  <h1 class="page-heading"><?php echo $lang["flow_order"]?></h1>
                  <div class="table_block">
                     <table class="detail_step_by_step table table-bordered">
                        <thead>
                           <tr>
                              <th class="first_item"><?php echo $lang["order_date"]?></th>
                              <th class="last_item"><?php echo $lang["status"]?></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr class="first_item item">
                              <td class="step-by-step-date"><?php echo date("d.m.Y",$order->time);?></td>
                              <td><span style="background-color:<?php echo Kohana::lang("admin.order_statuses_color.{$order->status}");?>; border-color:#4169E1;" class="label"><?php echo Kohana::lang("admin.order_statuses.{$order->status}");?></span></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div id="order-detail-content" class="table_block table-responsive">
                     <table id="cart_summary" class="table table-bordered stock-management-on">
                        <thead>
                           <tr>
                              <th class="cart_product first_item"><?php echo $lang["img"]?></th>
                              <th class="cart_description item"><?php echo $lang["prod_name"]?></th>
                              <th class="cart_description item"><?php echo $lang["size"]?></th>
                              <th class="cart_unit item"><?php echo $lang["unit_price"]?></th>
                              <th class="cart_quantity item"><?php echo $lang["Quantity"]?></th>
                              <th class="cart_total item"><?php echo $lang["total"]?></th>
                              
                           </tr>
                        </thead>
                        <tfoot>
                           <tr class="cart_total_price">
                              <td colspan="3" class="total_price_container text-right">
                                 <span><?php echo $lang["total"]?></span>
                              </td>
                              <td colspan="4" class="price" id="total_price_container">
                                 <span id="total_price"><?php echo $order->total_price." ".$lang["currencies"][$active_currency]?></span>
                              </td>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php  foreach($order->positions as $item):?>
                              <tr id="product_<?php echo  $item->good->id ?>" class="cart_item first_item address_<?php echo $item->good->id ?> odd">
                                 <td class="cart_product">
                                    <a href="<?php echo $item->good->url() ?>" alt="<?php echo $item->good->id ?>">
                                    <img src="<?php echo $item->good->main_image("thumb") ?>">
                                    </a>
                                 </td>
                                 <td class="cart_description">
                                    <p class="product-name">
                                       <a href="<?php echo $item->good->url() ?>"><?php echo $item->good->name() ?></a>
                                    </p>
                                 </td>
                                 <td class="cart_description">
                                    <p class="product-name">
                                       <?php echo $item->size ?>
                                    </p>
                                 </td>
                                 <td class="cart_unit" data-title="<?php echo $lang["unit_price"]?>">
                                    <span class="price" id="product_price_<?php echo  $item->good->id ?>">
                                    <span class="price"><?php echo $item->good->price." ".$lang["currencies"][$active_currency]?></span>
                                    </span>
                                 </td>
                                 <td class="cart_quantity text-center">
                                    <input size="2" type="text" autocomplete="off" class="cart_quantity_input form-control grey" value="<?php echo  $item->count ?>" name="quantity_<?php echo  $item->good->id ?>">
                                 </td>
                                 <td class="cart_total" data-title="<?php echo $lang["total"]?>">
                                    <span class="price" id="total_product_price_<?php echo  $item->good->id ?>"><?php echo ($item->good->price*$item->count)." ".$lang["currencies"][$active_currency] ?></span>
                                 </td>
                              </tr>
                           <?php endforeach;?>
                        </tbody>
                     </table>
                  </div>
                  <form action="<?php url::base().url::current()?>" method="post" class="std">
                     <h3 class="page-heading bottom-indent"><?php echo $lang["add_comment"]?>:</h3>
                     <p><?php echo $lang["add_comment_if"]?></p>
                     <p class="form-group">
                        <textarea class="form-control" cols="67" rows="3" name="msgText"></textarea>
                     </p>
                     <div class="submit">
                        <input type="hidden" name="order_id" value="<?php echo $order->id;?>">
                        <button type="submit" name="submitMessage" class="button btn btn-default button-medium"><span><?php echo $lang["send"]?><i class="icon-chevron-right right"></i></span></button>
                     </div>
                  </form>
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