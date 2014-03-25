<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content">
        <div class="wrapper">
            <h1 class="heading"><?php echo $header?></h1>
            <div class="heading_desc"><?php echo $desc?></div>
            <p class="heading"><?php echo $lang["courses"]?></p>
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
            </div>
            <?php $i=0;
            foreach($parent_course->children as $child)
                foreach($child->groups as $group)
                    $i++;
                if($i):
            ?>
                <p class="heading"><?php echo $lang["av_groups"]?></p>
                <div class="schedule">
                    <table  cellpadding="0" cellspacing="0">
                        <thead>
                            <tr class="table_head">
                                <th><?php echo $lang["course"]?></th>
                                <th><?php echo $lang["group"]?></th>
                                <th><?php echo $lang["lesson_start"]?></th>
                                <th><?php echo $lang["lesson_time"]?></th>
                                <th><?php echo $lang["lesson_days"]?></th>
                                <th><?php echo $lang["lesson_people"]?></th>
                                <th><?php echo $lang["lesson_price"]?></th>
                                <th><?php echo $lang["lesson_online"]?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;foreach($parent_course->children as $child):?>
                                <?php foreach($child->groups as $group):?>
                                    <tr <?php if($i%2===0):?> class="table_grey" <?php endif; $i++?>>
                                        <td><?php echo $child->name();?></td>
                                        <td><?php echo $group->number +1?></td>
                                        <td><?php echo $group->start_date?></td>
                                        <td><?php echo $group->time()?></td>
                                        <td><?php echo $group->days()?></td>
                                        <td><?php echo $group->people_count?></td>
                                        <td><?php echo $group->price?></td>
                                        <td>Запис</td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="clear"></div>
                </div>
            <?php endif;?>
            <div class="clear"></div>

        </div>
    </div>
    <!-- end content -->
<?php include Kohana::find_file("views","footer");?>