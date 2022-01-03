<div class="container-fluid">
    <div class="row m-0 mt-4 p-0">
        <div class="col-12 m-auto col-xl-12">
            <div class="card text-right">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="far fa-newspaper"></i>
                        &nbsp; أخبار أكاديمية القران الكريم
                        <a href="home.php" class="btn btn-outline-info float-left m-1">
                            الصفحة الرئيسية
                        </a>
                        <a href="news-add.php" class="btn btn-outline-info float-left m-1">
                            أضافة خبر
                        </a>
                    </h4>
                    <p class="text-muted">أخبار الأكاديميةمن حيث الأحدث</p>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>العنوان</th>
                                    <th>التاريخ</th>
                                    <th>التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($news_list as $item) {
                                    echo "<tr>";
                                    echo "<td>" . $item['title'] . "</td>";
                                    echo "<td>" . $item['publishdate'] . "</td>";
                                    echo "<td><a title='Edit' class='btn btn-info m-1' href='news-edit.php?id=" . $item['id'] . "'><i class='far fa-edit'></i></a>";
                                    echo "<a title='Details' class='btn btn-warning  m-1' href='news-details.php?id=" . $item['id'] . "'><i class='fas fa-info-circle'></i></a>";
                                    echo "<a title='Delete' class='btn btn-danger m-1' href='news-delete.php?id=" . $item['id'] . "'><i class='far fa-trash-alt'></i></a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>