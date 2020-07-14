<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="<?php echo site_url('uploadabsensi/SaveJadwalExcel')?>" method="post" role="form" id="form_f" enctype="multipart/form-data">

                    <div class="modal-body with-padding">
                        <div class="block-inner text-danger">
                            <h6 class="heading-hr"><a href="<?php echo site_url('assets/AGD_UPLOAD_JADWAL.xlsx');?>"/>Download Format Upload  <small class="display-block"> </small></a></h6>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control" required>
                                        <option value=""/>Pilih Tahun </option>
                                        <?php
                                            for($i=2016;$i<=date("Y");$i++){
                                                echo "<option value='".$i."' />";echo $i;echo "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label>Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control" required>
                                        <?php
                                            for($i=0;$i<13;$i++){
                                                echo "<option value='".$i."' />";echo $bln[$i];echo "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Upload File</label>
                                    <input type="file" id="price" name="price" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit form</button>
                    </div>
                </form>
</body>
</html>