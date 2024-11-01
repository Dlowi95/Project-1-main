<?php
    // cataloglist
    $catalog_html='';
    $i=1;
    foreach ($cataloglist as $item) {
        extract($item);
        $linkedit='<a href="index.php?page=updatedm&id='.$id.'">Sửa</a>';
        $linkdel='<a href="index.php?page=deletedm&id='.$id.'">Xóa</a>';
        $catalog_html.='<tr>
                            <td>'.$i.'</td>
                            <td>'.$name.'</td>
                            <td>'.$linkedit.' / '.$linkdel.' </td>
                        </tr>';
        $i++;
    }
?>
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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chuyên mục</li>
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
                    Thêm danh mục
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
                            <?php
                                if(isset($tb)&&($tb!="")) 
                                {
                                echo '<div class="alert alert-success">';
                                echo $tb;
                                echo '</div>';
                                }
                            ?>
                            <form action="index.php?page=search" method="post">
                                <input type="text" name="kyw" placeholder="Nhập tên danh mục">
                                <button type="submit" name="btnsearch">Tìm kiếm</button>
                            </form>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Thao tác</th>

                                    </tr>
                                </thead>
                                <tbody>

                                <?=$catalog_html?>
                                
                                </tbody>
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
                <h4 class="modal-title">Thêm danh mục mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?page=addcatalog" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="topic-name"  class="col-form-label">Tên danh mục</label>
                        <input type="text" class="form-control" name="name_catalogy" placeholder="Tên danh mục">
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    
                    <input type="submit" name="themmoi" class="btn btn-primary" value="Thêm mới"></input>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>