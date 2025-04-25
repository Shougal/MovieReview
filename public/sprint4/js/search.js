const searchCache = {};
window.addEventListener("load", () => {
    const searchBar = document.getElementById("search-bar-js");
    const searchResultsContainer = document.getElementById("search-results-container");

    searchBar.addEventListener("input", () => {
        const query = searchBar.value.trim().toLowerCase();
        if (query.length < 3) {
            searchResultsContainer.innerHTML = "";
            return;
        }
        if (searchCache[query]) {
            renderResults(searchCache[query]);
        }else {
            $.ajax({
              url: "/qvh7fp/sprint4/?command=api_get_movies&title="+query,
              dataType: 'json',
              success: (data) => {
                searchCache[query] = data;
                renderResults(data);
              },
              error: () => {
                console.log("Error");
              }
            });
          }
    });
    const renderResults = data => {
        searchResultsContainer.innerHTML = "";
        if (data.length === 0) {
            searchResultsContainer.innerHTML = "<div>No results found</div>";
            return;
        }
    
        data.forEach(movie => {
            const form = document.createElement("form");
            form.action = "?command=review";
            form.method = "post";
            form.style.cursor = "pointer";

            const hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "imdbID";
            hiddenInput.value = movie.imdbID;

            const card = document.createElement("div");
            card.className = "card p-2";
            card.style.width = "50vw";

            const title = document.createElement("div");
            title.className = "card-title";
            title.textContent = movie.Title;
    
            const body = document.createElement("div");
            body.className = "card-body p-0";
            body.textContent = movie.Year;

            card.appendChild(title);
            card.appendChild(body);
            form.appendChild(hiddenInput);
            form.appendChild(card);
            searchResultsContainer.appendChild(form);
    
            form.addEventListener("click", () => {
                form.submit();
            });
        });
    };
});