<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-file-document-box title_icon"></i> Export Data
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <div class="row justify-content-md-center" style="margin-bottom: 10px;">


          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <div class="form-group">
              <select name="status" id="tableid" class="form-control select2" data-toggle="select2">
                <option value="users">Users</option>
                <option value="teachers">Teachers</option>
               <!-- <option value="students">Students</option>
                <option value="parents">Parents</option>
                <option value="invoices">Invoices</option> -->
              </select>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <button type="button" class="btn btn-icon btn-primary form-control dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo get_phrase('export_report'); ?></button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
              <a class="dropdown-item" id="export-csv" href="javascript:0" onclick="getExportUrl('csv')">CSV</a>

            </div>
          </div>
        </div>

      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<script>


function getExportUrl(type) {
  var url = '<?php echo route('exporttable/url'); ?>';
  var table = $('#tableid').val();
  $.ajax({
    type : 'post',
    url: url,
    data : {type : type, table : table},
    success : function(response) {
      if (type == 'csv') {
        window.open(response, '_self');
      }else{
        window.open(response, '_blank');
      }
    }
  });
}
</script>
