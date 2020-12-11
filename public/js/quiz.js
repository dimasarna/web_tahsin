var data = [],
	answer = [],
	score = 0,
	i = 0;

function startTimer(duration, display) {

	var timer = duration-1,
		seconds,
		percentage;
	
	endTimer = setInterval(function() {
		
		seconds = parseInt(timer % 60, 10);
		percentage = parseInt((seconds / duration) * 100, 10)

		display.text(seconds + 's');
		display.attr('aria-valuenow', percentage);
		display.css('width', percentage + '%');

		if (--timer < 0) {
			clearInterval(endTimer);
			next();
		}

	}, 1000);

}

function start() {

	for (var j = 0; j < data.length; j++) {
		answer[j] = {question_id: data[j].question_id, answer: ''}
	}

	view();

}

function view() {

	$('#question').text(data[i].question);
	$('#question').data('id', data[i].question_id);

	$('#choice_a').text(data[i].choice_a);
	$('#choice_b').text(data[i].choice_b);
	$('#choice_c').text(data[i].choice_c);
	$('#choice_d').text(data[i].choice_d);

	$('#choice_a').css('opacity', 1);
	$('#choice_b').css('opacity', 1);
	$('#choice_c').css('opacity', 1);
	$('#choice_d').css('opacity', 1);

	var duration = 10,
		display = $('.progress-bar');

	startTimer(duration, display);

	$('#choice_a').on('click', () => {
		answer[i].answer = 'a';
		clearInterval(endTimer);
		next();
	})

	$('#choice_b').on('click', () => {
		answer[i].answer = 'b';
		clearInterval(endTimer);
		next();
	})

	$('#choice_c').on('click', () => {
		answer[i].answer = 'c';
		clearInterval(endTimer);
		next();
	})

	$('#choice_d').on('click', () => {
		answer[i].answer = 'd';
		clearInterval(endTimer);
		next();
	})

	$('#next').on('click', () => {
		clearInterval(endTimer);
		next();
	})
	
	$('body').fadeToggle('slow');

}

function next() {

	$('#choice_a').off('click');
	$('#choice_b').off('click');
	$('#choice_c').off('click');
	$('#choice_d').off('click');

	switch(data[i].answer) {
		case 'a':
			$('#choice_a').css('opacity', 1);
			$('#choice_b').css('opacity', 0.5);
			$('#choice_c').css('opacity', 0.5);
			$('#choice_d').css('opacity', 0.5);
			break;
		case 'b':
			$('#choice_a').css('opacity', 0.5);
			$('#choice_b').css('opacity', 1);
			$('#choice_c').css('opacity', 0.5);
			$('#choice_d').css('opacity', 0.5);
			break;
		case 'c':
			$('#choice_a').css('opacity', 0.5);
			$('#choice_b').css('opacity', 0.5);
			$('#choice_c').css('opacity', 1);
			$('#choice_d').css('opacity', 0.5);
			break;
		case 'd':
			$('#choice_a').css('opacity', 0.5);
			$('#choice_b').css('opacity', 0.5);
			$('#choice_c').css('opacity', 0.5);
			$('#choice_d').css('opacity', 1);
			break;
		default:
	}

	setTimeout(() => {
		$('body').fadeToggle('slow', () => {
			if (++i < data.length) view();
			else finish();
		});
	}, 1500);

}

function finish() {

	for (var j = 0; j < data.length; j++) {
		if (answer[j].answer == data[j].answer) {
			score++;
		}
	}

	$(location).attr('href', url + '/ujian_pengguna/finish/' + class_id + '/' + exam_id + '/' + user_id + '/' + score);

}

$(function() {

	class_id = $('#classId').attr('value');
	exam_id = $('#examId').attr('value');
	user_id = $('#userId').attr('value');

	$.ajax({
		url: url + '/ujian_pengguna/getsoal',
		type: 'POST',
		dataType: 'json',
		success: function(result) {
			data = result;
			start();
		}
	})

});