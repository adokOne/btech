$.Controller("AdminOrders",{
  init:function(){
  	$(".datepicker").datepicker({ 
      dateFormat: 'dd.mm.yy' ,
      onSelect: function(dateText) {
        $('<form action="/admin/orders"></form>')
        .append('<input name="'+$(this).attr("name")+'" value="' + $.datepicker.formatDate('yy-mm-dd', $(this).datepicker('getDate'))  + '" />')
        .submit();
      }
    });
  },
  ".second select -> change":function(ev){
  	var el = $(ev.target);
	  $('<form action="/admin/orders"></form>')
	  .append('<input name="'+el.attr("name")+'" value="' + el.val() + '" />')
	  .submit();
  },
  ".second input -> keyup":function(ev){
  	var el = $(ev.target);
  	if(el.val().length > 3){
		$('<form action="/admin/orders"></form>')
		  .append('<input name="'+el.attr("name")+'" value="' + el.val() + '" />')
		  .submit();
  	}
  }
});