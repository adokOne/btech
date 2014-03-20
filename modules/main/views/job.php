<?php include Kohana::find_file("views","header");?>
    <script type="text/javascript">
        $(function() {
            $('.teachers').jcarousel({
                wrap: 'circular'
            });
            
        });

    </script>
    <!-- content -->
    <div id="content">
        <div class="wrapper">
            <p class="heading">
               <?php echo $lang["job_title"]?>
            </p>
            <p class="heading_desc">
            	 <?php echo $lang["job_desc"]?>
                
            </p>
            <p class="heading_desc">
            	 <?php echo $lang["job_req_desc"]?>
                
            </p>
            <div class="items">
                <ul class="teachers jcarousel-skin-tango">
                	<?php foreach($jobs as $job):?>
                    <li class="item">
                        <a href="#">
                            <div class="item_img">
                                
                            </div>
                            <div class="item_text">
                                <h3><?php echo $job->name()?></h3>
                            </div>   
                        </a>
                    </li>
                	<?php endforeach;?>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>

        </div>
    </div>
    <!-- end content -->
<?php include Kohana::find_file("views","footer");?>