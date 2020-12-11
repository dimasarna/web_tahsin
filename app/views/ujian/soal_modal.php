<?php //get user id
$exam_id = substr($_GET["url"], -1); ?>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalLabel">Tambah Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formInput" action="<?php echo BASEURL; ?>/ujian/add_soal" method="post">
      <div class="modal-body">
    	<div class="form-group">
    		<input type="hidden" id="inputExamId" name="exam_id" value="<?php echo $exam_id; ?>">
		    <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSoal">Options</label>
          </div>
          <select class="custom-select" id="inputGroupSoal" name="question_id">
            <!-- <option selected>Choose...</option> -->
            <?php foreach ($data as $arr) : ?>
            <option value="<?php echo $arr['question_id']; ?>"><?php echo $arr['question']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Soal</button>
      </div>
  	</form>
    </div>
  </div>
</div>