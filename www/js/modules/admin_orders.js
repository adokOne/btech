$.Controller("AdminOrders",{
  init:function(){
  	console.log("ewf")
  },
  ".second select -> change":function(ev){
  	var el = $(ev.target);
	$('<form action="/admin/orders"></form>')
	  .append('<input name="'+el.attr("name")+'" value="' + el.val() + '" />')
	  .submit()
	;
  },
  ".second input -> keyup":function(ev){
  	var el = $(ev.target);
  	if(el.val().length > 3){
		$('<form action="/admin/orders"></form>')
		  .append('<input name="'+el.attr("name")+'" value="' + el.val() + '" />')
		  .submit()
		;
  	}
  }
});