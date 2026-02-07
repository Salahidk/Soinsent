document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector(".search-input");
    const searchResults = document.querySelector(".search-results");
    let debounceTimer;

    console.log("Live Search Init", { searchInput, searchResults });

    if (searchInput && searchResults) {
        const searchUrl = searchInput.getAttribute("data-search-url");

        searchInput.addEventListener("input", (e) => {
            clearTimeout(debounceTimer);
            const query = e.target.value.trim();
            console.log("Typing:", query);

            if (query.length < 2) {
                searchResults.classList.remove("active");
                searchResults.innerHTML = "";
                return;
            }

            debounceTimer = setTimeout(() => {
                const fetchUrl = `${searchUrl}?query=${encodeURIComponent(
                    query
                )}`;
                console.log("Fetching:", fetchUrl);

                fetch(fetchUrl)
                    .then((response) => {
                        if (!response.ok)
                            throw new Error("Network response was not ok");
                        return response.json();
                    })
                    .then((products) => {
                        console.log("Results:", products);
                        searchResults.innerHTML = "";
                        if (products.length > 0) {
                            products.forEach((product) => {
                                const item = document.createElement("a");
                                // Use a generic path or maybe add a data-url to the product JSON if possible,
                                // but standard /shop/{id} is usually safe if root is handled.
                                // Better: the controller could return the full URL.
                                // For now, let's assume /shop/id is okay or fix it if broken.
                                item.href = `/shop/${product.id}`;
                                item.classList.add("search-result-item");
                                item.innerHTML = `
                                    <img src="${
                                        product.image_path
                                            ? "/" + product.image_path
                                            : "/images/placeholder.jpg"
                                    }" alt="${product.name}">
                                    }" alt="${product.name}">
                                    <div class="search-result-info">
                                        <h6>${product.name}</h6>
                                        <span>$${product.price}</span>
                                    </div>
                                `;
                                searchResults.appendChild(item);
                            });
                            searchResults.classList.add("active");
                        } else {
                            searchResults.classList.remove("active");
                        }
                    })
                    .catch((error) =>
                        console.error("Error fetching search results:", error)
                    );
            }, 300); // Debounce duration
        });

        // Close search results when clicking outside
        document.addEventListener("click", (e) => {
            if (
                !searchInput.contains(e.target) &&
                !searchResults.contains(e.target)
            ) {
                searchResults.classList.remove("active");
            }
        });
    }
});
