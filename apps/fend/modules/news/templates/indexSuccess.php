<div class="main">
    <h2>Новости</h2>
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
                    <span class="date"><?php echo substr($News[$i]->getCreatedAt(), 0, 10) ?></span>
                    <span class="time"><?php echo substr($News[$i]->getCreatedAt(), 11, 5) ?></span>
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
                    <span class="date"><?php echo substr($News[$i]->getCreatedAt(), 0, 10) ?></span>
                    <span class="time"><?php echo substr($News[$i]->getCreatedAt(), 11, 5) ?></span>
                </div>
                <h4><?php echo $News[$i]->getTitle() ?></h4>
            </a>
        <?php endfor ?>    
    </div>   
    <?php if ($pager->haveToPaginate()): ?>
        <div class="pagination">
            <div class="more">Больше новостей</div>
            <ul>
                <li><a class="prev_page" href="<?php echo url_for('@news-index?page=' . $pager->getPreviousPage()) ?>">&lt;</a></li>
                <?php foreach ($pager->getLinks(5) as $page): ?>
                    <?php if ($page == $pager->getPage()): ?>
                        <li class="active"><a href="<?php echo url_for('@news-index?page=' . $page) ?>"><?php echo $page ?></a></li> 
                    <?php else: ?>
                        <li><a href="<?php echo url_for('@news-index?page=' . $page) ?>"><?php echo $page ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li><a class="next_page" href="<?php echo url_for('@news-index?page=' . $pager->getLastPage()) ?>">&gt;</a></li>
            </ul>
        </div>
    <?php endif ?>
</div>