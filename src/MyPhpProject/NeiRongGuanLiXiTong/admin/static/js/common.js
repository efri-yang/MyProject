function handleResultLocation(url,skinTime){
	var countElem=document.getElementById("timecount");
	var num=skinTime;
	var Timer;
	countElem.innerHTML=num;
	function timereduce(){
		clearTimeout(Timer);
		if(num<=1){
			window.location.href=url;
		}else{
			num--;
			countElem.innerHTML=num;
			Timer=setTimeout(timereduce,1000);

		}

	}
	Timer=setTimeout(timereduce,1000);
}