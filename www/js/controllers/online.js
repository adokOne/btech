$.Controller("OnlineRegController",{

	init:function(){
		this.element.find("select").selectbox();
	},
	load_courses:function(id){
		$.ajax({
			type:"post",
			dataType:"json",
			url:"/main/load_courses",
			data:{id:id},
			success:function(resp){
				if(resp.data.size() >0){
					$("#course,#group select").remove()
				}
				else{

				}
			}
		})
	},
	"select[name=parent_cat] -> change":function(ev){
		this.load_courses($(ev.target).val())
	}

});
$("<select name='course_2'/>")
