$(document).ready(function(){
	$("#permission_admin_module_id").change(function(ev){
		var idx = $("#permission_admin_module_id option").index($("#permission_admin_module_id option:selected"))
		$(".perm_actions select").attr("disabled","disabled").hide()
		$(".perm_actions select:eq(" + idx + ")").removeAttr("disabled").show()
	})
})