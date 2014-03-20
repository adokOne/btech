<?php include Kohana::find_file("views","header");?>

   <!-- content -->
    <div id="content">
        <div class="wrapper">
            <p class="heading">
                <?php $lang["contacts_heading"]?>
            </p>
            <p class="heading_desc">
            	<?php $lang["contacts_desc"]?>
            </p>
            <div class="contacts_form">
                
                <div class="left">
                    <h6><?php echo $lang["addr"]?></h6>
                    <p class="city"><?php echo $lang["lviv"]?></p>
                    <p><?php echo $lang["address"]?></p>
                    <table>
                        <tr>
                            <td class="type" width="80"><?php echo $lang["tel"]?>:</td>
                            <td>+38(050)503-41-55</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>+38(050)503-41-55</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>+38(050)503-41-55</td>
                        <tr>
                            <td></td>
                            <td>+38(050)503-41-55</td>
                        </tr>
                        <tr></tr><tr></tr>
                        <tr><td class="type">Email:</td><td>bkt-support@ukr.net</td></tr>
                        <tr><td class="type">Skype:</td><td>natali_chabanyk</td></tr>
                        <tr><td class="type">ICQ:</td><td>395-852-454</td></tr>
                    </table>
                </div>
                <div class="right">
                    <h6><?php echo $lang["on_map"]?></h6>
                    <div id="map_layout">
                        <iframe width="450" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ua/maps?near=%D1%83%D0%BB.+%D0%A2%D0%B0%D0%B4%D0%B5%D1%83%D1%88%D0%B0+%D0%9A%D0%BE%D1%81%D1%82%D1%8E%D1%88%D0%BA%D0%BE,+18,+%D0%9B%D1%8C%D0%B2%D0%BE%D0%B2,+%D0%9B%D1%8C%D0%B2%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C&amp;geocode=CfyAMw8kmOiUFX6D-AIdBZJuASlF2P-Dcd06RzHsNu6C6NWwWg&amp;q=%D0%B1%D0%BA%D1%82&amp;f=l&amp;hl=ru&amp;sll=49.841428,24.023559&amp;sspn=0.009853,0.026479&amp;t=h&amp;ie=UTF8&amp;hq=%D0%B1%D0%BA%D1%82&amp;hnear=&amp;ll=49.841022,24.023557&amp;spn=0.009853,0.026479&amp;z=14&amp;iwloc=A&amp;cid=10326277041113641997&amp;output=embed"></iframe>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>

        </div>
    </div>
    <!-- end content -->

<?php include Kohana::find_file("views","footer");?>