$.ajaxSetup({
    cache: true
});

$.getScript('//s.uvwvu.xyz/live2d/live2d.js').done(function() {
    $.getScript('//s.uvwvu.xyz/live2d/waifu-tips.js').done(function() {
        $('<link>').attr({href: '//s.uvwvu.xyz/live2d/waifu.css', rel: 'stylesheet', type: 'text/css'}).appendTo('head');
        initModel('//s.uvwvu.xyz/live2d/');
    });
});
