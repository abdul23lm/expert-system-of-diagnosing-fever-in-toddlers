/* Affix The Navbar After Scroll Below Header */
$('#nav').affix({
      offset: {
        top: $('header').height()-$('#nav').height()
      }
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

/* Scroll To Up Page */
$(window).scroll(function(){
	if ($(this).scrollTop() > 100) {
		$('.scrolltoup').fadeIn();
	} else {
		$('.scrolltoup').fadeOut();
	}
}); 
$('.scrolltoup').click(function(){
	$("html, body").animate({ scrollTop: 0 }, 600);
	return false;
});	
/* Date and Time Widget */
function showTime() {
    var a_p = "";
    var today = new Date();
    var curr_hour = today.getHours();
    var curr_minute = today.getMinutes();
    var curr_second = today.getSeconds();
    curr_hour = checkTime(curr_hour);
    curr_minute = checkTime(curr_minute);
    curr_second = checkTime(curr_second);
	document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
setInterval(showTime, 500);
function startDate(){
	var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth();
	var thisDay = date.getDay(),
		thisDay = myDays[thisDay];
	var yy = date.getYear();
	var year = (yy < 1000) ? yy + 1900 : yy;
	document.getElementById('time').innerHTML=thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
}
setInterval(startDate, 500);
