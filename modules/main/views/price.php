<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content">
        <div class="wrapper">
            <p class="heading">
                <?php echo $lang["idividual_less"]?>
            </p>
            <div class="price_form">
                <table>
                    <thead>
                        <tr>
                            <th width="300"><?php echo $lang["course"]?></th>
                            <th width="300"><?php echo $lang["l_count"]?></th>
                            <th width="300"><?php echo $lang["lesson_price"]?></th>
                        </tr>
                    </thead>
                </table>
                <?php foreach($courses as $course):?>
               		<p class="price_cource"><?php echo $course->name()?></p>
	                <table>
	                    <tbody>
	                    	<?php foreach($course->get_all_childs() as $child):?>
		                        <tr>
		                            <td width="300"><?php echo $child->course_full_name()?></td>
		                            <td width="300"><?php echo $child->lessons_count?></td>
		                            <td width="300"><?php echo sprintf($lang["price_pattern"],$child->price)?></td>
		                        </tr>
	                        <?php endforeach;?>
	                    </tbody>
	                </table>
                <?php endforeach;?>
                <div class="clear"></div>

            </div>
            <p class="heading">
                <?php echo $lang["group_less"]?>
            </p>
            <div class="price_form">
                <table>
                    <thead>
                        <tr>
                            <th width="300"><?php echo $lang["course"]?></th>
                            <th width="300"><?php echo $lang["l_count"]?></th>
                            <th width="300"><?php echo $lang["lesson_price"]?><br/><small><?php echo $lang["groupe_price_desc"]?></small></th>
                        </tr>

                    </thead>
                </table>
                <table>
                        <tr>
                        	<td width="300"><?php echo $lang["people_group_price"]?></td>
                        	<td width="300"></td>
                        	<td width="75">2</td>
                        	<td width="75">3-4</td>
                        	<td width="75">5-6</td>
                        	<td width="75">7-8</td>
                        </tr>
                </table>
                <?php foreach($courses as $course):?>
               		<p class="price_cource"><?php echo $course->name()?></p>
	                <table>
	                    <tbody>
	                    	<?php foreach($course->get_all_childs_with_groups() as $child):?>
		                        <tr>
		                            <td width="300"><?php echo $child->course_full_name()?></td>
		                            <td width="300"><?php echo $child->lessons_count?></td>
		                            <td width="75"><?php echo sprintf($lang["price_pattern"],$child->group_price->price_2)?></td>
		                            <td width="75"><?php echo sprintf($lang["price_pattern"],$child->group_price->price_4)?></td>
		                            <td width="75"><?php echo sprintf($lang["price_pattern"],$child->group_price->price_6)?></td>
		                            <td width="75"><?php echo sprintf($lang["price_pattern"],$child->group_price->price_8)?></td>
		                        </tr>
	                        <?php endforeach;?>
	                    </tbody>
	                </table>
                <?php endforeach;?>
                <div class="clear"></div>

            </div>

            <div class="clear"></div>

        </div>
    </div>
    <!-- end content -->

<?php include Kohana::find_file("views","footer");?>