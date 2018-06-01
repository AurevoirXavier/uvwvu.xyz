<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="mdui-container mdui-typo searchData" role="main">
    <h3><?php $this->archiveTitle(array(
            'category'  =>  _t('%s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s\'s publish')
        ), '', ''); ?></h3>
    <?php if ($this->have()): ?>
        <?php while($this->next()): ?>
            <article class="s-data-card mdui-col-md-4">
                <div class="s-data-card-con shadow-2">
                    <div class="colorHi"></div>
                    <h5><?php $this->title() ?></h5>
                    <p>
                        <?php _e('Author: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
                        &nbsp<?php _e('Date: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
                    </p>
                    <p>
                        <a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('Comment', '1 条评论', '%d 条评论'); ?></a>
                    </p>
                    <div class="mdui-divider" style="margin-bottom: 10px"></div>
                    <p>
                        <?php $this->excerpt(50,'...'); ?>
                    </p>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else: ?>
        <div>Welcome to the Void. Try searching?</div>
        <form method="post" class="findMore-404 getData-input">
            <input placeholder="Searching...( Enter )" type="text" name="s" autofocus />
        </form>
    <?php endif; ?>

    <?php $this->pageNav('&laquo;', '&raquo;'); ?>
</div><!-- end #main -->

<?php $this->need('footer.php'); ?>
