$.Controller("AdminLogin",{
  init:function(){
  	this.setup_validation();
  },
  setup_validation: function() {
    var self = this
    this.element.validate({
	rules : {
		email : {
			required : true,
			email : true
		},
		password : {
			required : true,
			minlength : 3,
			maxlength : 20
		}
	},
	errorPlacement : function(error, element) {
		error.insertAfter(element.parent());
	},
    onkeyup: false,
    onfocusout: false,
    focusCleanup: true,
    focusInvalid: false,
    minlength:3
    });
  },
  submit_form:function(){
  	var self = this;
  	$.ajax({
  		url:self.element.attr("url"),
  		data:self.element.serialize(),
  		type:"post",
  		dataType:"json",
  		success:function(resp){
  			if(resp.success){
  				window.location.reload();
  			}
  			else{
  				alert(resp.text);
  			}
  		},
  		error:function(resp){
  			console.log("Server error");
  		}
  	});
  },
  ".btn-primary -> click":function(ev){
      ev.preventDefault();
      if(this.element.valid()){
       this.submit_form();
      }
  },
});