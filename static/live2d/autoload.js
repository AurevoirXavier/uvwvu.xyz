$.ajaxSetup({
    cache: true
});

$.getScript('//s.uvwvu.xyz/live2d/live2d.js').done(function() {
    $.getScript('//s.uvwvu.xyz/live2d/waifu-tips.js').done(function() {
        initModel('//s.uvwvu.xyz/live2d/');
    });
});