<?php include Kohana::find_file("views","header");?>
<div class="content">
   <div class="extra">
      <form action="<?php echo url::base() ?>process_order" method="post">
         <div class="main-width">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" id="contentMainWrapper">
               <tr>
               <th><?php echo $item->name()?></th>
               <th><img src="<?php echo $item->main_image("thumb")?>"></th>
               <th><?php echo $item->price()?> грн.</th>
               </tr>
            </table>
            <fieldset class="address">
               <label class="inputLabel" for="contactname"><?php echo $lang["email"]?>:</label>
               <input required="required" type="email" name="order[email]" size="33" maxlength="32" id="contactname"><span class="alert">*</span><br class="clearBoth">
               <label class="inputLabel" for="firstname"><?php echo $lang["name"]?>:</label>
               <input required="required" type="text" name="order[name]" size="33" maxlength="32" id="firstname"><span class="alert">*</span><br class="clearBoth">
               <label class="inputLabel" for="street-address"><?php echo $lang["address"]?>:</label>
               <input required="required" type="text" name="order[address]" size="41" maxlength="64" id="street-address"><span class="alert">*</span><br class="clearBoth">
               <label class="inputLabel" for="company"><?php echo $lang["phone"]?>:</label>
               <input required="required" type="text" name="order[phone]" size="41" maxlength="32" id="company"><span class="alert">*</span><br class="clearBoth">
               <span class="alert">*</span><br class="clearBoth">
               <input  type="hidden" name="order[good_id]" value="<?php echo $item->id?>"/>
            </fieldset>
            <div class="buttonRow"><input class="cssButton button_submit" onmouseover="this.className='cssButtonHover button_submit button_submitHover'" onmouseout="this.className='cssButton button_submit'" type="submit" value="Submit the Information" style="width: 143px;"></div>
         </div>
      </form>
   </div>
</div>
<?php include Kohana::find_file("views","footer");?>