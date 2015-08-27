function loadUser () {
	xmlhttp = new XMLHttpRequest();xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("show").innerHTML = xmlhttp.responseText;
        }
    }
	xmlhttp.open("GET","admin_users.php",true);
    xmlhttp.send();
}
jQuery(document).ready(function($) {

 	$.ajax({
 		
 		type: 'POST',
                url: 'admin_users.php',
 		data: { action: 'nb_users'}
 	})
 	.done(function(html) {
            $("#us").html(html);
 	})
 	.fail(function() {
 		console.log("error");
 	})
 	.always(function() {
 		console.log("complete");
 	});

    
});