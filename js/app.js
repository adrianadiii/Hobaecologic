// NAVIGATION select button

const room  = document.querySelector('.navbar-links');
const btns = document.querySelectorAll('.btn'); 

room.addEventListener('click', e => {

 btns.forEach(btn => {

    if(btn.getAttribute('id') === e.target.getAttribute('id'))
      btn.classList.add('active');
    else
      btn.classList.remove('active');
    });
});




// SCROLL TO TOP BUTTON

// //Get the button
// var mybutton = document.getElementById("myBtn");

// // When the user scrolls down 20px from the top of the document, show the button
// window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//   if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
//     mybutton.style.display = "block";
//   } else {
//     mybutton.style.display = "none";
//   }
// }

// // When the user clicks on the button, scroll to the top of the document
// function topFunction() {
//   document.body.scrollTop = 0;
//   document.documentElement.scrollTop = 0;
// }


$(document).ready(function(){ 
  $(window).scroll(function(){ 
      if ($(this).scrollTop() > 100) { 
          $('#scroll').fadeIn(); 
      } else { 
          $('#scroll').fadeOut(); 
      } 
  }); 
  $('#scroll').click(function(){ 
      $("html, body").animate({ scrollTop: 0 }, 900); 
      return false; 
  }); 
});





// function for popup in the same page

// Get the button that opens the modal
var btn = document.querySelectorAll("button.modal-button");

// All page modals
var modals = document.querySelectorAll('.modal');

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("close");

// When the user clicks the button, open the modal
for (var i = 0; i < btn.length; i++) {
 btn[i].onclick = function(e) {
    e.preventDefault();
    modal = document.querySelector(e.target.getAttribute("href"));
    modal.style.display = "block";
 }
}

// When the user clicks on <span> (x), close the modal
for (var i = 0; i < spans.length; i++) {
 spans[i].onclick = function() {
    for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
    }
 }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
     for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
     }
    }
}





// MANUAL SLIDER

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides1");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1;} 
  if (n < 1) {slideIndex = slides.length;}
  for (i = 0; i < slides.length; i++) {
  slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
  dots[i].className = dots[i].className.replace("active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
}

// var slideIndex = [1,1,1,1,1];
// var slideId = ["mySlides1", "mySlides2", "mySlides3", "mySlides4", "mySlides5"];
// showSlides(1, 0);
// showSlides(1, 1);
// showSlides(1, 2);
// showSlides(1, 3);
// showSlides(1, 4);

// function plusSlides(n, no) {
//   showSlides(slideIndex += n, no);
// }
// function currentSlide(n, no) {
//   showSlides(slideIndex[no] = n, no);
// }
// function showSlides(n, no) {
//   var i;
//   var x = document.getElementsByClassName(slideId[no]);
//   if (n > x.length) {slideIndex[no] = 1}    
//   if (n < 1) {slideIndex[no] = x.length}
//   for (i = 0; i < x.length; i++) {
//      x[i].style.display = "none";  
//   }
//   x[slideIndex[no]-1].style.display = "block";
//   dots[slideIndex-1].classname += "active";  
// }


