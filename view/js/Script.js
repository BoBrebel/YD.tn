function Search() {

	$("#pre").show();
	var recherche=$("#mail").val();
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        $("#pre").hide();
        //document.getElementById("modal2").innerHTML = xmlhttp.responseText;
	var user = jQuery.parseJSON( xmlhttp.responseText );
	$('#profile_pic').attr( "src", user.pic );
	$('#name').html(user.name);
	$('#email').html(user.mail);
	$("#back").show();


        }
    }
    xmlhttp.open("GET","https://yd.tn/controller/google-api/browse.php?keyword="+recherche,true);
    xmlhttp.send();
}
function setInput(name,mail){
    $("#mail").val(mail);
    $("#keyword").val(name);
}
