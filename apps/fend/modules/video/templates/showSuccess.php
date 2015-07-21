<?php use_javascript('/js/headMenu/Gal.js') ?>
<div class="main topic">
    <div class="one_news">
        <div class="breadcrumbs">
            <a href="<?php echo url_for('@homepage') ?>">Главная</a>
            <a href="<?php echo url_for('@video-index?page=1') ?>">Видео</a>
            <a class="active" href="<?php echo url_for('@video-show?id=' . $currentVideo->getId()) ?>"><?php echo $currentVideo->getTitle() ?></a>
        </div>
        <h2><?php echo $currentVideo->getTitle() ?></h2>
        <div class="item">
            <span class="date"><?php echo substr($currentVideo->getCreatedAt(), 0, 10) ?></span>
            <span class="time"><?php echo substr($currentVideo->getCreatedAt(), 11, 5) ?></span>
        </div>
        <div class="columns">
            <div class="left_column">
                <iframe width="700" height="450" src="https://www.youtube.com/embed/<?php echo substr($currentVideo->getContent(), 32) ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="right_column">
                <?php if (!is_null($prevVideo)): ?>
                    <a href="<?php echo url_for('@video-show?id=' . $prevVideo->getId()) ?>">
                        <div class="report">
                            <div class="icon"><img src="/img/icon06.png" alt="" width="45" height="45"></div>
                            <img src="//img.youtube.com/vi/<?php echo substr($prevVideo->getContent(), 32) ?>/mqdefault.jpg" 
                                 alt="<?php echo $prevVideo->getTitle() ?>" width="220" height="147">
                            <div class="shadow"></div>
                        </div>
                        <div class="item">
                            <span class="date"><?php echo substr($prevVideo->getCreatedAt(), 0, 10) ?></span>
                            <span class="time"><?php echo substr($prevVideo->getCreatedAt(), 11, 5) ?></span>
                        </div>
                        <h4><?php echo $prevVideo->getTitle() ?></h4>
                    </a>
                <?php endif ?>
                <?php if (!is_null($nextVideo)): ?>
                    <a href="<?php echo url_for('@video-show?id=' . $nextVideo->getId()) ?>">
                        <div class="report">
                            <div class="icon"><img src="/img/icon06.png" alt="" width="45" height="45"></div>
                            <img src="//img.youtube.com/vi/<?php echo substr($nextVideo->getContent(), 32) ?>/mqdefault.jpg" 
                                 alt="<?php echo $nextVideo->getTitle() ?>" width="220" height="147">
                            <div class="shadow"></div>
                        </div>
                        <div class="item">
                            <span class="date"><?php echo substr($nextVideo->getCreatedAt(), 0, 10) ?></span>
                            <span class="time"><?php echo substr($nextVideo->getCreatedAt(), 11, 5) ?></span>
                        </div>
                        <h4><?php echo $nextVideo->getTitle() ?></h4>
                    </a>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>