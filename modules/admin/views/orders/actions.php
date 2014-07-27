	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<a class="btn btn-success" href="/admin/orders/index">Сбросить фильтр</a>
			</li>
			<li class="sparks-info">
				<a class="btn btn-primary" href="/admin/orders/new_one">Добавить</a>
			</li>
			<li class="sparks-info">
				<a class="btn btn-warning" href="/admin/orders/export">Екпорт в Exel</a>
			</li>
			<li class="sparks-info">
				<h5> Всего заказов <span class="txt-color-greenDark">
					<i class="fa fa-shopping-cart"></i>&nbsp;<?php echo $total;?></span></h5>
				<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
					<canvas width="82" height="26" style="display: inline-block; width: 82px; height: 26px; vertical-align: top;"></canvas>
				</div>
			</li>
		</ul>
	</div>