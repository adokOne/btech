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
         <span class="navigation_page"><?php echo $lang["cart"]?></span>
      </div>
      <!-- /Breadcrumb -->
      <div class="row">
         <div id="center_column" class="center_column col-xs-12 col-sm-12">
            <!-- Shopping Cart -->
            <h1 id="cart_title" class="page-heading"><?php echo $lang["cart_summary"]?>
               <span class="heading-counter"><?php echo sprintf($lang["cart_contains"],count($card["items"]))?>:
               </span>
            </h1>
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
                        <th class="cart_delete last_item">&nbsp;</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr class="cart_total_price">
                        <td colspan="3" class="total_price_container text-right">
                           <span><?php echo $lang["total"]?></span>
                        </td>
                        <td colspan="4" class="price" id="total_price_container">
                           <span id="total_price"><?php echo $card["total"]." ".$lang["currencies"][$active_currency]?></span>
                        </td>
                     </tr>
                  </tfoot>
                  <tbody>
                     <?php foreach($card["items"] as $item):?>
                        <tr id="product_<?php $item["id"]?>" class="cart_item first_item address_<?php $item["id"]?> odd">
                           <td class="cart_product">
                              <a href="<?php echo url::base()."product/".$item["seo"]."-".$item["id"]?>" alt="<?php echo $item["name"]?>">
                              <img src="/upload/goods/<?php echo $item["id"]?>/1_thumb.png">
                              </a>
                           </td>
                           <td class="cart_description">
                              <p class="product-name">
                                 <a href="<?php echo url::base()."product/".$item["seo"]."-".$item["id"]?>"><?php echo $item["name"]?></a>
                              </p>
                           </td>
                           <td class="cart_description">
                              <p class="product-name">
                                 <?php echo $item["size"]?>
                              </p>
                           </td>
                           <td class="cart_unit" data-title="Unit price">
                              <span class="price" id="product_price_<?php $item["id"]?>">
                              <span class="price"><?php echo $item["price"]." ".$lang["currencies"][$active_currency]?></span>
                              </span>
                           </td>
                           <td class="cart_quantity text-center">
                              <input type="hidden" value="6" name="quantity_<?php $item["id"]?>_hidden">
                              <input size="2" type="text" autocomplete="off" class="cart_quantity_input form-control grey" value="<?php echo $item["count"]?>" name="quantity_<?php echo $item["id"]?>">
                              <div class="cart_quantity_button clearfix">
                                 <a rel="nofollow" class="cart_quantity_down del btn btn-default button-minus" id="cart_quantity_down_<?php echo $item["id"]?>" href="<?php echo url::base()."delete_from_cart/".$item["id"]?>?<?php echo http_build_query(array("sizes"=>array(array('size'=>$item['size'],'count'=>1))))  ?>" >
                                 <span>
                                 <i class="fa fa-minus"></i>
                                 </span>
                                 </a>
                                 <a rel="nofollow" class="cart_quantity_up btn btn-default button-plus" id="cart_quantity_up_<?php echo $item["id"]?>" href="<?php echo url::base()."to_card/".$item["id"]?>?<?php echo http_build_query(array("sizes"=>array(array('size'=>$item['size'],'count'=>1))))  ?>">
                                 <span>
                                 <i class="fa fa-plus"></i>
                                 </span>
                                 </a>
                              </div>
                           </td>
                           <td class="cart_total" data-title="<?php echo $lang["total"]?>">
                              <span class="price" id="total_product_price_<?php $item["id"]?>"><?php echo ($item["price"]*$item["count"])." ".$lang["currencies"][$active_currency] ?></span>
                           </td>
                           <td class="cart_delete text-center" >
                              <div>
                                 <a rel="nofollow" data-count="<?php echo $item["count"];?>"  class=" del cart_quantity_delete" id="<?php $item["id"]?>" href="<?php echo url::base()."delete_from_cart/".$item["id"]?>?<?php echo http_build_query(array("sizes"=>array(array('size'=>$item['size'],'count'=>$item['count']))))  ?>">
                                 <i class="fa fa-trash-o"></i>
                                 </a>
                              </div>
                           </td>
                        </tr>
                     <?php endforeach;?>
                  </tbody>
               </table>
            </div>
            <!-- end order-detail-content -->
            <div id="HOOK_SHOPPING_CART"></div>
            <p class="cart_navigation clearfix">
               <a href="<?php echo url::base();?>"  class="btn btn-default icon-left" title="<?php echo $lang["contine_shopong"]?>">
               <span><?php echo $lang["contine_shopong"]?></span>
               </a>
            </p>
            <!-- End Shopping Cart -->
            <!-- Payment -->
            <h1 class="page-heading step-num"><?php echo $lang["choose_delivery"]?></h1>
            <div id="" class="opc-main-block" style="margin-bottom: 30px">
            <div class="radio addressesAreEquals">
            <div class="left" style="float:left">
               <input class="same_addr" type="radio" name="same" id="addressesAreEquals" value="0" checked="checked" />
            <label for="addressesAreEquals"><?php echo $lang["use_my_address"]?><br/><small><?php echo $user->address?></small></label>
            </div>
            
            
             <div class="right" style="float:left;margin-left: 50px;">
            <input class="same_addr" type="radio" name="same" id="new_address" value="1" />
            <label for="new_address"><?php echo $lang["use_new_address"]?></label>
            <br/><input   style="opacity: 1;width:100%;height: 28px;border: 1px solid #d6d4d4;" class="input form-control grey addr_int" type="text" disabled="disabled" name="address" />
            </div>
            <div class="clear"></div>
            </div>

            </div>
            <h1 class="page-heading step-num"><?php echo $lang["choose_pay"]?></h1>

            <div id="opc_payment_methods" class="opc-main-block">
               <div id="opc_payment_methods-overlay" class="opc-overlay" style="display: none;"></div>
               <div class="paiement_block">
                  <div id="HOOK_TOP_PAYMENT"></div>
                  <div id="opc_payment_methods-content">
                     <div id="HOOK_PAYMENT">
                        <div class="row">
                           <div class="col-xs-12 col-md-12">
                              <p class="payment_module">
                                 <a class="bankwire chck_btn" href="<?php echo url::base()?>process_order/1" data-address="" title="Оплата банковским переводом">
                                    <?php echo $lang["bank_transfer"];?>
                                 </a>
                              </p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xs-12 col-md-12">
                              <p class="payment_module">
                                 <a class="cheque chck_btn" href="<?php echo url::base()?>process_order/2" data-address="" title="Оплата чеком">
                                 <?php echo $lang["nova_poshta_pay"];?>
                                 </a>
                              </p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xs-12 col-md-12">
                              <p class="payment_module">
                                 <a class="cash chck_btn" href="<?php echo url::base()?>process_order/3" data-address="" title="Оплата чеком">
                                 <?php echo $lang["lviv_pay"];?>
                                 </a>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end opc_payment_methods-content -->                                      
               </div>
               <!-- end opc_payment_methods -->
            </div>
            <!-- end HOOK_TOP_PAYMENT -->
            <!-- END Payment -->
         </div>
         <!-- #center_column -->
      </div>
      <!-- .row -->
   </div>
   <!-- #columns -->  
</div>
<?php include Kohana::find_file("views","footer");?>