document.getElementById('toggleButton').addEventListener('click', function () {
  var content = document.getElementById('content');
  content.classList.toggle('hidden');
});

document.addEventListener("DOMContentLoaded", function () {
  var scrollButton = document.getElementById("scrollButton");

  window.onscroll = function () {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      scrollButton.style.display = "block";
    } else {
      scrollButton.style.display = "none";
    }
  };
  scrollButton.addEventListener("click", function () {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  });
});


function toggleContent(showId, hideId) {
  var showContent = document.getElementById(showId);
  var hideContent = document.getElementById(hideId);

  if (showContent && hideContent) {
    if (showContent.style.display === 'block') {

      showContent.style.display = 'none';
    } else {

      showContent.style.display = 'block';
      hideContent.style.display = 'none';
    }
  }
}

function openLinkInNewWindow(url) {
  window.open(url, '_blank');
}

function toggleNavbar() {
  var x = document.getElementById("myNavbar");
  if (x.className === "navbar") {
    x.className += " responsive";
  } else {
    x.className = "navbar";
  }
}