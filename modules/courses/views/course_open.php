<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content">
        <div class="wrapper">
            <p class="heading"><?php echo $header?></p>
            
            <div class="items">
<!--                 <div class="course_menu">
                    <ul>
                        <li><a href="#"><?php echo $lang["course_menu"][0]?></a></li>
                        <li><a href="#"><?php echo $lang["course_menu"][1]?></a></li>
                        <li><a href="#"><?php echo $lang["course_menu"][2]?></a></li>
                        <li><a href="#"><?php echo $lang["course_menu"][3]?></a></li>
                    </ul>
                </div> -->
                <div class="block">
                    <h4><?php echo $lang["required_trainee"]?></h4>
                    <div class="text"><?php echo $course->preparation();?></div>
                </div>
                <div class="block">
                    <h4><?php echo sprintf($lang["course_program"],$course->name())?></h4>
                    <div class="text plan">
                    <?php foreach($course->where("parent_id",0)->themes as $k=>$theme):?>
                        <a href="#"><?php echo sprintf($lang["course_theme"],($k+1),$theme->name());?></a>
                        <?php if($theme->children->count() > 0): ?>
                            <ul>
                                <?php foreach($theme->orderby("position_in_group","ASC")->children as $t):?>
                                <li>
                                    - <?php echo $t->name();?>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    <?php endforeach;?>
                    </div>
                </div>
                <?php if($course->reset_select()->groups->count()):?>
                    <div class="block">
                         <h4><?php echo $lang["av_groups"]?></h4>
                            <div class="schedule">
                                <table cellpadding="0" cellspacing="0">
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
                                        <?php $i=1; foreach($course->reset_select()->groups as $group):?>
                                            <tr <?php if($i%2===0):?> class="table_grey" <?php endif; $i++?>>
                                                <td><?php echo $course->name();?></td>
                                                <td><?php echo $group->number + 1?></td>
                                                <td><?php echo $group->start_date?></td>
                                                <td><?php echo $group->time()?></td>
                                                <td><?php echo $group->days()?></td>
                                                <td><?php echo $group->people_count?></td>
                                                <td><?php echo $group->price?></td>
                                                <td>Запис</td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <div class="clear"></div>
                            </div>
                    </div>
               <?php endif;?>
                <div class="block">
                    <h4><?php echo $lang["course_cost"]?></h4>
                    <div class="text">
                        <p><?php echo sprintf($lang["lesson_count_ind"],$course->name(),$course->lessons_count)?></p>
                        <p><?php echo sprintf($lang["lesson_price_ind"],$course->price)?></p>
                        <p><span class="red">*</span><?php echo $lang["course_group_desc"]?></p>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>

        </div>
    </div>
    <!-- end content -->
<script>
    $( ".text.plan a" ).click(function() {
      $(this).next().slideToggle(  );
      return false;
    });
</script>
<?php include Kohana::find_file("views","footer");?>