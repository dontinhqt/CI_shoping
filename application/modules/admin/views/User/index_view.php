<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Admin Quản Trị Viên
    <small>Danh sách thành viên</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản Trị Viên</a></li>
    <li class="active">Chi tiết</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body table-responsive">

          <div class="pull-right">
            <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Thêm thành viên</button>
            <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
          </div>

          <br />
          <br />
          <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>User</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Adress</th>
                <th>Level</th>
                <th style="width:125px;">Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
              <tr>
                <th>User</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Adress</th>
                <th>Level</th>
                <th style="width:125px;">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">User</label>
                            <div class="col-md-9">
                                <input name="txtuser" placeholder="User name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="txtemail" placeholder="Email" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input name="txtpass" placeholder="Password" class="form-control" type="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Re-Password</label>
                            <div class="col-md-9">
                                <input name="txtrepass" placeholder="Password" class="form-control" type="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Phone</label>
                            <div class="col-md-9">
                                <input name="txtphone" placeholder="Phone" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Adress</label>
                            <div class="col-md-9">
                                <input name="txtaddress" placeholder="Adress" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Level</label>
                            <div class="col-md-9">
                                <select name="txtlevel" class="form-control">
                                    <option value="">--Chọn Chức Vụ--</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Member</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Lưu</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


