<?php $this->load->view('layout/layout_main') ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Users <small>Page</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i>Users</a></li>
      <li><a href="#">User</a></li>
      <!-- <li class="active">Data tables</li> -->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12 pull-right" style="margin:10px;">
              <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
            </div>
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Agama</th>
                  <th>Pekerjaan</th>
                  <th>Kewarganegaraan</th>
                  <th>Status</th>
                  <th style="width:125px;">Action</th>
                </tr>
              </thead>
              
              <tbody>
              </tbody>

                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Pekerjaan</th>
                    <th>Kewarganegaraan</th>
                    <th>Status</th>
                </tr>
                </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>


    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Layanan Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" class="form-control" readonly="readonly" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="username" class="form-control" readonly="readonly" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="nama" class="form-control" readonly="readonly" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <input name="jenis_kelamin" class="form-control" readonly="readonly" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="alamat" readonly="readonly" rows="3"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">
                                <input name="tempat_lahir" class="form-control" readonly="readonly" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input name="tanggal_lahir" class="form-control" readonly="readonly" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Agama</label>
                            <div class="col-md-9">
                                <input name="agama" class="form-control" readonly="readonly" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pekerjaan</label>
                            <div class="col-md-9">
                                <input name="pekerjaan" class="form-control" readonly="readonly" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kewarganegaraan</label>
                            <div class="col-md-9">
                                <input name="kewarganegaraan" class="form-control" readonly="readonly" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button> -->
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<?php $this->load->view('layout/layout_footer');?>
<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Users/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
          { 
              "targets": [ -1 ], //last column
              "orderable": false, //set not orderable
              "defaultContent": "<button>Click!</button>"
          },
        ],
        "columns": [
            { "data": "no" },
            { "data": "email" },
            { "data": "username" },
            { "data": "nama" },
            { "data": "jenis_kelamin" },
            { "data": "alamat" },
            { "data": "tempat_lahir" },
            { "data": "tanggal_lahir" },
            { "data": "agama" },
            { "data": "pekerjaan" },
            { "data": "kewarganegaraan" },
            {
              "data": "status",
              "render": function (data, type, obj, meta) {
                return data == "1" ? "Active" : "Non Active";
              }
            },
            {
              "data": "id",
              "render": function (data, type, obj, meta) {
                var button = '<button class="btn btn-sm btn-warning" onclick="edit_users('+data+')"><i class="fa fa-eye"></i> Detail</button>';
                return button;
              }
            },
        ]
    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

});

function edit_users(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Users/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="email"]').val(data.email);
            $('[name="username"]').val(data.username);
            $('[name="nama"]').val(data.nama);
            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
            $('[name="alamat"]').val(data.alamat);
            $('[name="tempat_lahir"]').val(data.tempat_lahir);
            $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
            $('[name="agama"]').val(data.agama);
            $('[name="pekerjaan"]').val(data.pekerjaan);
            $('[name="kewarganegaraan"]').val(data.kewarganegaraan);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

</script>