document.addEventListener("DOMContentLoaded", function () {
    "use strict";

  // =================================
  // Tooltip
  // =================================
    const tooltipTriggerList = Array.from(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    tooltipTriggerList.forEach((tooltipTriggerEl) => {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });

  // =================================
  // Popover
  // =================================
    var popoverTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
  // =================================
  // Hide preloader
  // =================================
    var preloader = document.querySelector(".preloader");
    if (preloader) {
        preloader.style.display = "none";
    }
  // =================================
  // Fixed header
  // =================================
    window.addEventListener("scroll", function () {
        var topbar = document.querySelector(".topbar");
        if (topbar) {
            if (window.scrollY >= 60) {
                topbar.classList.add("shadow-sm");
            } else {
                topbar.classList.remove("shadow-sm");
            }
        }
    });
});
