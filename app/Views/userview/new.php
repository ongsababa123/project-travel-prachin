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
<title>ข่าวสารประชาสัมพันธ์</title>

<div class="page-header" data-parallax="true"
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
        <h2 class="title" style="font-weight: bold;">
            ข่าวสารประชาสัมพันธ์
        </h2>
        <div class="row" data-aos="zoom-in">
            <div class="col-md-1">
            </div>
            <div class="col-md-10" id="load_data">
                <?php $count_per_page = 0; ?>
                <div class="row">
                    <?php if ($news_data != null): ?>
                        <?php foreach ($news_data as $key_news => $value_news): ?>
                            <?php if ($count_per_page == 4): ?>
                            </div>
                            <div class="row">
                                <?php $count_per_page = 0; ?>
                            <?php endif; ?>
                            <div class="col-md-3">
                                <a href="<?= base_url('news/detail/' . $value_news['id_news']) ?>">
                                    <div class="card" style="width: 20rem;">
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?= $value_news['pic_topic'] ?>"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text" style="font-weight: bold;">
                                                <?= $value_news['topic_news'] ?>
                                            </p>
                                            <blockquote class="blockquote mb-0">
                                            </blockquote>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <i class="fas fa-clock"></i>
                                                    <?= formatDate($value_news['data_create']) ?>
                                                </div>
                                                <div class="col-md-4">
                                                </div>
                                                <div class="col-md-3">
                                                    <i class="fas fa-eye"></i>
                                                    <?= $value_news['view_count'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php $count_per_page++; ?>
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
            </div>
            <div class="col-md-10" id="load_more">
                <div class="row">
                    <div class="col-md-3">
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
                    <div class="col-md-3">
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
                    <div class="col-md-3">
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
                    <div class="col-md-3">
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
</div>
<div class="p-3 text-center" style="background-color: #f2f5f6">
    <div class="container">
        <hr>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($pager): ?>
                    <?php $pagi_path = 'news/'; ?>
                    <?php $pager->setPath($pagi_path); ?>
                    <?= $pager->links() ?>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</div>
<script>
    $('#load_data').hide();
    $('#load_more').show();
    window.onload = function () {
        setTimeout(function () {
            $('#load_data').show();
            $('#load_more').hide();
        }, 1000);
    }
</script>