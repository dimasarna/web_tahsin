<?php //get user id
$exam_id = substr($_GET["url"], -1); ?>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalLabel">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formInput" action="<?php echo BASEURL; ?>/ujian/add_kelas" method="post">
      <div class="modal-body">
      <div class="form-group">
        <input type="hidden" id="inputExamId" name="exam_id" value="<?php echo $exam_id; ?>">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupKelas">Options</label>
          </div>
          <select class="custom-select" id="inputGroupKelas" name="class_id">
            <!-- <option selected>Choose...</option> -->
            <?php foreach ($data as $arr) : ?>
            <option value="<?php echo $arr['class_id']; ?>"><?php echo $arr['class_name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Kelas</button>
      </div>
    </form>
    </div>
  </div>
</div>