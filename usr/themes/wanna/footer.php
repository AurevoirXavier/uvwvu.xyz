<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer class="mdui-container-fluid shadow-1">
    <div class="mdui-row">
        <div class="mdui-col-md-4">
            <p>Powered by <a href="http://uvwvu.com">AurevoirXavier</a></p>
            <p>Theme: <a href="http://icry.info/">Wanna</a></p>
        </div>
        <div class="mdui-col-md-4">
            <div id="yy520"></div>
            <p>
                Copyright © 2018 UVWVU
            </p>
        </div>
    </div>
    
    <div class="waifu">
        <div class="waifu-tips"></div>
        <canvas id="live2d" width="280" height="250" class="live2d"></canvas>
        <div class="waifu-tool">
            <span class="fui-home"></span>
            <span class="fui-chat"></span>
            <span class="fui-eye"></span>
            <span class="fui-user"></span>
            <span class="fui-photo"></span>
            <!-- <span class="fui-info-circle"></span> -->
            <span class="fui-cross"></span>
        </div>
    </div>

    <script>
        fetch('https://v1.hitokoto.cn')
            .then(function (res){
                return res.json();
            })
            .then(function (data) {
                var hitokoto = document.getElementById('yy520');
                hitokoto.innerText = data.hitokoto;
            })
            .catch(function (err) {
                console.error(err);
            });
        $(document).pjax('#body a,#header a','#body',{
            fragment: '#body',
            timeout : '50000'
        });
        $(document).off('pjax:send').on('pjax:send',function () {
	    $('.pjax-load').css({display:'flex'});
        });
        $(document).off('pjax:complete').on('pjax:complete',function () {
	    $('.pjax-load').css({display:'none'});
            mdui.mutation();
            reload();
        })
    </script>

    <script src="//s.uvwvu.xyz/live2d/waifu-tips.js"></script>
    <script src="//s.uvwvu.xyz/live2d/live2d.js"></script>
    <script type="text/javascript">initModel("//s.uvwvu.xyz/live2d/")</script>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
        </div>
<?php $this->need('sidebar.php'); ?>
    </body>
</html>
