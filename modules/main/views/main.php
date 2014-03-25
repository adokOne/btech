<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content" class="index">
        <div class="wrapper">
            <div class="top">
                <h1>Комп'ютерні курси у Львові!</h1>
                <p>Почни ве зараз!</p>
                <div class="main_text">
                    <?php echo $main_text;?>
                </div>
            </div>
            <div class="bottom">
                <div class="partners">
                    <p>Наші партнери:</p>
                    <ul>
                        <li><img src="/img/partners/gl.png"></li>
                        <li><img src="/img/partners/mc.png"></li>
                        <li><img src="/img/partners/un.png"></li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>

        </div>

    </div>
    <!-- end content -->

    <!-- content -->
    <div id="content" class="courses">
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
    <!-- content -->
    <div id="content" class="online">
        <div class="wrapper">
            <p class="heading">
                <?php echo $lang["online_head"]?>
            </p>
            <p class="heading_desc">
                <?php echo $lang["online_head_desc"]?>
            </p>

            <div class="online_form">
                <form action="#" data-auto-controller="OnlineRegController">
                    <ul>
                        <li class="from_item">
                            <input type="text" placeholder="Ім'я"/>
                        </li>
                        <li class="from_item">
                            <input type="email" placeholder="Email"/>
                        </li>
                        <li class="from_item">
                            <select name="parent_cat">
                                <?php foreach($courses as $course):?>
                                    <option value="<?php echo $course->id ?>"><?php echo text::mb_ucfirst($course->name()) ?></option>
                                <?php endforeach;?>
                            </select>
                        </li>
                        <li class="from_item" id="course" style="display:none;">
                           
                        </li>
                        <li class="from_item" id="course2" style="display:none;">
                           
                        </li>
                        <li class="from_item" id="group" style="display:none;">
                           
                        </li>
                        <li class="from_item">
                            <input type="text" placeholder="<?php echo $lang["online_sale"]?> "/>
                        </li>
                        <li class="from_item">
                            <a href="#" class="submit">
                                <em class="right"></em>
                                <em class="left"></em>
                                <?php echo $lang["online_start"]?>
                            </a>
                        </li>
                    </ul>
                </form>
                <div class="clear"></div>

            </div>
            <div class="clear"></div>

        </div>
    </div>
    <!-- end content -->
    <script type="text/javascript">
        $("#nav .courses").click(function(){
            var el = $(this)
            $('html, body').animate({
                scrollTop: $("#content.courses").offset().top
            }, 500,
            function(){
                el.siblings().removeClass("active")
                el.addClass("active")
            });
            return false;
        })
        $("#nav .online").click(function(){
            var el = $(this)
            $('html, body').animate({
                scrollTop: $("#content.online").offset().top
            }, 500,
            function(){
                el.siblings().removeClass("active")
                el.addClass("active")
            });
            return false;
        })
        $("#nav .index").click(function(){
            var el = $(this)
            $('html, body').animate({
                scrollTop: 0
            }, 500,
            function(){
                el.siblings().removeClass("active")
                el.addClass("active")
            });
            return false;
        })
    </script>
<?php include Kohana::find_file("views","footer");?>