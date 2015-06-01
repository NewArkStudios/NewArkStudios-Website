function(){
	var falp = document.getElementsByClassName('first');
	var prev = document.getElementsByClassName('prev');
	var nex = document.getElementsByClassName('nex');
	if (falp.length > 0){
		prev[0].style.display = "none";
		nex[0].style.display = "none";
	}
}