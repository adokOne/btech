  <?php include Kohana::find_file("views","header");?>
  <section class="order_form">
    <div class="container">
      <h1>Ваш заказ</h1>
      <div class="ordering">
        <?php foreach($card["items"] as $item):?>
          <?php $weight=0; $good = ORM::factory("good")->find($item["id"]); $weight += $good->weight;?>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><?php echo $good->name()?></h4>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="<?php echo $good->main_image("medium");?>" alt="<?php echo $good->name();?>">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="col-lg-4 col-md-4 col-sm-3 col-xs-4">
                <p class="price"><?php echo $good->price;?> <span><?php echo Kohana::lang("global.grn");?></span></p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-3 col-xs-3">
                <div class="counter counts">
                  <input type="text" value="<?php echo $item["count"]?>" readonly>
                  <div class="fr">
                    <a href="#" class="plus"></a>
                    <a href="#" class="minus"></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-3">
                <a href="#" class="delete"><?php echo Kohana::lang("global.delete")?></a>
              </div>
            </div>
          </div>
        <?php endforeach;?>
      </div><!-- your order -->

      <div class="date_block">
        <div class="container">
          <h2><?php echo Kohana::lang("global.delivery_date_and_time")?></h2>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="calendar">
                <h6><?php echo Kohana::lang("global.delivery_date")?></h6>
                <div id="datepicker"></div>
                <i><?php echo Kohana::lang("global.delivery_date_desc")?></i>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-">
              <div class="delivery_time">
                <h6><?php echo Kohana::lang("global.delivery_time")?></h6>

                <div class="time counter">
                  <a href="#" class="left"></a>
                  <input type="text" value="10:00">
                  <a href="#" class="right"></a>
                </div>
                <i><?php echo Kohana::lang("global.delivery_time_desc")?></i>
              </div>
            </div>
          </div>
          <div class="delivery_info">
              <p><?php echo Kohana::lang("global.dostavka")?></p>
              <p><?php echo Kohana::lang("global.po_kievu")?></p>
          </div>
        </div>
      </div><!-- date block -->

      <div class="data_block">
        <form action="/create_order" method="POST">
          <div class="container">
            <h2><?php echo Kohana::lang("global.your_data")?></h2>
            <div class="user_data">
              <div class="field">
                <input name="order[name]" required type="text" placeholder="<?php echo Kohana::lang("global.name_plc")?>">
                <i><?php echo Kohana::lang("global.name_plc_desc")?></i>
              </div>

              <div class="field">
                <input name="order[phone]" required type="text" placeholder="<?php echo Kohana::lang("global.phone_plc")?>">
                 <i><?php echo Kohana::lang("global.phone_plc_desc")?></i>
              </div>

              <div class="field">
                <input name="order[address]" required type="text" placeholder="<?php echo Kohana::lang("global.address_plc")?>">
              </div>

              <div class="field">
                <input name="order[email]" required type="text" placeholder="<?php echo Kohana::lang("global.email_plc")?>">
              </div>

              <div class="field">
                <textarea name="order[comment]" placeholder="<?php echo Kohana::lang("global.coment_plc")?>"></textarea>
              </div>
            </div>

            <div class="payment_method radio">
              <h6><?php echo Kohana::lang("global.pay_types")?></h6>

              <ul>
                <?php foreach(Kohana::lang("admin.pay_types") as $k=>$v):?>
                  <li>
                    <input <?php echo !$k ? "checked" : ""?> name="order[pay_type]" type="radio" name="pay" id="pay_<?php echo $k;?>" value="<?php echo $k;?>">
                    <label for="pay_<?php echo $k;?>"><?php echo $v;?></label>
                  </li>
                <?php endforeach;?>
              </ul>
            </div>

            <div class="total">
              <p><?php echo inflector::cake_count(count($card["ids"]))?>, <?php echo Kohana::lang("global.total_weight")?> <span><?php echo $weight/1000?></span> кг.</p>
              <p><?php echo Kohana::lang("global.to_delivery")?> <span><?php echo date::rusdate("j F",Router::$current_language)?></span></p>
              <p><?php echo Kohana::lang("global.to_pay")?> <?php echo $card["price"]?> грн.</p>
            </div>
            <div class="submit_btn">
              <input type="submit" class="submit" value="<?php echo Kohana::lang("global.create_order")?>"></input>
            </div>
          </div>
        </form>
      </div><!-- data block -->
    </div>
  </section>
  <?php include Kohana::find_file("views","cart_footer");?>