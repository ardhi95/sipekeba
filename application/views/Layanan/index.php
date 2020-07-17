<?php $this->load->view('layout/layout_main') ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Layanan <small>Page</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i>Layanan</a></li>
      <li><a href="#">Layanan User</a></li>
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
              <button class="btn btn-success" onclick="add_layanan()"><i class="glyphicon glyphicon-plus"></i> Add Layanan</button>
            </div>
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Created By</th>
                  <th>Jenis Barang</th>
                  <th>Keterangan</th>
                  <th>Created</th>
                  <th>Modified</th>
                  <th>Status</th>
                  <th style="width:125px;">Action</th>
                </tr>
              </thead>
              
              <tbody>
              </tbody>

                <tfoot>
                <tr>
                    <th>No</th>
                  <th>Created By</th>
                  <th>Jenis Barang</th>
                  <th>Keterangan</th>
                  <th>Created</th>
                  <th>Modified</th>
                  <th>Status</th>
                  <th>Action</th>
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
                <!-- <form action="#" id="form" class="form-horizontal"> -->
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Barang</label>
                            <div class="col-md-9">
                                <input name="inp_jenis_barang" placeholder="Jenis Barang" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Keterangan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="inp_keterangan" rows="3"></textarea>
                                <!-- <input name="last_name" placeholder="Last Name" class="form-control" type="text"> -->
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Syarat</label>
                            <div class="col-md-8">
                                <input name="inp_syarat" placeholder="Syarat" class="form-control inp_syarat" type="text">
                                <span class="help-block"></span>
                                <div id="divSyarat" style="padding-bottom: 20px;"></div>
                            </div>
                            <div><button class="btn btn-primary add-syarat"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
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

function generate_syarat(val, id) {
    var _element = '<div class="syaratElement" style="padding-top: 5px;padding-bottom: 5px;">'
                    +'<div class="col-md-10 value-syarat" data-id="'+id+'">'+val+'</div>'
                    +'<div class="col=md-2">'
                    +'<button class="btn btn-xs btn-danger remove-syarat" data-id="'+id+'">'
                    +'<i class="fa fa-trash" aria-hidden="true"></i></button></div></div>';
    return $("#divSyarat").append(_element);
}
$(document).ready(function() {

    // Add Syarat
    $(".add-syarat").on("click", function () {
        var _val = $(":input[name='inp_syarat']").val();

        if (_val === "") {
            setmessage("Syarat", "Syarat tidak boleh kosong.", "danger");
            return;
        }

        generate_syarat(_val);
        $(":input[name='inp_syarat']").val('');
    });

    $("#divSyarat").delegate(".remove-syarat", "click", function () {
        delete_syarat($(this).data('id'));
        $(this).parent().parent().remove();
    });

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Layanan/ajax_list')?>",
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
            { "data": "createdby" },
            { "data": "jenis_barang" },
            { "data": "keterangan" },
            { "data": "created" },
            { "data": "modified" },
            {
              "data": "status",
              "render": function (data, type, obj, meta) {
                return data == "1" ? "Active" : "Non Active";
              }
            },
            {
              "data": "id",
              "render": function (data, type, obj, meta) {
                var button = '<button class="btn btn-sm btn-primary" onclick="edit_layanan('+data+')"><i class="glyphicon glyphicon-pencil"></i> Edit</button>';
                return obj.role === "Super Admin" ? "-" : button;
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

function add_layanan()
{
    save_method = 'add';
    // reset form on modals
    $('[name="id"]').val('');
    $('[name="inp_jenis_barang"]').val('');
    $('[name="inp_keterangan"]').val('');
    $('[name="inp_syarat"]').val('');
    $("#divSyarat").children().remove();

    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Layanan'); // Set Title to Bootstrap modal title
}

function edit_layanan(id)
{
    save_method = 'update';
    // reset form on modals
    $('[name="id"]').val('');
    $('[name="inp_jenis_barang"]').val('');
    $('[name="inp_keterangan"]').val('');
    $('[name="inp_syarat"]').val('');
    $("#divSyarat").children().remove();

    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Layanan/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.layanan.id);
            $('[name="inp_jenis_barang"]').val(data.layanan.jenis_barang);
            $('[name="inp_keterangan"]').val(data.layanan.keterangan);

            $.each(data.syarat, function (index, value) {
                generate_syarat(value.syarat, value.id);
            });
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Layanan'); // Set title to Bootstrap modal title

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

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
    var data = {};

    // Generate param
    data.jenis_barang   = $(":input[name='inp_jenis_barang']").val();
    data.keterangan     = $(":input[name='inp_keterangan']").val();
    // Generate param

    if(save_method == 'add') {
        url = "<?php echo site_url('Layanan/ajax_add')?>";
        var dataSyarat  = [];
        $("#divSyarat").find(".value-syarat").each(function () {
            dataSyarat.push($(this).text());
        });

        data.syarat         = dataSyarat;
    } else {
        url = "<?php echo site_url('Layanan/ajax_update')?>";
        data.id     = $(":input[name='id']").val();

        var dataSyarat  = [];
        $("#divSyarat").find(".value-syarat").each(function () {
            var _dt = {};
            _dt.id      = $(this).data('id');
            _dt.syarat  = $(this).text();
            dataSyarat.push(_dt);
        });

        data.syarat         = dataSyarat;
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: data,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();

                if(save_method == 'add') {
                  setmessage("Add Data", "Berhasil add data.", "success");
                } else {
                  setmessage("Update Data", "Berhasil update data.", "success");
                }
                
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('Error adding / update data');
            if(save_method == 'add') {
              setmessage("Add Data", "Gagal add data.", "danger");
            } else {
              setmessage("Update Data", "Gagal update data.", "danger");
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_layanan(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Layanan/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

function delete_syarat(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Layanan/ajax_delete_syarat')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                setmessage("Delete Data", "Berhasil hapus syarat.", "success");
                // $('#modal_form').modal('hide');
                // reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>