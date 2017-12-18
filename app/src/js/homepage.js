function foo() {
    return 'bar';
}

let offset = 80;

$('body').scrollspy
$('.navbar li a').click(function(event) {
    event.preventDefault();
    $($(this).attr('href'))[0].scrollIntoView();
    scrollBy(0, -offset);
});

// access Notification Well elements using .notification (using this applies to all notification elements)

// access dismiss/archive buttons using .dismiss/.archive (applies to all dismiss/archive buttons
console.log(foo());
console.log('javascript is functional');
