$.ajaxSetup({
    cache: true
});

$.getScript('//s.uvwvu.xyz/live2d/live2d.js').done(function() {
    $.getScript('//s.uvwvu.xyz/live2d/waifu-tips.js').done(function() {
        $('<link>').attr({href: '//s.uvwvu.xyz/live2d/waifu.css', rel: 'stylesheet', type: 'text/css'}).appendTo('head');
        $('body').append('<div class="waifu"><div class="waifu-tips"></div><canvas id="live2d" width="280" height="250" class="live2d"></canvas><div class="waifu-tool"><span class="fui-home"></span> <span class="fui-chat"></span> <span class="fui-eye"></span> <span class="fui-user"></span> <span class="fui-photo"></span> <span class="fui-info-circle" style="display:none;"></span> <span class="fui-cross"></span></div></div>');
        initModel('//s.uvwvu.xyz/live2d/');
    });
});
