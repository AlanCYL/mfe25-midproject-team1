/* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()


let toggle = document.querySelector('#toggle');
let sidebar = document.querySelector('#sidebar');
toggle.addEventListener("click", function () {
    toggle.classList.toggle(`active`);
    sidebar.classList.toggle(`active`);
})
