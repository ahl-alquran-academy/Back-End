<div class="container-fluid">
    <div class="row m-0 mt-4 p-0">
        <div class="col-12 m-auto col-xl-12">
            <div class="card text-right">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class='far fa-edit'></i>
                        &nbsp; تفاصيل الخبر
                        <a href="home.php" class="btn btn-outline-info float-left">
                            الصفحة الرئيسية
                        </a>
                    </h4>
                    <p class="text-muted">عرض الخبر بالتفصيل</p>
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
                                            <strong>خطا !</strong>هذا الخبر غير موجود
                                        </div>';
                            }
                            ?>
                            <div class="pt-2 pr-4 text-right">
                                <p class="text-muted">عنوان الخبر</p>
                                <?php if (!empty($current_news)) {
                                    echo $current_news['title'];
                                } ?>
                            </div>
                            <div class="card-body">
                                <div class="form-group text-right">
                                    <p class="text-muted">تاريخ النشر</p>
                                    <time>
                                        <?php if (!empty($current_news)) {
                                            echo $current_news['publishdate'];
                                        } ?>
                                    </time>
                                </div>
                                <div class="form-group text-right">
                                    <p class="text-muted">تفاصيل الخبر</p>
                                    <p class="lead">
                                        <?php if (!empty($current_news)) {
                                            echo $current_news['contentpath'];
                                        } ?>
                                    </p>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="news-list-all.php" class="btn btn-warning mr-1">
                                    <i class="fas fa-newspaper"></i>
                                    &nbsp;&nbsp;
                                    عودة لعرض الأخبار
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>