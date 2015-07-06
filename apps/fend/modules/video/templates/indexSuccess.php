<div class="main">
    <h2>Видео</h2>
    <div class="big_news">
        <?php $Video = $pager->getResults() ?>
        <?php if (count($Video) == 1): ?>
            <?php $count = 1 ?>
        <?php else: ?>
            <?php $count = 2 ?>
        <?php endif ?>
        <?php for ($i = 0; $i < $count; $i++): ?>
            <a href="<?php echo url_for('@video-show?id=' . $Video[$i]->getId()) ?>">
                <div class="report">
                    <div class="icon"><img src="/img/icon06.png" alt="" width="45" height="45"></div>
                    <img src="//img.youtube.com/vi/<?php echo substr($Video[$i]->getContent(), 32)?>/mqdefault.jpg" alt="<?php echo $Video[$i]->getTitle() ?>" width="460" height="307">
                    <div class="shadow"></div>
                </div>
                <div class="item">
                    <span class="date"><?php echo substr($Video[$i]->getCreatedAt(), 0, 10) ?></span>
                    <span class="time"><?php echo substr($Video[$i]->getCreatedAt(), 11, 5) ?></span>
                </div>
                <h4><?php echo $Video[$i]->getTitle() ?></h4>
            </a>
        <?php endfor ?>    
    </div>
    <div class="small_news">
        <?php for ($i = 2; $i < count($Video); $i++): ?>
            <a href="<?php echo url_for('@video-show?id=' . $Video[$i]->getId()) ?>">
                <div class="report">
                    <div class="icon"><img src="/img/icon06.png" alt="" width="45" height="45"></div>
                    <img src="//img.youtube.com/vi/<?php echo substr($Video[$i]->getContent(), 32)?>/mqdefault.jpg" alt="<?php echo $Video[$i]->getTitle() ?>" width="300" height="200">
                    <div class="shadow"></div>
                </div>
                <div class="item">
                    <span class="date"><?php echo substr($Video[$i]->getCreatedAt(), 0, 10) ?></span>
                    <span class="time"><?php echo substr($Video[$i]->getCreatedAt(), 11, 5) ?></span>
                </div>
                <h4><?php echo $Video[$i]->getTitle() ?></h4>
            </a>
        <?php endfor ?>    
    </div>   
    <?php if ($pager->haveToPaginate()): ?>
        <div class="pagination">
            <div class="more">Больше новостей</div>
            <ul>
                <li><a class="prev_page" href="<?php echo url_for('@video-index?page=' . $pager->getPreviousPage()) ?>">&lt;</a></li>
                <?php foreach ($pager->getLinks(5) as $page): ?>
                    <?php if ($page == $pager->getPage()): ?>
                        <li class="active"><a href="<?php echo url_for('@video-index?page=' . $page) ?>"><?php echo $page ?></a></li> 
                    <?php else: ?>
                        <li><a href="<?php echo url_for('@video-index?page=' . $page) ?>"><?php echo $page ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li><a class="next_page" href="<?php echo url_for('@video-index?page=' . $pager->getLastPage()) ?>">&gt;</a></li>
            </ul>
        </div>
    <?php endif ?>
</div>