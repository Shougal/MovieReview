window.addEventListener("load", () => {
    if (localStorage.getItem("mode")){
        localStorage.getItem("mode") === "dark-mode" ? createDarkMode() : createLightMode();
    }
    else { createDarkMode(); }
});

window.addEventListener("beforeunload", () => {
    if (document.getElementById("dark-mode") === null) { localStorage.setItem("mode", "light-mode"); }
    else {localStorage.setItem("mode", "dark-mode");}
});

let just_changed = false;
function createDarkMode() {
    document.getElementById("mode-toggle-container").innerHTML = "<h4 id='dark-mode'>🌙</h4>";
    document.getElementById('theme').innerText =
        "body { " +
        "   background-color: black;" +
        "   color: white;" +
        "   .fav-movie-card {" +
        "       background-color: #161616;" +
        "   };" +
        "   h1 {" +
        "       color: white;" +
        "   }" +
        "   .deco-star-rating {" +
        "       background: none;" +
        "   };"+
        "   #account-card {" +
        "       background-color: #161616;" +
        "   };"+
        "}"
    ;

    document.getElementById('dark-mode').addEventListener('mouseenter', () => {
        if (!just_changed) {
            document.getElementById('dark-mode').innerText = "🔆"
        }
    });

    document.getElementById('dark-mode').addEventListener("mouseleave", () => {
        document.getElementById('dark-mode').innerText = "🌙";
        just_changed = false;
    });

    document.getElementById('dark-mode').addEventListener("click", () => {
        document.getElementById('dark-mode').remove();
        createLightMode();
        just_changed = true;
    });
}

function createLightMode() {
    document.getElementById("mode-toggle-container").innerHTML = "<h4 id='light-mode'>🔆</h4>";
    document.getElementById('theme').innerText =
        "body { " +
        "   background-color: white;" +
        "   color: black;" +
        "   .fav-movie-card {" +
        "       background-color: lightgrey;" +
        "       .text-light {" +
        "           color: black !important;" +
        "       };" +
        "   };" +
        "   h1 {" +
        "       color: black;" +
        "   }" +
        "   h2 {" +
        "       color: black;" +
        "   }" +
        "   h6 {" +
        "       color: black;" +
        "   }" +
        "   p {" +
        "       color: black;" +
        "   }" +
        "   .col-lg-8 > p {" +
        "       color: white;" +
        "   }" +
        "   label {" +
        "       color: black;" +
        "   }" +
        "   .deco-star-rating {" +
        "       background-color: #161616;" +
        "   };"+
        "   form {" +
        "       color: black;" +
        "   };" +
        "}"
    ;

    document.getElementById('light-mode').addEventListener('mouseenter', () => {
        if (!just_changed) {
            document.getElementById('light-mode').innerText = "🌙";
        }
    });

    document.getElementById('light-mode').addEventListener("mouseleave", () => {
        document.getElementById('light-mode').innerText = "🔆";
        just_changed = false;
    });

    document.getElementById('light-mode').addEventListener("click", () => {
        document.getElementById('light-mode').remove();
        createDarkMode();
        just_changed = true;
    });
}