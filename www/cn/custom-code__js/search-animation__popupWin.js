

/** ==================================================================================================== **/
/** ______________________________        (custom) Search [pop-up]        ______________________________ **/
/** ==================================================================================================== **/

//  (Show) Result
function ShowResult(){

	//  (Hide) Navbar
	jQuery('.kingster-mobile-header').css({'z-index': '1'});

	//  (Show) Popup Window [result]
	document.querySelector('#Result_Background')
		.classList.remove('custom-overlay--hidden'); // remove hidden
	document.querySelector('#Result_Background')
		.classList.add('custom-overlay'); // add Background

	document.querySelector('#Result_Frame')
		.classList.remove('custom-popup__Frame--hidden'); // remove hidden
	document.querySelector('#Result_Frame')
		.classList.add('custom-popup__Frame'); // add Background

	//jQuery('#Result_Popup').css({'height': jQuery('#resultTable').height()});

	//  (Perform) animation [for Background]
	document.querySelector('#Result_Background')
		.classList.remove('animated', 'fadeOut');
	document.querySelector('#Result_Background')
		.classList.add('animated', 'fadeIn');

	//  (Perform) animation [for Frame]
	document.querySelector('#Result_Frame')
		.classList.remove('animated', 'zoomOut');
	document.querySelector('#Result_Frame')
		.classList.add('animated', 'fadeInDown', 'slideInDown');

	jQuery('html, body').css({
	    overflow: 'hidden',
	    height: '100%',
	});

	jQuery('#Result_Frame').css({'pointer-events': 'visible'});
}


//  (Close) Result
const toggleClose = () => {
	
	jQuery('#Result_Frame').css({'pointer-events': 'none'});

	//  (Perform) animation [for background-closing]
	document.querySelector('#Result_Background')
		.classList.remove('animated', 'fadeIn');
	document.querySelector('#Result_Background')
		.classList.add('animated', 'fadeOut');

	//  (Perform) animation [for frame-closing]
	document.querySelector('#Result_Frame')
		.classList.remove('animated', 'fadeInDown', 'slideInDown');
	document.querySelector('#Result_Frame')
		.classList.add('animated', 'zoomOut');

	//  (Remove) animation
	document.querySelector('#Result_Background')
		.addEventListener("webkitAnimationEnd", CloseResult);
	document.querySelector('#Result_Background')
		.addEventListener("animationEnd", CloseResult);

	jQuery('html, body').css({
	    overflow: '',
	    height: ''
	});

	//  (Clear-value) Course Name [txt field]
	// $('#courseName').val('');
}

//  (Add) Click [listener]
document.querySelector('#Result_Background')
  .addEventListener('click', toggleClose);

	const CloseResult = () => {
		//  (Remove) Background
		document.querySelector('#Result_Background')
    		.classList.remove('custom-overlay');
		document.querySelector('#Result_Background')
    		.classList.add('custom-overlay--hidden');

    	//  (Remove) after-animation [listener]
    	document.querySelector('#Result_Background')
    		.removeEventListener("webkitAnimationEnd", CloseResult);
    	document.querySelector('#Result_Background')
    		.removeEventListener("animationEnd", CloseResult);
	}
