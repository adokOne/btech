$.Controller("OnlineRegController",{
	has_child:false,
	has_group:false,

	init:function(){
		this.element.find("select").selectbox();
	},
	load_courses:function(id,next_course,group){
		next_course = next_course || false
		group = group || false
		var self = this
		$.ajax({
			type:"post",
			dataType:"json",
			url:"/main/load_courses",
			data:{id:id},
			success:function(resp){
				if(resp.data.length >0){
					if(!group){
						if(!next_course){
							console.log(1)
							$("#course select ,#group select ,#course2 select").selectbox("detach").remove();
							self.create_select(resp.data)
						}
						else{
							console.log(2)
							$("#group select ").selectbox("detach").remove()
							self.create_select_2(resp.data)
						}
						
					}
					else{
						self.create_select_3(resp.data)
					}
				}
				
			}
		})
	},
	"select[name=parent_cat] -> change":function(ev){
		this.load_courses($(ev.target).val())
	},
	"select[name=course_2] -> change":function(ev){
		var opt = $(ev.target).find("option:selected") 
		var options = opt.data("options")
		if(options.has_child)
			this.load_courses($(ev.target).val(),true,false)
		if(options.has_group)
			this.load_courses($(ev.target).val(),true,true)
	},
	"select[name=course_3] -> change":function(ev){
		var opt = $(ev.target).find("option:selected") 
		var options = opt.data("options")
		if(options.has_group)
			this.load_courses($(ev.target).val(),true,true)
		else
			$("#group select ").selectbox("detach").remove()
	},
	create_select:function(data){
		var select = $("<select name='course_2'/>");
		for(i in data){
			var option = $("<option value='" + data[i].id + "'>" + data[i].name + "</option>")
			option.data("options",data[i])
			select.append(option)
		}
		this.element.find("#course").append(select)
		this.element.find("#course").show();
		select.selectbox();
	},
	create_select_2:function(data){
		var select = $("<select name='course_3'/>");
		for(i in data){
			select.append($("<option value='" + data[i].id + "'>" + data[i].name + "</option>"))
		}
		this.element.find("#course2").append(select)
		this.element.find("#course2").show();
		select.selectbox();
	},
	create_select_3:function(data){
		var select = $("<select name='group'/>");
		for(i in data){
			select.append($("<option value='" + data[i].id + "'>" + data[i].name + "</option>"))
		}
		this.element.find("#group").append(select)
		this.element.find("#group").show();
		select.selectbox();
	}

});

