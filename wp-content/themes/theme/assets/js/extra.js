$(document).ready(function () {
  $("#menu-trigger").click(function (e) {
    e.preventDefault();
    $("body").css("overflow", "hidden");
  });
  $(".nav-mobile_btn").click(function (e) {
    e.preventDefault();
    $("body").css("overflow", "auto");
  });
  // Define the function to call
  function headingInView(element) {
    $(element).toggleClass("reveal");
  }
  const centerElement = document.querySelector(".clip-image");
  if (centerElement) {
    $(centerElement).toggleClass("reveal");
  }
  // Create an Intersection Observer instance
  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        headingInView(entry.target);
        observer.unobserve(entry.target);
      }
    });
  });
  // Target all elements with class 'clip-text left'
  const headingElements = document.querySelectorAll(".clip-text.left");
  headingElements.forEach((element) => {
    observer.observe(element);
  });

  jQuery(document).ready(function ($) {
    var navComponent = $(".nav_component");

    // Check if body has 'home' class
    if ($("body").hasClass("home")) {
      $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
          // Scrolling down
          navComponent.addClass("scrolled");
        } else {
          // Scrolling up
          navComponent.removeClass("scrolled");
        }
      });
    }
  });
});

(function (doc) {
  var addEvent = "addEventListener",
    type = "gesturestart",
    qsa = "querySelectorAll",
    scales = [1, 1],
    meta = qsa in doc ? doc[qsa]("meta[name=viewport]") : [];
  function fix() {
    meta.content =
      "width=device-width,minimum-scale=" +
      scales[0] +
      ",maximum-scale=" +
      scales[1];
    doc.removeEventListener(type, fix, true);
  }
  if ((meta = meta[meta.length - 1]) && addEvent in doc) {
    fix();
    scales = [0.25, 1.6];
    doc[addEvent](type, fix, true);
  }
})(document);

document.addEventListener("DOMContentLoaded", function () {
  // Select all elements with the class 'nav-mobile_link'
  var navMobileLinks = document.querySelectorAll(".nav-mobile_link");

  navMobileLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      // Check if the inner text of the clicked element is "Contact"
      if (event.target.innerText.trim().toLowerCase() === "contact") {
        // Select the element with the class 'nav-mobile'
        var navMobile = document.querySelector(".nav-mobile");
        if (navMobile) {
          // Set the display style to 'none'
          navMobile.style.display = "none";
        }

        // Select the body element and set overflow to 'auto'
        document.body.style.overflow = "auto";
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var searchIcon = document.querySelector(".search-icon");
  var searchForm = document.querySelector(".search-form");

  searchIcon.addEventListener("click", function () {
    searchForm.classList.toggle("show");
  });
});
