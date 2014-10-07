<?php include Kohana::find_file("views","header");?>
  <section class="catalog" >
    <div class="container">
      <h1><?php echo Kohana::lang("global.catalog");?></h1>
      <?php foreach(array_chunk($items->as_array(), 4,true) as $items_):?>
        <div class="row">
          <?php foreach($items_ as $k=>$item):?>
          <div class="col-lg-3 col-md-3 col-sm-3">
            <a href="#cake_<?php echo $k?>" class="scroll">
              <img src="<?php echo $item->main_image("medium");?>" alt="<?php echo $item->name();?>">
              <p><?php echo $item->name();?></p>
            </a>
          </div>
          <?php endforeach;?>
        </div>
      <?php endforeach;?>
    </div>
  </section>
    <div class="corner bottom"></div>

  <section class="order_block">
    <div class="container">
      <?php foreach($items as $k=>$item):?>
        <?php cake::item($item,$k);?>
      <?php endforeach;?>
    </div>
  </section>
<?php include Kohana::find_file("views","footer");?>