/*!
 * Start Bootstrap - Simple Sidebar v6.0.6 (https://startbootstrap.com/template/simple-sidebar)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */
//
// Scripts
//

// dashboard sidebarToggle
window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  const sidebarWrapper = document.getElementById("sidebar-wrapper");
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      sidebarWrapper.classList.toggle("!left-0");
      // sidebarWrapper.classList.toggle("!ms-0");
    });
  }
});

// dashboard navbar 
// $(document).ready(function() {
//   $('#dropdownNavbarLink').click(function() {
//     $('#dropdownNavbar').toggleClass('hidden');
//   });
// });