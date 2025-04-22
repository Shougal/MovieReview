window.addEventListener("load", function() {
    document.querySelectorAll(".where-to-watch").forEach(function(button) {
        button.addEventListener("click", function() {
            const title = button.id.toLowerCase();
            const searchURL = "https://www.justwatch.com/us/search?q=" + encodeURIComponent(title);
            window.open(searchURL, "_blank");
        });
    });
});