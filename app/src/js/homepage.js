function foo() {
    return 'bar';
}


// let progressBar1 = new ProgressBar.Line(container, {
//     strokeWidth: 4,
//     easing: 'easeInOut',
//     duration: 1400,
//     color: '#FFEA82',
//     trailColor: '#eee',
//     trailWidth: 1,
//     svgStyle: {width: '100%', height: '100%'},
//     text: {
//         style: {
//             // Text color.
//             // Default: same as stroke color (options.color)
//             color: '#999',
//             position: 'absolute',
//             right: '0',
//             top: '30px',
//             padding: 0,
//             margin: 0,
//             transform: null
//         },
//         autoStyleContainer: false
//     },
//     from: {color: '#FFEA82'},
//     to: {color: '#ED6A5A'},
//     step: (state, bar) => {
//         bar.setText(Math.round(bar.value() * 100) + ' /100');
//     }
// });
//
// bar.animate(80/100);  // this is the number it fills to


$(document).ready(function() {
    // notification dismiss button
    $('.dismiss').on('click', (function() {
        console.log('dismiss button clicked');
        createNotificationPopupDismiss();
        removeNotificationDiv();
    }));

    // select2
    $('#shiftApplicationCause').select2({
        theme: "bootstrap4"
    });

    $('#viewCause').select2({
        theme: "bootstrap4"
    });
});

function createNotificationPopupDismiss(){
    console.log('creating dismiss popup');
    $("#notification_popups").append('<div id="notification_popups"><div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Notification dismissed!</div></div>');
}

function removeNotificationDiv() {
    $(".dismiss").click(function(event) {
        event.preventDefault();
        $(this).parents('.card').remove();
    });
}

console.log(foo());
console.log('javascript is functional');