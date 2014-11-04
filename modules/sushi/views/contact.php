<?php include Kohana::find_file("views","header");?>

<section>
   <div id="container">
   <p id="back-top"> <a href="#top"><span></span></a> </p>
   <div class="container">
      <?php include Kohana::find_file("views","notify");?>
      <div class="row">
         <div class="span12">
            <div class="row">
               <div class="span9  " id="content">
                  <div class="breadcrumb">
                     <a href="#"><?php echo Kohana::lang("global.contacts")?></a>
                  </div>
                  <form data action="/contacts" method="post" enctype="multipart/form-data" id="contact">
                     <h2><?php echo Kohana::lang("global.location")?></h2>
                     <div class="contact-info">
                        <div class="content row-fluid">
                           <div class="map-left span6">
                              <div class="contact-box"><i class="icon-home"></i><b><?php echo Kohana::lang("global.addres") ?>:</b>
                                 <?php echo Kohana::lang("global.foter_address") ?>           
                              </div>
                              <?php foreach(Kohana::config("core.phones") as $phone):?>
                                 <div class="contact-box">
                                    <i class="icon-phone"></i><b><?php echo Kohana::lang("global.phone") ?>:</b>
                                    <?php echo $phone?>                         
                                 </div>
                              <?php endforeach;?>
                           </div>
                           <div class="map-content span6">
                              <figure>
                                 <iframe width="100%" height="200px" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                              </figure>
                           </div>
                        </div>
                     </div>
                     <div class="content contact-f form-horizontal">
                        <h2><?php echo Kohana::lang("global.contact_us")?></h2>
                        <div class="control-group">
                           <label class="control-label" for="name"><?php echo Kohana::lang("global.fio")?>:</label>
                           <div class="controls">
                              <input required="required" class="span5" type="text" name="contact[name]" value="">
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="email"><?php echo Kohana::lang("global.email")?>:</label>
                           <div class="controls">
                              <input required="required" class="span5" type="text" name="contact[email]" value="">
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="message"><?php echo Kohana::lang("global.message")?>:</label>
                           <div class="controls">
                              <textarea required="required" class="span5" name="contact[message]" cols="40" rows="10"></textarea>
                           </div>
                        </div>
                        <div class="control-group">
                           <div class="controls">
                              <div class="buttons"><a onclick="$('#contact').submit();" class="button"><span><?php echo Kohana::lang("global.send")?></span></a></div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <aside class="span3" id="column-left">
                  <div class="box category">
                     <div class="box-heading"><?php echo Kohana::lang("global.categories")?></div>
                     <div class="box-content">
                        <div class="box-category">
                           <ul>
                        <?php foreach($categories as $category):  ?> 
                        <li class="cat-header <?php echo isset($active_category) && $active_category->id == $category->id ? "active" : ""?> <?php echo count($category->children) ? "parent" : ""?>">
                           <a href="<?php echo isset($active_category) && $active_category->id == $category->id ? "#" : url::base()."category/".$category->seo_name?>"><?php echo $category->name();?></a>
                           <?php if(count($category->children)):?>
                           <ul class="active">
                              <?php foreach($category->children as $cat):?> 
                                 <li class="<?php echo isset($active_category) && $active_category->id == $cat->id ? "active" : ""?>">
                                    <a href="<?php echo isset($active_category) && $active_category->id == $cat->id ? "#" : url::base()."category/".$cat->seo_name?>"><?php echo $cat->name();?></a>
                                 </li>
                              <?php endforeach;?>
                           </ul>
                           <?php endif;?>
                        </li>
                        <?php endforeach;?>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="clear"></div>
               </aside>
               </div>
            </div>
            <div class="clear"></div>
         </div>
      </div>
   </div>
   <div class="clear"></div>
</section>
<?php include Kohana::find_file("views","footer");?>