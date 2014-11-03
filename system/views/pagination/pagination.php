<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Classic pagination style
 * 
 * @preview  ‹ First  < 1 2 3 >  Last ›
 */
?>

<ul class="pagination pagination-sm">


<!-- 	<?php if ($first_page): ?>
		<li class="paginate_button previous disabled" aria-controls="datatable_fixed_column" tabindex="0" id="datatable_fixed_column_previous">
		<a href="<?php echo str_replace('{page}', 1, $url) ?>">&lsaquo;&nbsp;<?php echo Kohana::lang('pagination.first') ?></a>
		</li>
	<?php endif ?> -->

	<?php if ($previous_page): ?>
   		<li class="paginate_button previous" aria-controls="datatable_fixed_column" tabindex="0" id="datatable_fixed_column_previous">
			<a href="<?php echo str_replace('{page}', $previous_page, $url) ?>"><?php echo Kohana::lang('pagination.previous') ?></a>
		</li>
	<?php endif ?>


	<?php for ($i = 1; $i <= $total_pages; $i++): ?>

		<?php if ($i == $current_page): ?>
		<li class="active " aria-controls="datatable_fixed_column" tabindex="0">
			<a><?php echo $i ?></a>
			</li>
		<?php else: ?>
		    <li class="paginate_button " aria-controls="datatable_fixed_column" tabindex="0">
				<a href="<?php echo str_replace('{page}', $i, $url) ?>"><?php echo $i ?></a>
			</li>
		<?php endif ?>

	<?php endfor ?>


	<?php if ($next_page): ?>
	 <li class="paginate_button next" aria-controls="datatable_fixed_column" tabindex="0" id="datatable_fixed_column_next">
		<a href="<?php echo str_replace('{page}', $next_page, $url) ?>"><?php echo Kohana::lang('pagination.next') ?></a>
	</li>
	<?php endif ?>

<!-- 	<?php if ($last_page): ?>
	<li class="paginate_button next" aria-controls="datatable_fixed_column" tabindex="0" id="datatable_fixed_column_next">
		<a href="<?php echo str_replace('{page}', $last_page, $url) ?>"><?php echo Kohana::lang('pagination.last') ?>&nbsp;&rsaquo;</a>
	</li>
	<?php endif ?> -->

</ul>