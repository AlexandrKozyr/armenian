<?php use_javascript('/js/headMenu/News.js') ?>
<div class="main topic">
    <div class="one_news">
        <div class="breadcrumbs">
            <a href="<?php echo url_for('@homepage') ?>">Главная</a>
            <a href="<?php echo url_for('@news-index?page=1') ?>">Новости</a>
            <a class="active" href="<?php echo url_for('@news-show?id=' . $currentNews->getId()) ?>"><?php echo $currentNews->getTitle() ?></a>
        </div>
        <h2><?php echo $currentNews->getTitle() ?></h2>
        <div class="item">
            <span class="date"><?php echo substr($currentNews->getCreatedAt(), 0, 10) ?></span>
            <span class="time"><?php echo substr($currentNews->getCreatedAt(), 11, 5) ?></span>
        </div>
        <div class="columns">
            <div class="left_column">
                <?php if (!is_null($currentNews->getImageId())): ?>
                    <img src="<?php echo url_for('@image-resize?x=700&y=450&hash=' . $currentNews->getImage()->getHash()) ?>" 
                         alt="<?php echo $currentNews->getTitle() ?>" width="700" height="450">
                     <?php else: ?>
                    <img src="/img/NoImage.png" 
                         alt="<?php echo $currentNews->getTitle() ?>" width="700" height="450">
                     <?php endif ?>
                <p><?php echo $currentNews->getRawValue()->getContent() ?></p>
            </div>
            <div class="right_column">
                <?php if (!is_null($prevNews)): ?>
                    <a href="<?php echo url_for('@news-show?id=' . $prevNews->getId()) ?>">
                        <div class="report">
                            <div class="icon"><img src="/img/icon04.png" alt="" width="45" height="45"></div>
                            <?php if (!is_null($prevNews->getImageId())): ?>
                                <img src="<?php echo url_for('@image-resize?x=220&y=147&hash=' . $prevNews->getImage()->getHash()) ?>" 
                                     alt="<?php echo $prevNews->getTitle() ?>" width="220" height="147">
                                 <?php else: ?>
                                <img src="/img/NoImage.png" 
                                     alt="<?php echo $prevNews->getTitle() ?>" width="220" height="147">
                                 <?php endif ?>
                            <div class="shadow"></div>
                        </div>
                        <div class="item">
                            <span class="date"><?php echo substr($prevNews->getCreatedAt(), 0, 10) ?></span>
                            <span class="time"><?php echo substr($prevNews->getCreatedAt(), 11, 5) ?></span>
                        </div>
                        <h4><?php echo $prevNews->getTitle() ?></h4>
                    </a>
                <?php endif ?>
                <?php if (!is_null($nextNews)): ?>
                    <a href="<?php echo url_for('@news-show?id=' . $nextNews->getId()) ?>">
                        <div class="report">
                            <div class="icon"><img src="/img/icon04.png" alt="" width="45" height="45"></div>
                            <?php if (!is_null($nextNews->getImageId())): ?>
                                <img src="<?php echo url_for('@image-resize?x=220&y=147&hash=' . $nextNews->getImage()->getHash()) ?>" 
                                     alt="<?php echo $nextNews->getTitle() ?>" width="220" height="147">
                                 <?php else: ?>
                                <img src="/img/NoImage.png" 
                                     alt="<?php echo $nextNews->getTitle() ?>" width="220" height="147">
                                 <?php endif ?>
                            <div class="shadow"></div>
                        </div>
                        <div class="item">
                            <span class="date"><?php echo substr($nextNews->getCreatedAt(), 0, 10) ?></span>
                            <span class="time"><?php echo substr($nextNews->getCreatedAt(), 11, 5) ?></span>
                        </div>
                        <h4><?php echo $nextNews->getTitle() ?></h4>
                    </a>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>