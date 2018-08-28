<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!-- <div class="vMenu" id="vMenu">
    <div class="vMenu-onBtn" id="vMenu-onbtn">
        <i class="mdui-icon material-icons">arrow_forward</i>
    </div>
    <ul class="small-vMenu-list" id="smallMenu">
        <a href="<?php $this->options->siteUrl(); ?>start-page.rust">
            <li class="mdui-ripple">
                <i class="fa fa-user-circle-o fa-lg"></i>
            </li>
        </a>
        <a href="<?php $this->options->siteUrl(); ?>archive.rust">
            <li class="mdui-ripple">
                <i class="fa fa-archive fa-lg"></i>
            </li>
        </a>
        <a href="https://github.com/aurevoirxavier">
            <li class="mdui-ripple">
                <i class="fa fa-github fa-lg"></i>
            </li>
        </a>
        <a href="<?php $this->options->feedUrl(); ?>">
            <li class="mdui-ripple">
                <i class="fa fa-rss fa-lg"></i>
            </li>
        </a>
    </ul>
    <div class="v-menu-assembly-1">
        <div class="Blog-logo">
            <div class="iam-img" id="logo"></div>
            <div class="iam-t mdui-typo">
                <h5>AurevoirXavier</h5>
                <p><?php $this->options->description() ?></p>
            </div>
        </div>
    </div>
    <div class="v-menu-assembly-2">
        <ul class="vMenu-item-list">
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
                <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><li class="mdui-ripple"><?php $pages->title(); ?></li></a>
            <?php endwhile; ?>
            <a href="https://github.com/aurevoirxavier"><li class="mdui-ripple">Github</li></a>
            <a href="<?php $this->options->feedUrl(); ?>"><li class="mdui-ripple">RSS</li></a>
        </ul>
    </div>
</div>
<script>
    $('.iam-img').css({
        backgroundImage : "url("+logo+")"
    });
</script> -->

<div class="vMenu shadow-1" id="vMenu">
    <div class="v-menu-assembly">
        <div class="Blog-logo">
            <div class="iam-img" id="logo"></div>
            <div class="iam-t">
                <span>Void</span>
                <p><?php $this->options->description() ?></p>
            </div>
        </div>
    </div>
    <div class="colorBar" style="margin: 0 auto;margin-bottom: 24px;width: 100px"></div>
    <div class="v-menu-assembly">
        <ul class="vMenu-item-list">
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
                <a><?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><li class="mdui-ripple"><?php $pages->title(); ?></li></a>
            <?php endwhile; ?>
            <a href="<?php $this->options->feedUrl(); ?>"><li class="mdui-ripple">RSS</li></a>
        </ul>
    </div>
</div>
<div class="overlay"></div>
<script>
    $('.iam-img').css({
        backgroundImage : "url("+logo+")"
    });
</script>
