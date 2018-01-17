function foo() {
    return 'bar';
}



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


console.log(foo());
console.log('javascript is functional');
