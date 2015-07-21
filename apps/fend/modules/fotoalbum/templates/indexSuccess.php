<?php use_javascript('/js/headMenu/Gal.js') ?>
<div class="main">			
    <h2>Фотогалерея</h2>
    <div class="photo_holder">
        <?php $Albums = $pager->getResults()?>
        <?php for ($i = 0; $i < count($Albums); $i++): ?>
            <a class="photo_link" href="<?php echo url_for('@fotoalbum-show?id=' . $Albums[$i]->getId()) ?>">
                <div class="icon"><img src="/img/icon08.png" alt="" width="45" height="45"></div>
                <div class="photo_item">
                    <?php if (!is_null($Albums[$i]->getCoverImage())): ?>
                       <img src="<?php echo url_for('@image-resize?x=300&y=200&hash=' . $Albums[$i]->getImage()->getHash()) ?>" alt="<?php echo $Albums[$i]->getTitle() ?>" width="300" height="200">
                    <?php else: ?>
                        <img src="/img/NoImage.png" alt="<?php echo $Albums[$i]->getTitle() ?>" width="300" height="200">
                    <?php endif ?>
                    <div class="item_info">
                        <div class="item">
                            <span class="date"><?php echo substr($Albums[$i]->getCreatedAt(), 0, 10) ?></span>
                            <span class="time"><?php echo substr($Albums[$i]->getCreatedAt(), 11, 5) ?></span>
                        </div>
                    </div>
                </div>
                <h4><?php echo $Albums[$i]->getTitle() ?></h4>
            </a>
        <?php endfor ?>    
    </div>
    <?php if ($pager->haveToPaginate()): ?>
        <div class="pagination">
            <div class="more">Больше фото</div>
            <ul>
                <li><a class="prev_page" href="<?php echo url_for('@fotoalbum-index?page=' . $pager->getPreviousPage()) ?>">&lt;</a></li>
                <?php foreach ($pager->getLinks(5) as $page): ?>
                    <?php if ($page == $pager->getPage()): ?>
                        <li class="active"><a href="<?php echo url_for('@fotoalbum-index?page=' . $page) ?>"><?php echo $page ?></a></li> 
                    <?php else: ?>
                        <li><a href="<?php echo url_for('@fotoalbum-index?page=' . $page) ?>"><?php echo $page ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li><a class="next_page" href="<?php echo url_for('@fotoalbum-index?page=' . $pager->getLastPage()) ?>">&gt;</a></li>
            </ul>
        </div>
    <?php endif ?>
</div>