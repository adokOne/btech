$.Controller("Main",{
  init:function(){
  },
  "a.scroll -> click":function(ev){
    ev.preventDefault();
    el     = $(ev.target).parent("a");
    offset = $(el.attr("href")).offset().top;
    parent =  $.browser.safari ? "body" : "html";
    $(parent).animate( { scrollTop: offset }, 1100 );
  },
  ".ord_btn -> click":function(ev){
    var self = this; 
    ev.preventDefault();
    $.ajax({
      url:$(ev.target).attr("href"),
      dataType:"json",
      success:function(resp){
        if(resp.success){
          self.element.find(".total").text(resp.price);
          self.element.find(".count").text(resp.count);
        }
      }
    })
  },
  ".time.counter a -> click":function(ev){
    ev.preventDefault();
  },
  ".counts.counter a -> click":function(ev){
    ev.preventDefault();
  },
  ".delete -> click":function(ev){
    ev.preventDefault();
  },
})