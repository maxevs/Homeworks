<div class="main-menu">
<?php foreach($menu as $item){ ?>
    <a href="<?=$item['url']?>" <?php if ( $item['is_active'] ) { ?> class="menu-item-active" <?php } ?> ><?=$item['title']?></a>
<?php } ?>
</div>