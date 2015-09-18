var colors = [
    '#EEF0F1',
    '#F2F2F2',
    'rgb(243, 240, 247)',
    'white'
];

function getRandomColor() {
//    return colors[Math.floor(Math.random() * colors.length)];
return 'white';
}

(function($) {
    $(function() {
       $('body').css('background-color', getRandomColor());
    });
})(jQuery);
