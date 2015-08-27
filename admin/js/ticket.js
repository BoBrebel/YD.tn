function loadTicket () {
	xmlhttp = new XMLHttpRequest();xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("show").innerHTML = xmlhttp.responseText;
        }
    }
	xmlhttp.open("GET","admin_ticket.php",true);
    xmlhttp.send();
}
function loadTicketConsulter(id) {
	xmlhttp = new XMLHttpRequest();xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("show").innerHTML = xmlhttp.responseText;
        }
    }
	xmlhttp.open("GET","ConsulterTicket.php?IdTicket="+id,true);
    xmlhttp.send();
}
jQuery(document).ready(function($) {
	// xmlhttp = new XMLHttpRequest();xmlhttp.onreadystatechange = function() {
 //    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 //        document.getElementById("badge_ticket").innerHTML = xmlhttp.responseText;
 //        }
 //    }
	// xmlhttp.open("GET","countrowTicket.php",true);
 //    xmlhttp.send();
 	
 	$.ajax({
 		
 		type: 'POST',
                url: 'admin_ticket.php',
 		data: { action: 'nb_ticket'}
 	})
 	.done(function(html) {
            $("#tick").html(html);
 	})
 	.fail(function() {
 		console.log("error");
 	})
 	.always(function() {
 		console.log("complete");
 	});

    
});