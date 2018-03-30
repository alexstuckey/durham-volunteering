// home javascript

$(document).ready(function() {
    // notification dismiss button
    $('.dismiss').on('click', (function() {
        console.log('dismiss button clicked');
        createNotificationPopupDismiss();
        removeNotificationDiv();
    }));

    // select2
    $('#shiftApplicationCause, #viewCause, #shiftResponseSelect, #inputDepartment, #shiftCancelSelect').select2({
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

console.log('javascript is functional');