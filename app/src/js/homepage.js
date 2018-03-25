function foo() {
    return 'bar';
}


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

    let progressBar1 = new ProgressBar.Line(document.getElementById('progressBar1'), {
        strokeWidth: 4,
        easing: 'easeInOut',
        duration: 1400,
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        svgStyle: {width: '100%', height: '100%'},
        text: {
            style: {
                // Text color.
                // Default: same as stroke color (options.color)
                color: '#999',
                position: 'absolute',
                right: '0',
                top: '30px',
                padding: 0,
                margin: 0,
                transform: null
            },
            autoStyleContainer: false
        },
        from: {color: '#FFEA82'},
        to: {color: '#ED6A5A'},
        step: (state, progressBar1) => {
            progressBar1.setText(Math.round(progressBar1.value() * 100) + ' /100');
        }
    });
    progressBar1.animate(80/100);  // this is the number it fills to


    let progressBar2 = new ProgressBar.Line(document.getElementById('progressBar2'), {
        strokeWidth: 4,
        easing: 'easeInOut',
        duration: 1400,
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        svgStyle: {width: '100%', height: '100%'},
        text: {
            style: {
                // Text color.
                // Default: same as stroke color (options.color)
                color: '#999',
                position: 'absolute',
                right: '0',
                top: '30px',
                padding: 0,
                margin: 0,
                transform: null
            },
            autoStyleContainer: false
        },
        from: {color: '#FFEA82'},
        to: {color: '#ED6A5A'},
        step: (state, progressBar2) => {
            progressBar2.setText(Math.round(progressBar2.value() * 100) + ' /100');
        }
    });
    progressBar2.animate(38/100);  // this is the number it fills to

    let progressBar3 = new ProgressBar.Circle(document.getElementById('progressBar3'), {
        color: '#222',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 4,
        trailWidth: 1,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: { color: '#77DD77', width: 1 },
        to: { color: '#77DD77', width: 4 },
        // Set default step function for all animate calls
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText(value+'/120 Hours');
            }

        }
    });
    progressBar3.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    progressBar3.text.style.fontSize = '2rem';
    progressBar3.animate(100/120);  // this is the number it fills to


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