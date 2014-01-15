<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content">
        <div class="wrapper">
                <div class="buttons">
                    <a href="#" class="prev"><?php echo $lang["prev"]?></a>
                    <a href="#" class="next"><?php echo $lang["next"]?></a>
                </div>
            <div class="blog_form">
                <?php $time = strtotime($post->created_at);?>
                <div class="blog_item last open">
                        <?php if(time() - Kohana::config("core.news_new_time") < $time):?>
                            <span class="new"></span>
                        <?php endif;?>
                        <div class="left"><?php echo date("j",$time)."<br>".date("M",$time)."<br>".date("Y",$time)?></div>
                        <div class="right">
                            <h1><?php echo $post->name();?></h1>
                            <div class="text"><?php echo $post->text();?></div>
                        </div>
                    <div class="comments">
                        <ul>
                            <?php foreach($post->comments as $comment):?>
                                <li class="comment_item">
                                    <p><?php echo $comment->text;?></p>
                                    <ul class="user_desc">
                                        <li>Alexander</li><li>|</li><li><?php echo date("j.n.Y",strtotime($comment->created_at))?></li>
                                    </ul>
                                </li>
                            <?php endforeach;?>
                            <li class="comment_add">
                                <a href="#">Залишити коментар</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>

                    
                <div class="clear"></div>

            </div>
            <div class="clear"></div>

        </div>
        <div class="clear"></div>
    </div>
    <!-- end content -->
<?php include Kohana::find_file("views","footer");?>