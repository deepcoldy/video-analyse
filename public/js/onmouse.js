
function bottonClose(){
	var result_div=document.getElementById('result_div');
	result_div.style.display='none';
}
function buttonMore(){
	var more_img=document.getElementById('more_img');
	var more_div=document.getElementById('more_div');
	var more_Dis=more_div.style.display;
	// alert(more_Dis);
	if(more_Dis=='block'){
		more_img.style.transform='rotate(180deg)';
		more_div.style.display='none';
	}else{
		more_img.style.transform='rotate(0deg)';
		more_div.style.display='block';
	}
	
}