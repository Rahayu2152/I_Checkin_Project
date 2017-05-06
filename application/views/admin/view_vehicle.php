<?php $this->load->view('admin/partials/admin_header.php'); ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Checkin & Checkout</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <hr>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Checkin</a>
		<a class="btn btn-primary" data-toggle="collapse" href="#collapsecheckout" aria-expanded="false" aria-controls="collapsecheckout"> Checkout</a>
       
	   <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class="collapse" id="collapseExample">
            <?php echo validation_errors(); ?> 
			<?php echo form_open_multipart('admin/checkincheckout/addcheckin'); ?>
                <fieldset>
                    <div class="row">
                        <div class="col-xs-6">
                            <label>Type Kamar</label>      
                                   <select name="jeniskamar" id="jeniskamar" class="form-control">
                                        {kamartipe}
                                            <option value="{jeniskamar}" >{jeniskamar}</option>
                                        {/kamartipe}
										 </select>
                        </div>
                        <div class="col-xs-6">
                            <label>Nomor Kamar</label>
                            <select class="form-control" name="nomorkamar" id="nomorkamar" >
                                {tersediakamar}
                                    <option value="{nomorkamar}">{nomorkamar}</option>
                                {/tersediakamar}
                            </select>
                        </div>
                    </div>                            
                    <br>                        
                    <div class="row">
						<div class="col-xs-6">
                            <label for="nama">Nama :</label>
                            <input type="text" step="any" class="form-control" name="nama" placeholder="Masukkan Nama " required>
                        </div>
						<div class="col-xs-6">
                            <label for="alamat">Alamat :</label>
                            <input type="text" step="any" class="form-control" name="alamat" placeholder="Masukkan Alamat " required>
                        </div>
                    </div>                           
                    <br>                                      
                    <div class="row">
                        <div class="col-xs-6">
                            <label>Tanggal Checkin</label>
                            <input type="Date"class="form-control" name="tanggalcheckin"  placeholder="YYYY-MM-DD">
                        </div>
						
                        <div class="col-xs-6">
							<label>Nomor Telepon</label>
                            <input type="number" class="form-control" name="notelp" placeholder="Nomor Telepon" required>
                        </div>
                    </div>

                    <br>
                    <input class="btn btn-primary" type="submit" name="buttonSubmit" value="Checkin" />
                                                            
                </fieldset>         
            </form>
            <br>
            </div>
        </div> <!-- /row --> 
		
		<div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class="collapse" id="collapsecheckout">
            <?php echo validation_errors(); ?> 
			<?php echo form_open_multipart('admin/checkincheckout/buttoncheckout'); ?>
                <fieldset>
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="jeniskamar">Type Kamar :</label>
                            <input type="text" step="any" class="form-control" name="jeniskamar" placeholder="Masukkan Jenis Kamar " required>
                        </div>
						<div class="col-xs-6">
                            <label for = "">Nomor Kamar</label>
                            <input type="number"class="form-control" name="nomorkamar"  placeholder="Masukkan Nomor Kamar">
                        </div>
					
                    </div>					
                    <br>                        
                    <div class="row">
						<div class="col-xs-6">
                            <label for="nama">Nama :</label>
                            <input type="text" step="any" class="form-control" name="nama" placeholder="Masukkan Nama " required>
                        </div>
						<div class="col-xs-6">
                            <label for="alamat">Alamat :</label>
                            <input type="text" step="any" class="form-control" name="alamat" placeholder="Masukkan Alamat " required>
                        </div>
                    </div>                           
                    <br>                                      
                    <div class="row">
                        <div class="col-xs-6">
                            <label>Tanggal Checkin</label>
                            <input type="Date"class="form-control" name="tanggalcheckin"  placeholder="YYYY-MM-DD">
                        </div>
						<div class="col-xs-6">
                            <label>Tanggal Checkout</label>
                            <input type="Date"class="form-control" name="tanggalcheckout"  placeholder="YYYY-MM-DD">
                        </div>
					
                    </div>
					<br>
					<div class="row">
					        <div class="col-xs-6">
							<label>Nomor Telepon</label>
                            <input type="number" class="form-control" name="notelp" placeholder="Nomor Telepon" required>
                        </div>
					</div>	

                    <br>
                    <input class="btn btn-primary" type="submit" name="buttonCheckout" value="Checkout" />
                                                            
                </fieldset>         
            </form>
            <br>
            </div>
        </div> <!-- /row --> 
        <!-- all models --> 
        <div class="row">
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Data Checkin</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>JenisKamar</th>
                                    <th>Nomor Kamar</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tanggal Checkin</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>JenisKamar</th>
                                    <th>Nomor Kamar</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tanggal Checkin</th>
                                </tr>
                            </tfoot>
                            <tbody>
							   {checkindata}
                                    <tr>
                                        <td>{id}</td>
                                        <td>{nama}</td>
                                        <td>{alamat}</td>                                        
                                        <td>{jeniskamar}</td>
										<td>{nomorkamar}</td>
										<td>{notelp}</td>
										<td>{tanggalcheckin}</td>
                                    </tr>
                                {/checkindata}
                            </tbody>
                        </table>
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col -->
        </div> <!-- /row --> 


    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->

<?php $this->load->view('admin/partials/admin_footer.php'); ?>



<?php if($this->session->flashdata('message') != NULL) : ?>
    <script>
        swal({
          title: "Success",
          text: "<?php echo $this->session->flashdata('message'); ?>",
          type: "success",
          timer: 1500,
          showConfirmButton: false
        });
    </script>
<?php endif ?>

    <script src="<?php echo base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.print.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/jszip/dist/jszip.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/pdfmake/build/pdfmake.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/pdfmake/build/vfs_fonts.js"); ?>"></script>
    
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-responsive").length) {
            $("#datatable-responsive").DataTable({
            aaSorting: [[0, 'desc']],
            
              dom: "Blfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "csv",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "excel",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "pdf",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "print",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
              ],
              responsive: true,
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
          
            init: function() {
              handleDataTableButtons();
            }
          };
        }();    
                    
        TableManageButtons.init();
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
    
    $("#parent_cat").change(function() {
        $(this).after();
        $.get('<?php echo base_url(); ?>controller_vehicle/getsub/' + $(this).val(), function(data) {
            $("#sub_cat").html(data);
            $('#loader').slideUp(200, function() {
                $(this).remove();
            });
        }); 
    });

});
</script>

<?php if($this->session->flashdata('message') != NULL) : ?>
<script>
    swal({
      title: "Success",
      text: "<?php echo $this->session->flashdata('message'); ?>",
      type: "success",
      timer: 1500,
      showConfirmButton: false
    });
</script>
<?php endif ?>