<?php $this->load->view('layout/layout_main') ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Role Admin <small>Page</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i>Admin</a></li>
      <li><a href="#">Role Admin</a></li>
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
            <div class="col-md-12">

            </div>
            <table id="tblAdminRole" class="table table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Created Date</th>
                  <th>Modified Date</th>
                  <th>Status</th>
                  <th>Action</th>
                  <!-- <th>Aksi</th> -->
                </tr>
              </thead>

              <tbody>
                <?php foreach($adminRole->result() as $key => $val){ ?>
                  <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $val->id ?></td>
                    <td><?= $val->name ?></td>
                    <td style="text-align: center;"><?= $val->created ?></td>
                    <td style="text-align: center;"><?= $val->modified != null ? $val->modified : "-" ?></td>
                    <td style="text-align: center;"><?= $val->status == "1" ? "Active" : "Inactive" ?></td>
                    <td style="text-align: center;">
                      <?php
                        if ($val->status == "1") {
                          echo '<button class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></button>';
                        } elseif ($val->status == "0") {
                          echo '<button class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></button>';
                        }
                      ?>
                      
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
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


<?php $this->load->view('layout/layout_footer');?>
<script type="text/javascript">
  $(document).ready(function() {
    var handleDataTableButtons = function () {
      $("#tblAdminRole").DataTable({
          "paging": true,
          "stateSave": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "pagingType": "full_numbers",
          "language": {
            "lengthMenu": "Tampil _MENU_ Data",
            "zeroRecords": "Maaf tidak ada data",
            "info": "Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
          },
          "pageLength": 40,
          dom: "Bfrtip",
          buttons: [
            {
              extend: "copy",
              className: "btn-sm",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6]
              }
            },
            {
              extend: "csvHtml5",
              className: "btn-sm",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6]
              }
            },
            {
              extend: "excelHtml5",
              className: "btn-sm",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6]
              }
            },
            {
              extend: "pdfHtml5",
              className: "btn-sm",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6]
              }
            },
            {
              extend: "print",
              className: "btn-sm",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6]
              }
            },
          ],
          responsive: true
        });
    };

    TableManageButtons = function () {
      "use strict";
      return {
        init: function () {
          handleDataTableButtons();
        }
      };
    }();

    TableManageButtons.init();
  });
</script>