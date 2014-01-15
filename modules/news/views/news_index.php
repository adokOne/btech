<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content">
        <div class="wrapper">
            <p class="heading"><?php echo $lang["blog"]?></p>
            <?php if($news->count()):?>
                <div class="blog_form">
                    <ul>
                        <?php foreach($news as $post):?>
                            <?php $time = strtotime($post->created_at);?>
                            <li class="blog_item">
                                <?php if(time() - Kohana::config("core.news_new_time") < $time):?>
                                    <span class="new"></span>
                                <?php endif;?>
                                <div class="left"><?php echo date("j",$time)."<br>".date("M",$time)."<br>".date("Y",$time)?></div>
                                <div class="right">
                                    <a href="<?php echo url::lang_url()."blog/".$post->seo;?>.html">
                                        <h3><?php echo $post->name();?></h3>
                                    </a>
                                    <p><?php echo $post->anons();?></p>
                                    <ul>
                                        <li><?php echo inflector::views($post->views_count);?></li>
                                        <li>|</li>
                                        <li><?php echo inflector::comments($post->comments->count());?></li>
                                    </ul>
                                </div>
                                
                            </li>
                        <?php endforeach;?>
                    </ul>
                    <!-- pagination -->
                        <?php echo $pagination;?>
                    <!-- end pagination -->
                    <div class="clear"></div>

                </div>
            <?php endif;?>
            <div class="clear"></div>

        </div>
        <div class="clear"></div>
    </div>
    <!-- end content -->
<?php include Kohana::find_file("views","footer");?>