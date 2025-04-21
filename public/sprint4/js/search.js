const searchCache = {};
window.addEventListener("load", () => {
    const searchInput = document.getElementById("search-bar");
    const resultsContainer = document.getElementById("search-results");

    searchInput.addEventListener("input", () => {
        const query = searchInput.value.trim().toLowerCase();
        if (query.length < 2) {
            return resultsContainer.innerHTML = "";
        } else if (searchCache[query]) {
            renderResults(searchCache[query]);
        } else {
            $.get('/qvh7fp/sprint4/?command=api_get_movies&query=' + query).done(function(data) {
                    searchCache[query] = data;
                    renderResults(data);
                });
        }
    });

    const renderResults = (results) => {
        resultsContainer.innerHTML = "";
        if (results.length === 0) {
            resultsContainer.innerHTML = "<div>No results found</div>";
            return;
        }
        results.forEach(movie => {
            const form = document.createElement("form");
            form.className = "search-result-item m-2";
            form.action = "?command=movie";
            form.method = "POST";
            form.innerHTML = movie.title + "<input type='hidden' name='title' value='" + movie.title + "'>";
            resultsContainer.appendChild(form);
            form.addEventListener("click", e => {
                form.submit();
            })
        });
    };
});
