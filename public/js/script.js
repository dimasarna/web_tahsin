const url = "http://localhost/web_tahsin/public";

$(function() {
	
	$('.tombolTambahPengguna').on('click', function() {

		$('.modal-title').html('Tambah Data Pengguna');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('#labelUsername').show();
		$('#inputUsername').show();
		$('#inputId').val('');
		$('#inputUsername').val('');
		$('#inputNama').val('');
		$('#inputEmail').val('');
		$('#inputNomor').val('');
		$('#formInput').attr('action', url + '/pengguna/add');
		
	})

	$('.tombolUbahPengguna').on('click', function() {

		$('.modal-title').html('Ubah Data Pengguna');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		$('#labelUsername').hide();
		$('#inputUsername').hide();

		const id = $(this).data('id');

		$.ajax({
			url: url + '/pengguna/getdata',
			data: {id: id},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				$('#inputId').val(data.user_id);
				$('#inputNama').val(data.name);
				$('#inputEmail').val(data.email);
				$('#inputNomor').val(data.phone_number);
				$('#formInput').attr('action', url + '/pengguna/update');
			}
		});

	})

	$('.tombolTambahKelas').on('click', function() {

		$('.modal-title').html('Tambah Data Kelas');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('#inputId').val('');
		$('#inputName').val('');
		$('#inputCode').val('');
		$('#formInput').attr('action', url + '/kelas/add');
		
	})

	$('.tombolUbahKelas').on('click', function() {

		$('.modal-title').html('Ubah Data Kelas');
		$('.modal-footer button[type=submit]').html('Ubah Data');

		const id = $(this).data('id');

		$.ajax({
			url: url + '/kelas/getdata',
			data: {id: id},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				$('#inputId').val(data.class_id);
				$('#inputName').val(data.class_name);
				$('#inputCode').val(data.class_code);
				$('#formInput').attr('action', url + '/kelas/update');
			}
		});

	})

	$('.tombolTambahSoal').on('click', function() {

		$('.modal-title').html('Tambah Data Soal');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('#inputId').val('');
		$('#inputQuestion').val('');
		$('#inputChoiceA').val('');
		$('#inputChoiceB').val('');
		$('#inputChoiceC').val('');
		$('#inputChoiceD').val('');
		$('#inputAnswer').val('');
		$('#formInput').attr('action', url + '/soal/add');
		
	})

	$('.tombolUbahSoal').on('click', function() {

		$('.modal-title').html('Ubah Data Soal');
		$('.modal-footer button[type=submit]').html('Ubah Data');

		const id = $(this).data('id');

		$.ajax({
			url: url + '/soal/getdata',
			data: {id: id},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				$('#inputId').val(data.question_id);
				$('#inputQuestion').val(data.question);
				$('#inputChoiceA').val(data.choice_a);
				$('#inputChoiceB').val(data.choice_b);
				$('#inputChoiceC').val(data.choice_c);
				$('#inputChoiceD').val(data.choice_d);
				$('#inputAnswer').val(data.answer);
				$('#formInput').attr('action', url + '/soal/update');
			}
		});

	})

	$('.tombolTambahUjian').on('click', function() {

		$('.modal-title').html('Tambah Data Ujian');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('#inputId').val('');
		$('#inputCode').val('');
		$('#inputName').val('');
		$('#inputToken').val('');
		$('#formInput').attr('action', url + '/ujian/add');
		
	})

	$('.tombolUbahUjian').on('click', function() {

		$('.modal-title').html('Ubah Data Ujian');
		$('.modal-footer button[type=submit]').html('Ubah Data');

		const id = $(this).data('id');

		$.ajax({
			url: url + '/ujian/getdata',
			data: {id: id},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				$('#inputId').val(data.exam_id);
				$('#inputCode').val(data.exam_code);
				$('#inputName').val(data.exam_name);
				$('#inputToken').val(data.token);
				$('#formInput').attr('action', url + '/ujian/update');
			}
		});

	})

	$('.tombolJoinKelas').on('click', function() {

		$('.modal-title').html('Gabung Kelas');
		$('.modal-footer button[type=submit]').html('Gabung');

		const user_id = $(this).data('user-id');

		$('#inputClassId').val('');
		$('#inputExamId').val('');
		$('#inputUserId').val(user_id);
		$('#labelInput').html('Kode Kelas');
		$('#inputCode').val('');
		$('#formInput').attr('action', url + '/ujian_pengguna/join_kelas');
		
	})

	$('.tombolMengikutiUjian').on('click', function() {

		$('.modal-title').html('Mengikuti Ujian');
		$('.modal-footer button[type=submit]').html('Ikuti');

		const class_id = $(this).data('class-id');
		const exam_id = $(this).data('exam-id');
		const user_id = $(this).data('user-id');

		$('#inputClassId').val(class_id);
		$('#inputExamId').val(exam_id);
		$('#inputUserId').val(user_id);
		$('#labelInput').html('Token');
		$('#inputCode').val('');
		$('#formInput').attr('action', url + '/ujian_pengguna/start');
		
	})

});