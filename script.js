// scroll to top button
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  window.scrollTo({top: 0, behavior: 'smooth'});
}


// language selector

function en_language() {
    document.getElementById("navbarDarkDropdownMenuLink").innerText="EN";
    
    document.getElementById("navbarDarkDropdownMenuLinkBottom").innerText="EN";
}

function id_language() {
    document.getElementById("navbarDarkDropdownMenuLink").innerText="ID";
    document.getElementById("navbarDarkDropdownMenuLinkBottom").innerText="ID";
}

function ru_language() {
    document.getElementById("navbarDarkDropdownMenuLink").innerText="RU";
    document.getElementById("navbarDarkDropdownMenuLinkBottom").innerText="RU";
}
