<title>
    <?= $article_data['topic'] ?>
</title>
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
    <div class="section" style="background-color: #f2f5f6">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="row" data-aos="fade-right">
                    <div class="col-md-12" id="article_topic_data">
                        <div class="card">
                            <div class="card-body">
                                <h2 style="font-weight: bold;">
                                    <?= $article_data['topic'] ?>
                                </h2>
                                <br>
                                <h5><i class="fas fa-eye"></i>
                                    <?= $article_data['view_count'] ?> ครั้ง
                                </h5>
                                <h5><i class="fas fa-clock"></i>
                                    <?= formatDate($article_data['data_create']) ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="article_topic_load">
                        <div class="ph-item" style="height: 8rem; border-radius: 10px">
                            <div class="ph-col-12">
                                <div class="ph-row">
                                    <br>
                                    <div class="ph-col-12 big"></div>
                                    <div class="ph-col-4"></div>
                                    <div class="ph-col-8 empty"></div>
                                    <div class="ph-col-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10" id="article_detail_data">
                <div class="row">
                    <div class="col-md-9" data-aos="fade-right">
                        <div class="card">
                            <div class="card-body">
                                <h4 style="font-weight: bold;" class="text-center">
                                    <?= $article_data['topic'] ?>
                                </h4>
                                <blockquote class="blockquote mb-0">
                                </blockquote>
                                <br>
                                <h5>
                                    <?= $article_data['detail'] ?>
                                </h5>
                                <blockquote class="blockquote mb-0">
                                </blockquote>
                                <br>
                                <ui>
                                    <?php if ($article_data['google_link'] != null): ?>
                                        <li style="font-size: 16px"><strong style="font-weight: bold;">Google Map :
                                            </strong>&nbsp;<a href="<?= $article_data['google_link'] ?>" target="_blank"
                                                style="color: blue;">
                                                <?= $article_data['google_link'] ?>
                                            </a></li>
                                    <?php endif; ?>
                                    <?php if ($article_data['location'] != null): ?>
                                        <li style="font-size: 16px"><strong style="font-weight: bold;">สถานที่ :
                                            </strong>&nbsp;<a>
                                                <?= $article_data['location'] ?>
                                            </a></li>
                                    <?php endif; ?>
                                    <?php if ($article_data['location_price'] != null): ?>
                                        <li style="font-size: 16px"><strong style="font-weight: bold;">ค่าเข้าสถานที่ :
                                            </strong>&nbsp;<a>
                                                <?= $article_data['location_price'] ?>
                                            </a></li>
                                    <?php endif; ?>
                                    <?php if ($article_data['face_book_name'] != null && $article_data['facebook_link'] != null): ?>
                                        <li style="font-size: 16px"><strong style="font-weight: bold;">Facebook :
                                            </strong>&nbsp;<a href="<?= $article_data['facebook_link'] ?>" target="_blank"
                                                style="color: blue;">
                                                <?= $article_data['face_book_name'] ?>
                                            </a></li>
                                    <?php endif; ?>
                                    <?php if ($article_data['time_open'] != null): ?>
                                        <li style="font-size: 16px"><strong style="font-weight: bold;">เวลาเปิด - ปิด :
                                            </strong>&nbsp;<a>
                                                <?= $article_data['time_open'] ?>
                                            </a></li>
                                    <?php endif; ?>
                                </ui>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mt-0" data-aos="fade-left">
                        <div class="card">
                            <div class="card-body">
                                <h4 style="font-weight: bold;">บทความยอดนิยม</h4>
                                <hr>
                                <?php foreach ($article_data_topview as $value_article): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a
                                                href="<?= base_url('article/detail/' . $value_article->id_article . '/' . $value_article->id_type_travel) ?>">
                                                <div class="card" style="width: 19rem;">
                                                    <img class="card-img-top"
                                                        src="data:image/jpeg;base64,<?= $value_article->pic_topic ?>"
                                                        alt="Card image cap">
                                                    <div class="card-body">
                                                        <p class="card-text">
                                                            <?= $value_article->topic ?>
                                                        </p>
                                                        <blockquote class="blockquote mb-0">
                                                        </blockquote>
                                                    </div>
                                                    <div class="card-footer mb-2">
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
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10" id="article_detail_load">
                <div class="row">
                    <div class="col-md-9" data-aos="fade-right">
                        <div class="ph-item" style="height: 17rem; border-radius: 10px">
                            <div class="ph-col-12">
                                <div class="ph-picture" style="height: 5rem; border-radius: 10px"></div>
                                <blockquote class="blockquote mb-0">
                                </blockquote>
                                <br>
                                <div class="ph-row">
                                    <div class="ph-col-12 big"></div>
                                    <div class="ph-col-4"></div>
                                    <div class="ph-col-8 empty"></div>
                                    <div class="ph-col-6"></div>
                                    <div class="ph-col-6 empty"></div>
                                    <div class="ph-col-12"></div>
                                </div>
                                <div class="ph-row">
                                    <div class="ph-col-12"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center mt-0" data-aos="fade-left">
                        <div class="ph-item" style="height: 30rem; border-radius: 10px">
                            <div class="ph-col-12">
                                <div class="ph-picture" style="height: 17rem; border-radius: 10px"></div>
                                <br>
                                <div class="ph-row">
                                    <div class="ph-col-12 big"></div>
                                    <div class="ph-col-4"></div>
                                    <div class="ph-col-8 empty"></div>
                                    <div class="ph-col-6"></div>
                                    <div class="ph-col-6 empty"></div>
                                    <div class="ph-col-12"></div>
                                </div>
                                <blockquote class="blockquote mb-0">
                                </blockquote>
                                <br>
                                <div class="ph-row">
                                    <div class="ph-col-12"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
    <script>
        $('#article_topic_data').hide();
        $('#article_detail_data').hide();
        $('#article_topic_load').show();
        $('#article_detail_load').show();
        window.onload = function () {
            setTimeout(function () {
                $('#article_topic_data').show();
                $('#article_detail_data').show();
                $('#article_topic_load').hide();
                $('#article_detail_load').hide();
            }, 1000);
        }
    </script>