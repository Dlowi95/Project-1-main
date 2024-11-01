<!-- Content Wrapper. Contains page content -->
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

            $select_catalog = '';
            foreach ($cataloglist as $item) {
            extract($item);
            $select_catalog .= '<option value="' . $id . '" >' . $name . '</option>';
        }

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default">
                    Thêm sản phẩm mới
                </button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3 class="card-title ">Danh sách chủ đề</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Hình</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Chi tiết</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                        foreach ($list_product as $item) {
                                            extract($item);
                                            $linkedit="<a href='index.php?page=update_product_form&id=".$id."'>Sửa</a>";
                                            $linkdel="<a href='index.php?page=delete_product&id=".$id."'>Xóa</a>";
                                            echo '<tr>
                                            <td>'.$i.'</td>
                                            <td><img src="/Project_demo/uploads/images/product/'.$img.'" width="80"></td>
                                            <td>'.$name.'</td>
                                            <td>$'.number_format($price,0,",",".").'</td>
                                            <td>'.$mota.'</td>
                                            <td>'.$chitiet.'</td>
                                            <td>'.$linkedit.' - '.$linkdel.'</td>
                                          </tr>';
                                          $i++;
                                        }
                                    ?>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?page=add_product" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                <div class="mb-3 input-form">
                                        <label for="level" class="col-form-label">Chọn danh mục:</label>
                                        <select class="form-control select2" name="id_catalog">
                                            <?=$select_catalog?>
                                        </select>
                                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Giá sản phẩm</label>
                        <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Hình ảnh</label>
                        <input type="file" name="img" class="col-form-label" id="">
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Mô tả</label>
                        <textarea name="mota" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid" class="col-form-label"></textarea>                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Sale</label>
                        <input type="text" class="form-control" name="promotion" placeholder="Nhập mã giảm giá">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="btnadd" class="btn btn-primary">Thêm mới</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>