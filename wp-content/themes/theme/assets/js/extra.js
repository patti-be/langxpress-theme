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
    console.log("Heading is in view!");
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
  var searchIcon = document.querySelector(".search-icon");
  var searchForm = document.querySelector(".search-form");

  searchIcon.addEventListener("click", function () {
    searchForm.classList.toggle("show");
  });
});
