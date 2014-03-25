<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content">
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
<?php include Kohana::find_file("views","footer");?>