document.addEventListener("DOMContentLoaded", function () {
    const openBtn = document.getElementById("openBtn");
    const overlay = document.getElementById("overlay");
    const closeBtn = document.getElementById("closeBtn");

    openBtn.addEventListener("click", function () {
        overlay.style.display = "flex";
    });

    closeBtn.addEventListener("click", function () {
        overlay.style.display = "none";
    });
});
