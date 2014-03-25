<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content">
        <div class="wrapper">
            <p class="heading"><?php echo $header?></p>
            <div class="heading_desc"><?php echo $desc?></div>
            <div class="items">
                <?php foreach($courses as $course):?>
                    <div class="item">
                        <a href="<?php echo url::lang_url()."courses/".$course->seo();?>">
                            <div class="item_img">
                                <?php echo $course->img(); ?>
                            </div>
                            <div class="item_text">
                                <h3><?php echo $course->name() ?></h3>
                            </div>   
                        </a>
                    </div>
                <?php endforeach;?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>

        </div>
    </div>
    <!-- end content -->
<?php include Kohana::find_file("views","footer");?>