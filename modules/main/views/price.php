<?php include Kohana::find_file("views","header");?>
    <!-- content -->
    <div id="content">
        <div class="wrapper">
            <p class="heading">
                <?php echo $lang["idividual_less"]?>
            </p>
            <div class="price_form">
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr class="table_head">
                            <th width="300"><?php echo $lang["course"]?></th>
                            <th width="300"><?php echo $lang["l_count"]?></th>
                            <th width="300"><?php echo $lang["lesson_price"]?></th>
                        </tr>
                    </thead>
                </table>
                <?php foreach($courses as $course):?>
               		<p class="price_cource"><a href="<?php echo url::lang_url()."courses/".$course->seo();?>"><?php echo $course->name()?></a></p>
	                <table cellpadding="0" cellspacing="0">
	                    <tbody>
	                    	<?php $i=1; foreach($course->get_all_childs() as $child):?>
		                        <tr <?php if($i%2===0):?> class="table_grey" <?php endif; $i++?>>
		                            <td width="300"><?php echo $child->name()?></td>
		                            <td width="300"><?php echo sprintf($lang["ak_god"],$child->lessons_count) ?></td>
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
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr class="table_head group">
                            <th width="300"><?php echo $lang["course"]?></th>
                            <th width="300"><?php echo $lang["l_count"]?></th>
                            <th width="300"><?php echo $lang["lesson_price"]?><br/><small><?php echo $lang["groupe_price_desc"]?></small></th>
                        </tr>

                    </thead>
                </table>
                <table cellpadding="0" cellspacing="0">
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
                <?php if(count($course->get_all_childs_with_groups())):?>
               		<p class="price_cource"><a href="<?php echo url::lang_url()."courses/".$course->seo();?>"><?php echo $course->name()?></a></p>
	                <table cellpadding="0" cellspacing="0">
	                    <tbody>
	                    	<?php $i=1; foreach($course->get_all_childs_with_groups() as $child):?>
		                        <tr <?php if($i%2===0):?> class="table_grey" <?php endif; $i++?>>
		                            <td width="300"><?php echo $child->name()?></td>
		                            <td width="300"><?php echo sprintf($lang["ak_god"],$child->lessons_count) ?></td>
		                            <td width="75"><?php echo sprintf($lang["price_pattern"],$child->group_price->price_2)?></td>
		                            <td width="75"><?php echo sprintf($lang["price_pattern"],$child->group_price->price_4)?></td>
		                            <td width="75"><?php echo sprintf($lang["price_pattern"],$child->group_price->price_6)?></td>
		                            <td width="75"><?php echo sprintf($lang["price_pattern"],$child->group_price->price_8)?></td>
		                        </tr>
	                        <?php endforeach;?>
	                    </tbody>
	                </table>
                <?php endif;?>
                <?php endforeach;?>
                <div class="clear"></div>

            </div>

            <div class="clear"></div>

        </div>
    </div>
    <!-- end content -->

<?php include Kohana::find_file("views","footer");?>