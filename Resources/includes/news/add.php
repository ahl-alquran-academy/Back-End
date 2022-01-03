<div class="container-fluid">
    <div class="row m-0 mt-4 p-0">
        <div class="col-12 m-auto col-xl-12">
            <div class="card text-right">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="far fa-newspaper"></i>
                        &nbsp; أضافة خبر
                        <a href="home.php" class="btn btn-outline-info float-left">
                            الصفحة الرئيسية
                        </a>
                    </h4>
                    <p class="text-muted">أضافة خبر خاص بالأكاديمية</p>
                </div>
                <div class="card-content">
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <?php
                            if ($thereIsError) {
                                echo '<div style="width:270px" class="alert alert-danger alert-dismissible text-right">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>خطا !</strong>جميع البيانات مطلوبة
                                        </div>';
                            }
                            if ($createdDone) {
                                echo '<div style="width:270px" class="alert m-1 alert-success alert-dismissible text-right">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>تم !</strong>أضافة الخبر بنجاح
                                        </div>';
                            }
                            ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="card-body">
                                    <div class="form-group text-right">
                                        <label for="exampleInputTitle">عنوان الخبر </label>
                                        <input type="text" name="title" class="form-control" id="exampleInputTitle"
                                            placeholder="عنوان الخبر " required>
                                    </div>
                                    <div class="form-group text-right">
                                        <label for="exampleInputTitle">محتوي الخبر </label>
                                        <input type="text" name="content" class="form-control" id="exampleInputTitle"
                                            placeholder="محتوي الخبر " required>
                                    </div>
                                    <!-- <div class="form-group text-right">
                                        <label for="exampleInputFile">محتوي الخبر </label>
                                        <div class="input-group  text-right">
                                            <div class="custom-file">
                                                <input style="cursor: pointer;" type="file" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label style="padding-right:90px;" class="custom-file-label text-right"
                                                    for="exampleInputFile">
                                                    محتوي الخبر
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-plus-circle"></i>
                                        &nbsp;&nbsp;
                                        أضافة
                                    </button>
                                    <a href="news-list-all.php" class="btn btn-warning mr-1">
                                        <i class="fas fa-newspaper"></i>
                                        &nbsp;&nbsp;
                                        عودة لعرض الأخبار
                                    </a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>