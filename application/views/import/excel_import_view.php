<?php if($this->session->flashdata('flash')): ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif ?>

<div class="page" style="min-height: 370px;">
    <form method="post" id="import_form" enctype="multipart/form-data">
        <p>
            <label>Pilih File Excel</label>
            <br>
            <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
        </p>
        <br />
        <input type="submit" name="import" value="Import" class="btn btn-info btn-sm" />
        <a class="btn btn-secondary btn-sm" href="<?php echo base_url('excel_import/format_import') ?>">Format Import</a>
    </form>
</div>

<script>
$(document).ready(function(){

	// load_data();
	//
	// function load_data()
	// {
	// 	$.ajax({
	// 		url:"<?php echo base_url(); ?>excel_import/fetch",
	// 		method:"POST",
	// 		success:function(data){
	// 			$('#customer_data').html(data);
	// 		}
	// 	})
	// }

	$('#import_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/import",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('#file').val('');
				load_data();
				alert(data);
			}
		})
	});

});
</script>
