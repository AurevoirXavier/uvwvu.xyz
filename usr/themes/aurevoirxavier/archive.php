<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="mdui-container mdui-typo searchData" role="main">
    <h3><?php $this->archiveTitle(array(
            'category'  =>  _t('Category: %s'),
            'search'    =>  _t('Keyword: %s'),
            'tag'       =>  _t('Tag: %s'),
            'author'    =>  _t('%s\'s publish')
        ), '', ''); ?></h3>
    <?php if ($this->have()): ?>
        <div class="mdui-row">
        <?php while($this->next()): ?>
            <article class="s-data-card mdui-col-md-4">
                <div class="s-data-card-con shadow-2">
                    <div class="colorHi">
                        <?php if($this->options->slimg && 'guanbi'==$this->options->slimg): ?>
                        <?php else: ?>
                            <?php if($this->options->slimg && 'showoff'==$this->options->slimg): ?><a href="<?php $this->permalink() ?>" ><?php showThumbnail($this); ?></a>
                            <?php else: ?>
                                <div class="cardImage-img" style="background-image: url('<?php showThumbnail($this); ?>')"></div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <h5><?php $this->title() ?></h5>
                    <p>
                        <?php _e('Author: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
                        &nbsp<?php _e('Date: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
                    </p>
                    <p>
                        <a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('Not comment yet', '1 comment', '%d comments'); ?></a>
                    </p>
                    <div class="mdui-divider" style="margin-bottom: 10px"></div>
                    <p>
                        <?php $this->excerpt(20,'...'); ?>
                    </p>
                </div>
            </article>
        <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div>Welcome to the Void. Try searching?</div>
        <form method="post" class="findMore-404 getData-input">
            <input placeholder="Searching...( Enter )" type="text" name="s" autofocus />
        </form>
    <?php endif; ?>
    <div class="mdui-row" id="search-list-nav">
        <div class="nav mdui-col-md-4 mdui-col-xs-10 mdui-col-offset-xs-1">
            <?php $this->pageNav('<i class="mdui-icon material-icons">keyboard_arrow_left</i>', '<i class="mdui-icon material-icons">&#xe315;</i>',0, '...', 'wrapTag=ul&wrapClass=page-navigator&itemTag=li&textTag=span&tClass=current&prevClass=prev&nextClass=next'); ?>
        </div>
    </div>
</div><!-- end #main -->

<?php $this->need('footer.php'); ?>
