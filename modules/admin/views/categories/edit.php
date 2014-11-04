<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">

        <header role="heading">
          <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
          <h2>Редактирование категори</h2>        

        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
        <div class="widget-toolbar" role="menu">
          <a  href="javascript:void(0);" class="btn-warning btn button-icon jarviswidget-toggle-btn">RU</a>
          <a  href="javascript:void(0);" class="active btn-warning btn button-icon jarviswidget-toggle-btn" style="margin-left:10px;">UK</a>
        </div>
        </header>

        <!-- widget div-->
        <div role="content">
          
          <!-- widget edit box -->
          <div class="jarviswidget-editbox">
            <!-- This area used as dropdown edit box -->
            
          </div>
          <!-- end widget edit box -->
          
          <!-- widget content -->
          <div class="widget-body no-padding">
            
            <form onsubmit="return postForm()"action="/admin/categories/update" id="checkout-form" class="smart-form" method="post" enctype="multipart/form-data" novalidate> 

              <fieldset>
                <div class="row">
                  <input type="hidden" name="object[id]" value="<?php echo $object->id?>"/>
                  <section class="col col-6">
                    <?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "name_".$k;?>
                      <label class="input lang lang_<?php echo $k;?>"> <i class="icon-append fa fa-tag"></i>
                        <input required="required" type="text" name="object[<?php echo $f;?>]" placeholder="Название" value="<?php echo $object->$f?>">
                      </label>
                    <?php endforeach;?>
                  <label class="label">Родительская категория</label>
                  <label class="select">
                    <select name="object[parent_id]">
                      <option  <?php echo $object->parent_id == 0 ? "selected" : ""?>  value="0">Главная</option>
                      <?php foreach($categories as $cat):?>
                      <option <?php echo $object->parent_id == $cat->id ? "selected" : ""?> value="<?php echo $cat->id?>"><?php echo $cat->name();?></option>
                      <?php endforeach;?>
                    </select>
                  </label>
                  </section>
                </div>
              </fieldset>
              <footer>
                <button type="submit" class="btn btn-primary">
                  Зберегти
                </button>
              </footer>
              
            </form>
            
          </div>
          <!-- end widget content -->
        </div>
        <!-- end widget div -->
        
      </div>
      <style type="text/css">
      .note-editor .btn-group button{
        padding: 6px 12px!important;
      }
      textarea.note-codeable,.hidden{
        display: none!important;
      }
      </style>
<script type="text/javascript">
  $(document).ready(function(){
    $(".button-icon").click(function(ev){
      ev.preventDefault();
      if($(this).hasClass("active")) return;
      $(this).siblings().removeClass("active");
      $(this).addClass("active");
      var lang = $(this).text().toLowerCase();
      change_lang(lang);
    });
    change_lang(window.language)

  })
  function change_lang(lang){
    $(".lang").hide();
    $(".lang input,.lang textarea").removeAttr("required");
    $(".lang_"+lang).show();
    $(".lang_"+lang+" input,.lang_"+lang+" textarea").attr("required","required");
  }
</script>