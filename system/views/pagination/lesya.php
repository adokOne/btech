<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Extended pagination style
 * 
 * @preview  « Previous | Page 2 of 11 | Showing items 6-10 of 52 | Next »
 */
?>

<div id="pagination_bottom" class="pagination clearfix">
 <ul class="pagination">
	<?php if ($previous_page): ?>
	    <li id="pagination_previous_bottom" class="disabled pagination_previous">
	       <a href="<?php echo str_replace('{page}', $previous_page, $url) ?>">
		       <i class="fa fa-chevron-left"></i> 
		       <b><?php echo Kohana::lang('global.previous') ?></b>
	       </a>
	    </li>
	<?php else:?>
	    <li id="pagination_previous_bottom" class="disabled pagination_previous">
	       <span>
	       <i class="fa fa-chevron-left"></i> 
	       <b><?php echo Kohana::lang('global.previous') ?></b></b>
	       </span>
	    </li>
	<?php endif;?>
	<?php for ($i = 1; $i <= $total_pages; $i++): ?>
		<?php if ($i == $current_page): ?>
	    <li class="active current">
	       <span>
	       <span><?php echo $i;?></span>
	       </span>
	    </li>
		<?php else:?>
		    <li>
		       <a href="<?php echo str_replace('{page}', $i, $url) ?>">
		       <span><?php echo $i;?></span>
		       </a>
		    </li>
	    <?php endif;?>
	<?php endfor;?>
    <?php if ($next_page): ?>
	    <li id="pagination_next_bottom" class="pagination_next">
	       <a href="<?php echo str_replace('{page}', $next_page, $url) ?>">
	       <b><?php echo Kohana::lang('global.next') ?></b> <i class="fa fa-chevron-right"></i>
	       </a>
	    </li>
    <?php else:?>
	    <li id="pagination_next_bottom" class="disabled pagination_next">
	       <span>
		       <i class="fa fa-chevron-left"></i> 
		       <b><?php echo Kohana::lang('global.previous') ?></b></b>
	       </span>
	    </li>
    <?php endif;?>
 </ul>
</div>
<div class="product-count">
 <?php echo sprintf(Kohana::lang("global.showing"),$current_first_item,$current_last_item,$total_items);?>
</div>