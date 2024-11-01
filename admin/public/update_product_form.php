<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chuyên mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Chuyên mục</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <?php
                            extract($product_one);
                            $img = ($img != "") ? "../" . PATH_IMG . $img : "";
                            $hinh = (file_exists($img)) ? "<img src='" . $img . "' height='120px'>" : "Không có hình";
                            $chknew = ($new == 1) ? '<input type="checkbox" name="new" value="1" checked>' : '<input type="checkbox" name="new" value="1">';
                            $product_name = $name;
                            $product_id = $id;
                            $product_img = $img;

                            // load danh sách catalog
                            $select_catalog = '';
                            foreach ($cataloglist as $item) {
                                extract($item);
                                $select = ($id == $idcatalog) ? "selected" : "";
                                $select_catalog .= '<option value="' . $id . '" ' . $select . '>' . $name . '</option>';
                            }
                        ?>
                        <div class="card-body">
                            <form action="index.php?page=update_product" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                <div class="mb-3 input-form">
                                        <label for="level" class="col-form-label">Chọn danh mục:</label>
                                        <select class="form-control select2" name="id_catalog">
                                            <?=$select_catalog?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" value="<?=$product_name?>" name="name" placeholder="Nhập tên sản phẩm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Giá</label>
                                        <input type="text" class="form-control" value="<?=$price?>" name="price" placeholder="Nhập Giá sản phẩm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Sale</label>
                                        <input type="text" class="form-control" value="<?=$promotion?>" name="promotion" placeholder="Nhập mã giảm giá">
                                    </div>
                                    <div class="mb-3">
                                        <label for="topic-name" class="col-form-label">Hình ảnh</label>
                                        <input type="file" name="img" class="col-form-label" id="">
                                        <br><?=$hinh?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="topic-name" name="new" class="col-form-label">Sản phẩm New</label>
                                        <?=$chknew?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="topic-name" class="col-form-label">Mô tả</label>
                                        <textarea name="mota" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid" class="col-form-label"><?=$mota?></textarea>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <input type="hidden" name="id" value="<?=$product_id?>">
                                    <input type="hidden" name="img_old" value="<?=$product_img?>">
                                    <button type="submit" name="btnupdate" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
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
