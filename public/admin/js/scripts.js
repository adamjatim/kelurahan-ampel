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
  const secChildSidebarWrapper = document.querySelector("#sidebar-wrapper>div:nth-child(2)");
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      // sidebarWrapper.classList.toggle("");
      sidebarWrapper.classList.toggle("!w-[0px]");
      sidebarWrapper.classList.toggle("!min-w-[0px]");
      secChildSidebarWrapper.classList.toggle("hidden");
    });
  }
});

// dashboard function untuk menampilkan gambar
function tampilGambar() {
  let gambar = document.getElementById('gambar');
  let tampilGambar = document.querySelector('.tampil-gambar');

  tampilGambar.classList = '!block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent) {
    tampilGambar.src = oFREvent.target.result;
  }
}

// CKEditor call the ClassicEditor.create() method :
ClassicEditor
.create( document.querySelector('#editor'))
.catch( error => {
  console.error(error);
});

// dashboard navbar 
// $(document).ready(function() {
//   $('#dropdownNavbarLink').click(function() {
//     $('#dropdownNavbar').toggleClass('hidden');
//   });
// });