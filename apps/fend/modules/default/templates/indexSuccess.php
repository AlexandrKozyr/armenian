<div class="gallery" id="gallery">
    <div class="gallery_wrap">
        <ul class="list">
            <li>
                <a href=""><img src="<?php echo url_for('@image-resize?x=1020&y=500&hash=' . $listOfImages[0]) ?>" alt="" width="1020" height="500"/></a>
            </li>
            <li>
                <a href=""><img src="<?php echo url_for('@image-resize?x=1020&y=500&hash=' . $listOfImages[1]) ?>" alt="" width="1020" height="500"/></a>
            </li>
            <li>
                <a href=""><img src="<?php echo url_for('@image-resize?x=1020&y=500&hash=' . $listOfImages[2]) ?>" alt="" width="1020" height="500"/></a>
            </li>
            <li>
                <a href=""><img src="<?php echo url_for('@image-resize?x=1020&y=500&hash=' . $listOfImages[3]) ?>" alt="" width="1020" height="500"/></a>
            </li>
            <li>
                <a href=""><img src="<?php echo url_for('@image-resize?x=1020&y=500&hash=' . $listOfImages[4]) ?>" alt="" width="1020" height="500"/></a>
            </li>
        </ul>
    </div>
    <a class="prev" href="">&#60;</a>
    <a class="next" href="">&#62;</a>
    <ul class="switcher">
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
    </ul>
</div>
<div class="about_us">
    <p>Союз армянской молодежи Украины – организация объединяющая представителей 
        армянской молодежи Украины, сочетающих достижение профессиональных успехов
        с культурным и духовным развитием, поддержанием интеллектуальных традиций
        армянского народа и укреплением связей с Арменией и Диаспорой.</p>

    <div class="questionary">
        <span>Хочешь вступить в организацию?</span>
        <a class="button" href="<?php echo url_for('@anketa') ?>">Заполни анкету</a>
    </div>
</div>
<div class="point">
    <h2>Основные цели МО</h2>
    <div class="point_holder">
        <div class="aim">
            <img src="/img/icon01.png" alt="" width="100" height="100"/>
            <p>Сохранение национальной самоидентичности</p>
        </div>
        <div class="aim">
            <img src="/img/icon02.png" alt="" width="100" height="100"/>
            <p>Популяризация армянского языка и культуры</p>
        </div>
        <div class="aim">
            <img src="/img/icon03.png" alt="" width="100" height="100"/>
            <p>Просвещение, образование и воспитание армянской молодежи</p>
        </div>
    </div>

</div>

<div class="news">
    <h2>Последние новости</h2>
    <div class="big_news">
        <?php $News = $pager->getResults() ?>
        <?php if (count($News) == 1): ?>
            <?php $count = 1 ?>
        <?php else: ?>
            <?php $count = 2 ?>
        <?php endif ?>
        <?php for ($i = 0; $i < $count; $i++): ?>
            <a href="<?php echo url_for('@news-show?id=' . $News[$i]->getId()) ?>">
                <div class="report">
                    <div class="icon"><img src="/img/icon04.png" alt="" width="45" height="45"></div>
                    <?php if (!is_null($News[$i]->getImageId())): ?>
                        <img src="<?php echo url_for('@image-resize?x=460&y=307&hash=' . $News[$i]->getImage()->getHash()) ?>" alt="<?php echo $News[$i]->getTitle() ?>" width="460" height="307">
                    <?php else: ?>
                        <img src="/img/NoImage.png" alt="<?php echo $News[$i]->getTitle() ?>" width="460" height="307">
                    <?php endif ?>
                    <div class="shadow"></div>
                </div>
                <div class="item">
                    <span class="date"><?php echo substr($News[$i]->getUpdatedAt(), 0, 10) ?></span>
                    <span class="time"><?php echo substr($News[$i]->getUpdatedAt(), 11, 5) ?></span>
                </div>
                <h4><?php echo $News[$i]->getTitle() ?></h4>
            </a>
        <?php endfor ?>    
    </div>
    <div class="small_news">
        <?php for ($i = 2; $i < count($News); $i++): ?>
            <a href="<?php echo url_for('@news-show?id=' . $News[$i]->getId()) ?>">
                <div class="report">
                    <div class="icon"><img src="/img/icon04.png" alt="" width="45" height="45"></div>
                    <?php if (!is_null($News[$i]->getImageId())): ?>
                        <img src="<?php echo url_for('@image-resize?x=300&y=200&hash=' . $News[$i]->getImage()->getHash()) ?>" alt="<?php echo $News[$i]->getTitle() ?>" width="300" height="200">
                    <?php else: ?>
                        <img src="/img/NoImage.png" alt="<?php echo $News[$i]->getTitle() ?>" width="300" height="200">
                    <?php endif ?>
                    <div class="shadow"></div>
                </div>
                <div class="item">
                    <span class="date"><?php echo substr($News[$i]->getUpdatedAt(), 0, 10) ?></span>
                    <span class="time"><?php echo substr($News[$i]->getUpdatedAt(), 11, 5) ?></span>
                </div>
                <h4><?php echo $News[$i]->getTitle() ?></h4>
            </a>
        <?php endfor ?>    
    </div>
    <a class="button" href="<?php echo url_for('@news-index?page=1') ?>">Смотреть все новости</a>
</div>

<div class="video">
    <div class="video_holder">
        <h2>Новые видео</h2>
        <div class="gallery" id="gallery2">
            <div class="gallery_wrap">
                <ul class="list">
                    <?php for ($i = 0; $i < count($Video); $i++): ?>
                        <li>
                            <a href="<?php echo url_for('@video-show?id=' . $Video[$i]->getId()) ?>">
                                <img src="//img.youtube.com/vi/<?php echo substr($Video[$i]->getContent(), 32) ?>/mqdefault.jpg" alt="<?php echo $Video[$i]->getTitle() ?>" width="220" height="150">
                                <div class="icon">
                                    <img src="/img/icon06.png" alt="" width="45" height="45">
                                </div>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
            <a class="prev" href="">&#60;</a>
            <a class="next" href="">&#62;</a>
        </div>
    </div>
</div>
