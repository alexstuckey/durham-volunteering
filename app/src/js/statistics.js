// statistics javascript

$(document).ready(function() {

    // data variables extracted from statistics model after being fed to statistics view
    console.log("sum of time by cause: " + JSON.stringify(sumTimeByCause));
    console.log("total volunteering time by department: " + JSON.stringify(volunteeringTimeByDepartment));
    console.log("total personal volunteering time: " + volunteeringTimePersonal);
    console.log("total hours volunteered at university: " + totalHoursVolunteered);
    console.log("total number of volunteers: " + totalVolunteers);
    console.log("personal favourite cause: " + getFavouriteCause);
    console.log("personal position within department: " + JSON.stringify(positionWithinDepartment));


    // total time by cause:                 sumTimeByCause['timeSum']
    //                                      sumTimeByCause['organisation']
    // volunteering time by department:     volunteeringTimeByDepartment['departmentsName']
    //                                      volunteeringTimeByDepartment['timeSum']
    // personal volunteering time total:    volunteeringTimePersonal
    // total hours volunteered:             totalHoursVolunteered
    // total number of volunteers:          totalVolunteers
    // favourite cause:                     getFavouriteCause
    // position within department:          positionWithinDepartment['departmentsName']



    // Personal milestone 1 options
    let progressBar1 = new ProgressBar.Line(document.getElementById('progressBar1'), {
        strokeWidth: 6,
        easing: 'easeInOut',
        duration: 1400,
        color: '#68275C',
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
        from: {color: '#68275C'},
        to: {color: '#68275C'},
        step: (state, progressBar1) => {
            progressBar1.setText(Math.round(progressBar1.value() * 100) + ' /100');
        }
    });
    progressBar1.animate(80/100);  // this is the number it fills to



    // Personal Milestone 2 options
    let progressBar2 = new ProgressBar.Line(document.getElementById('progressBar2'), {
        strokeWidth: 6,
        easing: 'easeInOut',
        duration: 1400,
        color: '#68275C',
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
        from: {color: '#68275C'},
        to: {color: '#68275C'},
        step: (state, progressBar2) => {
            progressBar2.setText(Math.round(progressBar2.value() * 100) + ' /100');
        }
    });
    progressBar2.animate(38/100);  // this is the number it fills to



    // Progress Circle personal total hours options
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
        from: { color: '#68275C', width: 1 },
        to: { color: '#68275C', width: 5 },
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
    progressBar3.text.style.fontFamily = '"alternate_gothic_fs_no_3Rg", "Arial", sans-serif';
    progressBar3.text.style.fontSize = '2rem';
    if (volunteeringTimePersonal === '') {
        progressBar3.animate(100/120);  // extracted value is null
    } else {
        progressBar3.animate(Number.parseInt(volunteeringTimePersonal)/120);
    }



    // Department Milestone 1 Options
    let progressBar4 = new ProgressBar.Line(document.getElementById('progressBar4'), {
        strokeWidth: 6,
        easing: 'easeInOut',
        duration: 1400,
        color: '#68275C',
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
        from: {color: '#68275C'},
        to: {color: '#68275C'},
        step: (state, progressBar4) => {
            progressBar4.setText(Math.round(progressBar4.value() * 100) + ' /100');
        }
    });
    progressBar4.animate(16/100);  // this is the number it fills to


});
