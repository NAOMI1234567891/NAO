document.getElementById("menu-btn").addEventListener("click", function() {
    var menu = document.getElementById("menu");
    var computedStyle = window.getComputedStyle(menu); // Obtient le style calculé de l'élément
    if (computedStyle.display === "block") {
        menu.style.display = "none";
    } else {
        menu.style.display = "block";
    }
});