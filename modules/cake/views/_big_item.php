<div class="row" id="cake_<?php echo $id?>">
  <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="description">
      <h3><?php echo $item->name();?></h3>
      <p><?php echo $item->desc();?></p>
      <div class="spec">
        <span class="price"><i><?php echo $item->price;?></i> <?php echo Kohana::lang("global.grn");?></span>
        <span class="weight"><?php echo $item->weight;?> <?php echo Kohana::lang("global.gram");?></span>
        <span class="slice"><?php echo $item->pieces;?> <?php echo Kohana::lang("global.pieces");?></span>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="cake_preview">
      <img src="<?php echo $item->main_image();?>" alt=".">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="make_order">
      <a href="/<?php echo Router::$current_language;?>/to_card/<?php echo $item->id?>" class="ord_btn"><?php echo Kohana::lang("global.i_want")?></a>
    </div>
  </div>
</div>