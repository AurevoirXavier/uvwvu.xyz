<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
if(is_array($_GET)&&count($_GET)>0)
{
    if(isset($_GET["replyTo"]))
    {
        $ac = $_GET["replyTo"];
        }
} ?>
<script>
    $(document).ready(function () {
        replyId = $('#comment-'+"<?php echo $ac; ?>");
        replyName =  replyId.find('.name:first > a').text();
        if (replyId !== ''){
            $('.replyId').fadeIn();
            if (replyName) {
                $('.reply-name').text(replyName);
                replyCon =  replyId.find('.userBB-Content:first > p').text();
                if (replyCon.length > 36) {
                    replyCon = replyCon.substring(0, 35) + '...';
                }
                $('.replyCon').text('"'+replyCon+'"');
            } else {
                replyName = replyId.find('.name:first').text()
                if (replyName) {
                    $('.reply-name').text(replyName);
                    replyCon =  replyId.find('.userBB-Content:first > p').text();
                    if (replyCon.length > 36) {
                        replyCon = replyCon.substring(0, 35) + '...';
                    }
                $('.replyCon').text('"'+replyCon+'"');
                }
            }
        } else {
            $('.replyId').css({
                display : 'none'
            })
        }
    });
</script>
<div class="sibi borR5px shadow-2 mdui-typo">
    <?php $this->comments()->to($comments); ?>
    <?php if($this->allow('comment')): ?>
    <div class="pageHead" id="<?php $this->respondId(); ?>">
        <h4><?php $this->commentsNum(_t('No commennt yet'), _t('Only one comment'), _t('There are %d comments')); ?></h4>
        <div class="mdui-divider" style="margin: 15px 0"></div>
    </div>
    <div class="newBB mdui-row">
        <div class="mdui-row">
            <form method="post" action="<?php $this->commentUrl() ?>" style="width: 100%" role="form" id="comment_form">
            <div class="replyId" id="replyId" style="float: left">To: <span class="reply-name"><?php echo $this->author->name();?></span>&nbsp&nbsp<span class="replyCon" style="background-color: rgb(235, 235, 235)"></span></div>
                <?php if($this->user->hasLogin()): ?>
                    <div style="float: right"><?php _e('From: '); ?><?php $this->user->screenName(); ?>. &nbsp<a style="display: initial" href="<?php $this->options->logoutUrl(); ?>" title="Sign out"><?php _e('Sign out'); ?> &raquo; </a></div>
                <?php else: ?>
                    <a class="smallSize" href="<?php $this->options->adminUrl(); ?>">Sign in</a>
                    <div class="userIC">
                        <div class="mdui-col-xs-12 mdui-col-md-3 getData-input" id="userName">
                            <input type="text" placeholder="Name" name="author" value="<?php $this->remember('author'); ?>" required />
                        </div>
                        <div class="mdui-col-xs-12 mdui-col-md-4 getData-input" id="mail">
                            <input type="email" placeholder="E-mail" name="mail" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                        </div>
                        <div class="mdui-col-xs-12 mdui-col-md-4 getData-input" id="urls">
                            <input type="text" name="url" id="urls" placeholder="http://" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>/>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="mdui-col-xs-12 mdui-col-md-12 getData-input" id="content">
                    <textarea name="text" id="textarea" class="textarea" placeholder="Content..." required ><?php $this->remember('text'); ?></textarea>
                </div>
                <div class="mdui-col-xs-12 mdui-col-md-2" id="subBtn">
                    <button class="mdui-ripple" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <?php else: ?>
            <h3><?php _e('Author do not allow to comment'); ?></h3>
        <?php endif; ?> <!-- 判断是否允许评论 -->
    </div>
    <div class="mdui-row comFiled">
        <div class="mdui-col-md-8">
            <?php $comments->listComments(); ?>
        </div>
        <div class="mdui-col-md-4 comTool">
            <h4>Labels</h4>
            <div class="tags">
                <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
                <?php if($tags->have()): ?>
                <nav class="tags-list">
                    <?php while ($tags->next()): ?>
                        <a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <?php _e('No labels yet'); ?>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </div>
    <?php function threadedComments($comments, $options) {
        $commentClass = '';
        if ($comments->authorId) {
            if ($comments->authorId == $comments->ownerId) {
                $commentClass .= ' comment-by-author';
            } else {
                $commentClass .= ' comment-by-user';
            }
        }
        $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
        ?>

        <div class="userBB" id="<?php $comments->theId(); ?>">
            <div class="replyTools">
                    <button class="mdui-btn mdui-btn-icon mdui-ripple replyBtn">
                        <i class="mdui-icon material-icons">reply</i>
                        <?php $comments->reply(''); ?>
                    </button>
            </div>
            <div class="userData">
                <div class="userIcon">
                    <?php $comments->gravatar('60', ''); ?>
                </div>
                <div class="userName">
                    <div class="name"><?php $comments->author(); ?></div>
                    <div class="Jurisdiction"><?php $comments->date('Y - m - d H : i'); ?></div>
                </div>
            </div>
            <div class="userBB-Content">
                <?php $comments->content(); ?>
            </div>
            <?php if ($comments->children) { ?>
                <div class="comment-children">
                    <?php $comments->threadedComments($options); ?>
                </div>
            <?php } ?>
        </div>
        <div style="clear: both"></div>

    <?php } ?>
</div>
