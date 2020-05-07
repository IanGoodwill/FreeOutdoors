// ScrollMagic Section Wipe

const controller = new ScrollMagic.Controller({
        globalSceneOptions: {
            triggerHook: 'onEnter',
            duration: "0%" // this works just fine with duration 0 as well
            // However with large numbers (>20) of pinned sections display errors can occur so every section should be unpinned once it's covered by the next section.
            // Normally 100% would work for this, but here 200% is used, as Panel 3 is shown for more than 100% of scrollheight due to the pause.
        }
    });
/*
    // get all slides
    const slides = document.querySelectorAll("section.panel");

    // create scene for every slide
    for (let i=0; i<slides.length; i++) {
        new ScrollMagic.Scene({
                triggerElement: slides[i]
            })
            .setPin(slides[i], {pushFollowers: true}) // changed from false
            .addIndicators() // add indicators (requires plugin)
            .addTo(controller);
            console.log ( slides );
    };
*/

// ScrollMagic Reveal On Scroll Single
  

    new ScrollMagic.Scene({
        triggerElement: "#trigger2",
        triggerHook: 0.9,
        offset: 10, // move trigger to center of element
        reverse: false // only do once
    })
    .setClassToggle("#reveal2", "visible") // add class toggle
    .addIndicators() // add indicators (requires plugin)
    .addTo(controller);

    
// ScrollMagic Reveal On Scroll Multiple


    var revealElements = document.getElementsByClassName("digit");
		for (var i=0; i<revealElements.length; i++) { // create a scene for each element
			new ScrollMagic.Scene({
								triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
								offset: 50,												 // start a little later
								triggerHook: 0.9,
							})
							.setClassToggle(revealElements[i], "visible") // add class toggle
							.addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
							.addTo(controller);
		}
