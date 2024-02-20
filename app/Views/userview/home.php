<?php
function formatDate($dateString)
{
    $date = new DateTime($dateString);
    $formattedDate = $date->format('j M Y');
    // 'j' - Day of the month without leading zeros
    // 'M' - Three letter representation of a month
    // 'Y' - Four digit representation for the year

    return $formattedDate;
}
?>
<title>หน้าหลัก</title>

<!-- End Navbar -->

<div class="page-header page-header-xs" data-parallax="true"
    style="background-image: url('<?= base_url('dist/img/background2.jpg') ?>');">
    <div class="filter"></div>
    <div class="container">
        <div class="motto text-center">
            <h1>สถานที่ท่องเที่ยวในจังหวัดปราจีนบุรี</h1>
            <h3>"ปราจีนบุรี: สุดยอดแหล่งท่องเที่ยวทางเว็บ! 🌍✨ #สวยสดใส #ปราจีนบุรีเท่ห์ทุกรูป"</h3>
            <br />
            <a href="<?= base_url('/article/0') ?>" class="btn btn-outline-neutral btn-round">เลือกชมเลย!</a>
        </div>
    </div>
</div>
<div class="main">
    <div class="section text-center" style="background-color: #f2f5f6">
        <div class="container" data-aos="zoom-in">
            <h2 class="title" style="font-weight: bold;">บทความยอดนิยม</h2>
            <div class="row" id="article_top_data">
                <?php if ($article_data_topview != null): ?>
                    <?php foreach ($article_data_topview as $value_article): ?>
                        <div class="col-md-4">
                            <a
                                href="<?= base_url('article/detail/' . $value_article->id_article . '/' . $value_article->id_type_travel) ?>">
                                <div class="card" style="width: 20rem;">
                                    <img class="card-img-top" src="data:image/jpeg;base64,<?= $value_article->pic_topic ?>"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?= $value_article->topic ?>
                                        </p>
                                        <blockquote class="blockquote mb-0">
                                        </blockquote>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <i class="fas fa-clock"></i>
                                                <?= formatDate($value_article->data_create) ?>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-3">
                                                <i class="fas fa-eye"></i>
                                                <?= $value_article->view_count ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h1>
                                            ยังไม่มีข้อมูล
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row" id="article_top_load">
                <div class="col-md-4">
                    <div class="ph-item" style="height: 20rem; border-radius: 10px; width: 20rem;">
                        <div class="ph-col-12">
                            <div class="ph-picture" style="height: 10rem; border-radius: 10px"></div>
                            <br>
                            <div class="ph-row">
                                <div class="ph-col-12 big"></div>
                                <div class="ph-col-4"></div>
                                <div class="ph-col-8 empty"></div>
                                <div class="ph-col-6"></div>
                            </div>
                            <blockquote class="blockquote mb-0">
                            </blockquote>
                            <div class="ph-row">
                                <div class="ph-col-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ph-item" style="height: 20rem; border-radius: 10px; width: 20rem;">
                        <div class="ph-col-12">
                            <div class="ph-picture" style="height: 10rem; border-radius: 10px"></div>
                            <br>
                            <div class="ph-row">
                                <div class="ph-col-12 big"></div>
                                <div class="ph-col-4"></div>
                                <div class="ph-col-8 empty"></div>
                                <div class="ph-col-6"></div>
                            </div>
                            <blockquote class="blockquote mb-0">
                            </blockquote>
                            <div class="ph-row">
                                <div class="ph-col-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ph-item" style="height: 20rem; border-radius: 10px; width: 20rem;">
                        <div class="ph-col-12">
                            <div class="ph-picture" style="height: 10rem; border-radius: 10px"></div>
                            <br>
                            <div class="ph-row">
                                <div class="ph-col-12 big"></div>
                                <div class="ph-col-4"></div>
                                <div class="ph-col-8 empty"></div>
                                <div class="ph-col-6"></div>
                            </div>
                            <blockquote class="blockquote mb-0">
                            </blockquote>
                            <div class="ph-row">
                                <div class="ph-col-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-dark bg-primary text-center">
        <div class="container" data-aos="zoom-in">
            <h2 class="title" style="font-weight: bold;">ข่าวสารล่าสุด</h2>
            <div class="row" id="new_data">
                <div class="col-md-12">
                    <?php if ($news_data_last != null): ?>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php foreach ($news_data_last as $key => $value_news_last): ?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>" <?= ($key === 0) ? 'class="active"' : '' ?>></li>
                                <?php endforeach; ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php foreach ($news_data_last as $key => $value_news_last): ?>
                                    <div class="carousel-item <?= ($key === 0) ? 'active' : '' ?>">
                                        <a href="<?= base_url('news/detail/' . $value_news_last->id_news) ?>" traget="_blank">
                                            <img class="d-block w-100"
                                                src="data:image/jpeg;base64,<?= $value_news_last->pic_topic ?>"
                                                style="height: 30rem; width: 100%;" alt="Slide <?= $key + 1 ?>">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1>
                                                ยังไม่มีข้อมูล
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row" id="new_load">
                <div class="col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="ph-item" style="height: 30rem; border-radius: 10px">
                            <div class="ph-col-12">
                                <div class="ph-picture" style="height: 26rem; border-radius: 10px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section text-center" style="background-color: #f2f5f6">
        <div class="container" data-aos="zoom-in">
            <h2 class="title" style="font-weight: bold;">บทความล่าสุด</h2>
            <div class="row" id="article_last_data">
                <?php if ($article_data_last != null): ?>
                    <?php foreach ($article_data_last as $value_article_last): ?>
                        <div class="col-md-4">
                            <a
                                href="<?= base_url('article/detail/' . $value_article_last->id_article . '/' . $value_article_last->id_type_travel) ?>">
                                <div class="card" style="width: 20rem;">
                                    <img class="card-img-top" src="data:image/jpeg;base64,<?= $value_article_last->pic_topic ?>"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?= $value_article_last->topic ?>
                                        </p>
                                        <blockquote class="blockquote mb-0">
                                        </blockquote>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <i class="fas fa-clock"></i>
                                                <?= formatDate($value_article_last->data_create) ?>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-3">
                                                <i class="fas fa-eye"></i>
                                                <?= $value_article_last->view_count ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h1>
                                            ยังไม่มีข้อมูล
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row" id="article_last_load">
                <div class="col-md-4">
                    <div class="ph-item" style="height: 20rem; border-radius: 10px; width: 20rem;">
                        <div class="ph-col-12">
                            <div class="ph-picture" style="height: 10rem; border-radius: 10px"></div>
                            <br>
                            <div class="ph-row">
                                <div class="ph-col-12 big"></div>
                                <div class="ph-col-4"></div>
                                <div class="ph-col-8 empty"></div>
                                <div class="ph-col-6"></div>
                            </div>
                            <blockquote class="blockquote mb-0">
                            </blockquote>
                            <div class="ph-row">
                                <div class="ph-col-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ph-item" style="height: 20rem; border-radius: 10px; width: 20rem;">
                        <div class="ph-col-12">
                            <div class="ph-picture" style="height: 10rem; border-radius: 10px"></div>
                            <br>
                            <div class="ph-row">
                                <div class="ph-col-12 big"></div>
                                <div class="ph-col-4"></div>
                                <div class="ph-col-8 empty"></div>
                                <div class="ph-col-6"></div>
                            </div>
                            <blockquote class="blockquote mb-0">
                            </blockquote>
                            <div class="ph-row">
                                <div class="ph-col-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ph-item" style="height: 20rem; border-radius: 10px; width: 20rem;">
                        <div class="ph-col-12">
                            <div class="ph-picture" style="height: 10rem; border-radius: 10px"></div>
                            <br>
                            <div class="ph-row">
                                <div class="ph-col-12 big"></div>
                                <div class="ph-col-4"></div>
                                <div class="ph-col-8 empty"></div>
                                <div class="ph-col-6"></div>
                            </div>
                            <blockquote class="blockquote mb-0">
                            </blockquote>
                            <div class="ph-row">
                                <div class="ph-col-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#new_data').hide();
        $('#new_load').show();
        $('#article_top_data').hide();
        $('#article_top_load').show();
        $('#article_last_data').hide();
        $('#article_last_load').show();
        window.onload = function () {
            setTimeout(function () {
                $('#new_data').show();
                $('#new_load').hide();
                $('#article_top_data').show();
                $('#article_top_load').hide();
                $('#article_last_data').show();
                $('#article_last_load').hide();
            }, 1000);
        };
    </script>