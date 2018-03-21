function foo() {
    return 'bar';
}

// SHOULD HOPEFULLY FIX THE RETARDED SCROLLSPY ISSUES
var offset = 80;

$('.navbar li a').click(function(event) {
    event.preventDefault();
    $($(this).attr('href'))[0].scrollIntoView();
    scrollBy(0, -offset);
});


/* Retrieve and populate causes box
$(document).ready(function() {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log(xhttp.responseText);
            //fill cause box with cause names
            let contentString = '';
            const $causeNameBox = $('#causeNameBox');
            const response = JSON.parse(xhttp.responseText);
            for (let i = 0; i < response.size; i++) {
                contentString += '<a href="#" class="list-group-item">' + i.name + '</a>'
            }
            //$causeNameBox.innerHTML = contentString;
        }
    };
    xhttp.open('GET', 'https://private-anon-fc3adc6135-durhamvolunteering.apiary-mock.com/causes', true);
    xhttp.send();
});*/

//shift Application Form variables
/*
let shiftApplicationForm;
let shiftApplicationEmail;
let shiftApplicationDateTimeStart;
let shiftApplicationDateTimeEnd;
let shiftApplicationSelect;
let shiftApplicationComment;
let shiftApplicationButton;
*/
$('#shiftApplicationButton').click(function() {
    const $shiftApplicationEmail = $('#shiftApplicationEmail');
    const $shiftApplicationDateTimeStart = $('#shiftApplicationDateTimeStart');
    const $shiftApplicationDateTimeEnd = $('#shiftApplicationDateTimeEnd');
    const $shiftApplicationSelect = $('#shiftApplicationSelect');
    const $shiftApplicationComment = $('#shiftApplicationComment');
    let shiftApplicationEmail = $shiftApplicationEmail.val();
    let shiftApplicationDateTimeStart = $shiftApplicationDateTimeStart.val();
    let shiftApplicationDateTimeEnd = $shiftApplicationDateTimeEnd.val();
    let shiftApplicationSelect = $shiftApplicationSelect.val();
    let shiftApplicationComment = $shiftApplicationComment.val();


    /* <<TODO add URL link, Details, Response Handling */
    const http = new XMLHttpRequest();
    const url = "URL";
    const details = '';
    console.log(details);
    http.onreadystatechange = function () { //Function when the state changes.
        if (http.readyState === 4 && http.status === 200) {
            alert('200 OK - response from server: ' + http.responseText);
            // if response is good

        } else if (http.readyState === 4 && http.status === 400) {
            alert('400 Bad Request - response from server: ' + http.responseText);
            if (http.responseText === '') {
                // bad response 1
                console.log('bad response 1');
            } else if (http.responseText === ''){
                // bad response 2
                console.log('bad response 2');
            }
        }
    };
    http.open("POST", url, true);
    // http.setRequestHeader("Authorization", 'Bearer ' + getCookie('token'));
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(details);
});


//shift Cancel Form variables
let shiftCancelForm;
let shiftCancelSelect;
let shiftCancelComment;
let shiftCancelButton;

//shift Response Form variables
let shiftResponseForm;
let shiftResponseRadio1;
let shiftResponseRadio2;
let shiftResponseComment;
let shiftResponseButton;



// access Notification card elements using the id of the element in the 'card' div class (using this applies to all notification elements)


// access dismiss/archive buttons using .dismiss/.archive within the id of the notification (applies to all dismiss/archive buttons)


// write data to notifications dynamically by setting the inner html of all the separate parts within each notification card
// use a for loop to iterate through the ids of each card using getElementById and then use the 'this' selector in jquery to access elements within
// generate as many notification cards as there are notifications for that user - the archiving/dismissing buttons for the notification don't do anything yet


// fill the 'Get involved with Causes' list group with the url from each entry in the causes table of the database


// populate shortcuts link ? university email etc


// fill upcoming and previous events list groups on right hand sidenav using information from the database for each volunteer


// fill selector dropdowns in forms with shifts


// aim is to extract username from user logged in, and show content for the user based on what type of user the username is
// i.e. managers will be able to view shift application and cancellation requests and respond accordingly without having to navigate to a separate page etc
// make forms visible if user type is allowed to perform those functions - i.e. respond to Applications form is a manager form


// perhaps a separate or less cluttered section for the audit log in the case of an admin being logged in
// alternatively, set the audit log to be emailed regularly to users who have permission to view it

$(document).ready(function() {
    $('.dismiss').on('click', (function() {
        console.log('dismiss button clicked')
        createNotificationPopupDismiss();
        removeNotificationDiv();
    }));
    $('.archive').on('click', (function() {
        console.log('archive button clicked')
        createNotificationPopupArchive();
        removeNotificationDiv();
    }));
});

function createNotificationPopupDismiss(){
    console.log('creating dismiss popup');
    $("#notification_popups").append('<div id="notification_popups"><div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Notification dismissed!</div></div>');
}

function createNotificationPopupArchive(){
    console.log('creating archive popup');
    $("#notification_popups").append('<div id="notification_popups"><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Notification archived!</div></div>');

}

function removeNotificationDiv() {
    $(".archive, .dismiss").click(function(event) {
        event.preventDefault();
        $(this).parents('.card').remove();
    });
}

console.log(foo());
console.log('javascript is functional');