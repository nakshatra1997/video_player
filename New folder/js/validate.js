function usern(inputid)
{   var a=document.getElementById(inputid);
	var check=/^[-\w\.\$@\*\!]{5,30}$/;
	if(!check.test(a.value))
	{
		document.getElementById('usererror').innerHTML="Minimum 5 characters without space";
		a.value="";
	}
	else
		document.getElementById('usererror').innerHTML="";
}