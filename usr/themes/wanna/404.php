<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
    <div class="mdui-container body-404">
        <div>Welcome to the Void. Try searching?</div>
        <form method="post" class="findMore-404 getData-input"">
           <input placeholder="Searching...( Enter )" type="text" name="s" autofocus />
        </form>
    </div>
<?php $this->need('footer.php'); ?>
