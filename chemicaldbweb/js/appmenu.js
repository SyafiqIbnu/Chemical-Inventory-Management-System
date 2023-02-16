//var str='menu-administration-application-level3';
//var str='menu-administration-user';
//var str='menu-administration-admin';
function setMenuActive(target){
	$(target).tab('show');
	var parts=target.split("-");
	var objId="#menu";
	for (i = 1; i < parts.length; i++) {
		objId +="-" +  parts[i];
		
		if(i==1){
			var p=$(objId);
			p.parent('.has-treeview').addClass("menu-open");
			$(objId).tab('show');
		}else if(i==parts.length-1){
			var p=$(objId);
			p.addClass('bg-red');
			p.parent('.has-treeview').addClass("menu-open");
			$(objId).tab('show');
		}else{
			var p=$(objId);
			p.addClass('bg-warning');
			p.parent('.has-treeview').addClass("menu-open");
			$(objId).tab('show');
		}
	}
}