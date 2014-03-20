<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content">
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
<?php include Kohana::find_file("views","footer");?>