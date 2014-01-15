<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content">
        <div class="wrapper">
            <p class="heading"><?php echo $lang["blog"]?></p>
            <?php if($news->count()):?>
                <div class="blog_form">
                    <ul>
                        <?php foreach($news as $post):?>
                            <li class="blog_item">
                                <span class="new"></span>
                                <div class="left">14 <br>ДЕК <br>2013</div>
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
                    <div class="pagination">
                        <ul>
                            <li class="prev"><a href="" class="disabled">Предыдущая страница</a></li>
                            <li><a href="" class="active">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li class="next"><a href="">Следующая страница</a></li>
                        </ul>
                    </div>
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