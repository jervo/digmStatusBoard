// Initial Functions
$(document).ready(function() {
	startTime();
	showCurDay();
	resizeEvents($('.event'));
	removeInteraction();
	$.simpleWeather({
		location: 'Philadelphia, PA',
		woeid: '',
		unit: 'f',

		success: function(weather) {
			html = '<div class="weather-icon icon-'+weather.code+'"></div><h2> '+weather.temp+'&deg; <span class="deg">'+weather.units.temp+'</span></h2>';
			if (weather.code == 'undefinded') {
				html= '<h4>Go Outside</h4>';
			}
			$("#weather").html(html);
		},
		error: function(error) {
			$("#weather").html('<h4>Go Outside</h4>');
		}
	});

	//Play video on large screens
	// if ($(window).width() >= screenLrg) {
	// 	$('#video video').get(0).play();
	// }

	//Toggle sections
	var headers = $('section > .section-header');
	headers.click( function() {
		if ($(window).width() < screenMed){
			$(this).siblings(".section-content").slideToggle();
			$(this).toggleClass("open");
		}
	});

	//Toggle nested sections
	var nestedHeaders = $('.nested-accordion .section-header');
	nestedHeaders.click( function() {
		if ($(window).width() < screenLrg){
			$(this).siblings(".section-content").slideToggle();
			$(this).toggleClass("open");
		}
	});

	//Toggle Menu
	var menuBtn = $('.menu-btn');
	var menu = $('.mobile-menu');
	menuBtn.click( function() {
		menu.slideToggle();
	});
	$('.mobile-menu a').click(function() {
		var clickedLink = $(this).attr('href');
		var clickedLink = clickedLink + " > .section-content";
		$(clickedLink).show();
	});


	//Toggle Modal Popup
	$(".overlay").click( function() {
		$('.overlay').hide();
		$(".modal").hide();
		$("body").toggleClass("no-scroll");
	});

	$(".close").click( function() {
		$('.overlay').hide();
		$(".modal").hide();
		$("body").toggleClass("no-scroll");
	});

	//Modal popup
	$('.event').click(function() {
		evnt = $(this).attr('id');
		key = evnt.replace('event-', '');
		modal = "#modal-" + key;
		$(modal).show();
		$(".overlay").show();
		$("body").toggleClass("no-scroll");
		setTimeout(function(){ $('.modal').hide();$('.overlay').hide(); }, 15000);
	});

	//News Modal popup
	$('.rss-item').click(function() {
		if ($(window).width() >= screenLrg) {
			$('.news-modal').hide();
			console.log('clicked rss item');
			evnt = $(this).attr('id');
			key = evnt.replace('news-', '');
			modal = "#modal-" + key;
			console.log(modal);
			$(modal).show();
		}
		setTimeout(function(){ $('.news-modal').hide(); }, 15000);
	});

	$('.news-modal--close').click(function () {
		$('.news-modal').hide();
	})
});

var screenLrg = 1900;
var screenMed = 1200;

//Run on resize of browser
$(window).resize( function() {
	resizeEvents($('.event'));
	removeInteraction();
});


//Start Clock
function startTime() {
	var today=new Date();
	var h=today.getHours();
	var m=today.getMinutes();
	var timeOfDay = "AM";

	if (h > 12) {
		h = h - 12;
		timeOfDay ="PM";
	} else if (h == 12) {
		timeOfDay ="PM";
	}

	// add a zero in front of numbers<10
	m=checkTime(m);
	getcurDate();
	document.getElementById('time').innerHTML=h+":"+m;
	document.getElementById('time-of-day').innerHTML= timeOfDay;

	t=setTimeout(function(){startTime()},500);
}


//Update Clock
function checkTime(i) {
	if (i<10)
	{
		i="0" + i;
	}
	return i;
}



//Post Curremt Date
function getcurDate () {
	var fullDate = new Date();
	var month = fullDate.getMonth();
	var day = fullDate.getDate();
	var year = fullDate.getFullYear();

	switch(month) {
		case 0:
		month = 'Jan';
		break;
		case 1:
		month = 'Feb';
		break;
		case 2:
		month = 'Mar';
		break;
		case 3:
		month = 'Apr';
		break;
		case 4:
		month = 'May';
		break;
		case 5:
		month = 'Jun';
		break;
		case 6:
		month = 'Jul';
		break;
		case 7:
		month = 'Aug';
		break;
		case 8:
		month = 'Sep';
		break;
		case 9:
		month = 'Oct';
		break;
		case 10:
		month = 'Nov';
		break;
		case 11:
		month = 'Dec';
		break;
		default:
		month = "?";
	}


	if (day == 1 || day == 21 || day == 31) {
		day = day + 'st';
	} else if (day == 2 || day == 22 ){
		day = day + 'nd';
	} else if (day == 3 || day == 23 ) {
		day = day + 'rd';
	} else {
		day = day + 'th';
	}

	$('.date').html(month + " " + day + ", " + year);
}


//Function to convert a MM/DD/YYYY date
function parseDate(str) {
	var mdy = str.split('/')
	return new Date(mdy[2], mdy[0]-1, mdy[1]);
}


//Function to figure out how many days
//are inbetween two dates
function daydiff(first, second) {
	return (second-first)/(1000*60*60*24);
}

//Function to figure out current day
function currentDay() {
	var d = new Date();
	var curr_date = d.getDate();
	var curr_month = d.getMonth();
	var curr_year = d.getFullYear();
	return ((curr_month+1) + "/" + curr_date + "/" + curr_year);
}


//Function that places a marker depending
//on where we currently are in the acamdemic year
function termTimeline (fallStartDate, summerEndDate) {
	fallStartDate = parseDate(fallStartDate);
	summerEndDate = parseDate(summerEndDate);

	var totalDays = daydiff(fallStartDate, summerEndDate);

	var formattedDate = parseDate(currentDay());
	var daysElapsed = daydiff(fallStartDate, formattedDate) + 1.6;
	var percentElapsed = ((daysElapsed/totalDays) * 100) + "%";

	$('#term-overlay').css('width', percentElapsed);
};


//Function that figures out the days left
//until the finals week of that term
function daysLeftFinals (termStartDate, finalsStart) {

	finalsStart = finalsStart;
	finalsStart = parseDate(finalsStart);

	termStartDate = parseDate(termStartDate);

	var formattedDate = parseDate(currentDay());
	var daysLeft = Math.round(daydiff(formattedDate, finalsStart));

	var daysTotal = daydiff(termStartDate, finalsStart);

	if (daysLeft < 0) {
		daysLeft = 0;
	}
	document.getElementById("days-left-1").innerHTML = daysLeft;
	document.getElementById("days-left-2").innerHTML = daysLeft;
	if ( daysLeft < 10) {
		document.getElementById("days-left-2").innerHTML = "0" + daysLeft;
	}

	//Get the context of the canvas element we want to select
	//Get context with jQuery - using jQuery's .get() method.
	var ctx = $("#myChart").get(0).getContext("2d");
	// //This will get the first returned node in the jQuery collection.
	var myNewChart = new Chart(ctx);

	var data = [
	{
		value: (daysTotal - daysLeft),
			color: "#971B2F" //red
		},
		{
			value : daysLeft,
			color : "#96b819" //green
		}
		]

		var options = {

		//Number - The width of each segment stroke
		segmentStrokeWidth : 2,

		//The percentage of the chart that we cut out of the middle.
		percentageInnerCutout : 70,

	}
	new Chart(ctx).Doughnut(data, options);
}

//Function takes the start and end date
//of a term and displays the current week
function currentWeek (termStartDate, termEndDate) {
	termStartDate = parseDate(termStartDate);
	termEndDate = parseDate(termEndDate);

	var daysTotal = daydiff(termStartDate, termEndDate);
	var weeksTotal = daysTotal/ 7;

	var formattedDate = parseDate(currentDay());
	var daysLeft = daydiff(formattedDate, termEndDate);
	var weeksLeft = daysLeft/7;

	var currentWeek = parseInt(weeksTotal) - parseInt(weeksLeft) + 1;

	document.getElementById("week-num").innerHTML = currentWeek;
	document.getElementById("info--week").innerHTML = currentWeek;
}

//Selects random quote and displays
function randomQuote(facultyQuotes) {

	var selectedNum = Math.floor(Math.random() * facultyQuotes.length);
	//alert(selectedNum);
	var selectedQuote = facultyQuotes[selectedNum];
	//alert(selectedQuote);
	document.getElementById("faculty-quote").innerHTML = selectedQuote[0];
	document.getElementById("quote-author").innerHTML = selectedQuote[1];


}

//Show Schedule for current day
function showCurDay() {
	if ($('#day-selector').hasClass('M')) {
		$('.schedule-M').show();
	} else if ($('#day-selector').hasClass('T')) {
		$('.schedule-T').show();
	} else if ($('#day-selector').hasClass('W')) {
		$('.schedule-W').show();
	} else if ($('#day-selector').hasClass('R')) {
		$('.schedule-R').show();
	} else if ($('#day-selector').hasClass('F')) {
		$('.schedule-F').show();
	}
}



$('#day-selector li').click(function () {
	var dayClicked = $(this).text();
	var allDays = $(".row");
	if (dayClicked == "M") {
		allDays.hide();
		$('.schedule-M').show();
		$('#day-selector li').removeClass('curSchedule');
		$('li.M').addClass('curSchedule');
	} else if( dayClicked == "T") {
		allDays.hide();
		$('.schedule-T').show();
		$('#day-selector li').removeClass('curSchedule');
		$('li.T').addClass('curSchedule');
	} else if( dayClicked == "W") {
		allDays.hide();
		$('.schedule-W').show();
		$('#day-selector li').removeClass('curSchedule');
		$('li.W').addClass('curSchedule');
	} else if( dayClicked == "R") {
		allDays.hide();
		$('.schedule-R').show();
		$('#day-selector li').removeClass('curSchedule');
		$('li.R').addClass('curSchedule');
	} else if( dayClicked == "F") {
		allDays.hide();
		$('.schedule-F').show();
		$('#day-selector li').removeClass('curSchedule');
		$('li.F').addClass('curSchedule');
	}
	// closeAll();
});

//Functiont to close and reset schedule to current day
function closeAll() {
	setTimeout(function(){
		//Schedule
		$(".row").hide();
		showCurDay();
		$('#day-selector li').removeClass('curSchedule');
	}, 15000);
}


//Change position of video depending on item clicked
$('#select-video .anim').click(function() {
	$('#video video')[0].currentTime = 507;
});

$('#select-video .gmap').click(function() {
	$('#video video')[0].currentTime = 9;
});

$('#select-video .digm').click(function() {
	$('#video video')[0].currentTime = 197;
});
$('#select-video .idm').click(function() {
	$('#video video')[0].currentTime = 93;
});


//Resize width of calendar items
function resizeEvents(item) {
	var calWidth = $('.times').width() / 15;
	var calWidthMinute = calWidth / 60;

	var calHeight = $('.times').height() / 15;
	var calHeightMinute = calHeight / 60;

	item.each(function () {
	var classes = $(this).attr("class");
	var classArray = classes.split(" ");

	classArray.forEach(function(item) {
		if(item.indexOf('l') == 0) {
			eventLengthSize = item;
			eventLengthSize = eventLengthSize.replace('l', '');
			eventLengthSize = parseInt(eventLengthSize);
		}
		if(item.indexOf('s') == 0) {
			eventStart = item;
			eventStart = eventStart.replace('s', '');
			eventStart = (parseInt(eventStart) - 480) ;
		}
	});

	var result = [eventLengthSize, eventStart];

	if ($(window).outerWidth() < screenMed) {
		//get current minutes past since beginning of day: 12AM
		var eventLengthSize = result[0] * calWidthMinute;
		var eventStart = result[1] * calWidthMinute;

		$(this).css('left', (eventStart));
		$(this).css('top', '0');
		$(this).css('width', eventLengthSize + "px");
		$(this).css('height', "25px");

		positionTimeline(".current-time--small", "left", calWidthMinute, 0);

	} else {

		var eventLengthSize = result[0] * calHeightMinute;
		var eventStart = result[1] * calHeightMinute;

		$(this).css('left', '0');
		$(this).css('top', eventStart);
		$(this).css('height', eventLengthSize + "px");
		$(this).css('width',"100%");

		positionTimeline(".current-time--large", "top", calHeightMinute, 23);

	}

	});

	// if($(window).width() < 1200 ){
	//   $('#vimeo-player_display').empty();;
	// } else {
	// 	$('#vimeo-player_display').html(vimeoHTML);
	// }
}

//Move red timeline bar depending on time and layout of schedule
function positionTimeline (timeline, direction, minute, offset) {
	var curTime = new Date();
	var curHour = curTime.getHours();
	var curMinutes = curTime.getMinutes();
	var minutesPast = (curHour * 60) + curMinutes; //convert to minutes
	$(timeline).css(direction, (((minutesPast - 480) * minute) + offset));

	if (curHour >= 8) {
		$(timeline).show();
	} else {
		$(timeline).hide();
	}

	var scheduleHeight = $('.zebra-lines').height() - $('.times').height();
	$('.current-time--small').css('height', scheduleHeight);
}

//Update red timeline bar
setInterval(function() {
	if ($(window).width() < screenMed) {
		var calWidth = $('.times').width() / 15;
		var calWidthMinute = calWidth / 60;
		positionTimeline(".current-time--small", "left", calWidthMinute, 0);

	} else {
		var calHeight = $('.times').height() / 15;
		var calHeightMinute = calHeight / 60;
		positionTimeline(".current-time--large", "top", calHeightMinute, 23);
	}
}, 60 * 1000);

//Do no allow right clicking or link clicking on larger screens
function removeInteraction() {

	$("a").click(function(event) {
		if ($(window).width() >= screenLrg) {
			event.preventDefault();
		}
	});


	$('*').contextmenu( function() {
    	if ($(window).width() >= screenLrg) {
     		return false;
	    }
	});


}



setTimeout(function(){
	var iframe = $('#player_0')[0];
	var player = $f(iframe);

	if($(window).width() < 1200) {
			player.api('pause');
	}

}, 1000);
