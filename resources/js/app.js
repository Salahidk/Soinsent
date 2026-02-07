import "./bootstrap";
import "./live-search";

window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    if (window.scrollY > 50) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
});

// AJAX Add to Cart
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".add-to-cart-form").forEach((form) => {
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const btn = form.querySelector(".add-to-cart-btn");
            const productId = form.dataset.productId;
            const originalText = btn.innerHTML;

            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding...';

            try {
                const response = await fetch(form.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector(
                            'input[name="_token"]'
                        ).value,
                        Accept: "application/json",
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({}), // No extra body needed for simple add
                });

                const data = await response.json();

                if (data.success) {
                    form.style.display = "none";
                    document.getElementById(
                        `cart-actions-${productId}`
                    ).style.display = "flex";
                    // Update cart count if exists
                    const cartCountElement =
                        document.querySelector(".fa-shopping-cart");
                    // Could add a badge here if implemented
                } else {
                    alert("Something went wrong. Please try again.");
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                }
            } catch (error) {
                console.error("Error:", error);
                alert("Error adding to cart.");
                btn.disabled = false;
                btn.innerHTML = originalText;
            }
        });
    });
});

// Live Search
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("live-search-input");
    const resultsContainer = document.getElementById("live-search-results");

    if (searchInput && resultsContainer) {
        let timeout = null;

        searchInput.addEventListener("input", function () {
            clearTimeout(timeout);
            const query = this.value;
            console.log("Input detected:", query); // Debug log

            if (query.length < 2) {
                resultsContainer.style.display = "none";
                resultsContainer.innerHTML = "";
                return;
            }

            timeout = setTimeout(async () => {
                console.log("Fetching results for:", query); // Debug log
                try {
                    // Use the existing shop.search route
                    const response = await fetch(
                        `/shop/search?query=${encodeURIComponent(query)}`
                    );

                    if (!response.ok) {
                        throw new Error(
                            `HTTP error! status: ${response.status}`
                        );
                    }

                    const products = await response.json();
                    console.log("Results received:", products); // Debug log

                    resultsContainer.innerHTML = "";

                    if (products.length > 0) {
                        products.forEach((product) => {
                            const item = document.createElement("a");
                            item.href = `/shop/${product.id}`; // Assuming route is shop/{id} or check route list
                            item.classList.add("live-search-item");

                            // Handle image path (check if needs 'storage/' or if asset() handled in backend? Controller returns raw path)
                            // Assuming image_path is relative to public or storage link
                            // We'll simplisticly assume it works like asset() in blade if we prefix /
                            // But usually image_path in DB might be 'images/foo.jpg'

                            item.innerHTML = `
                                <img src="/${product.image_path}" alt="${product.name}" onerror="this.src='/favicon.png'"> <!-- Fallback -->
                                <div class="live-search-info">
                                    <h4>${product.name}</h4>
                                    <span>$${product.price}</span>
                                </div>
                            `;
                            resultsContainer.appendChild(item);
                        });
                        resultsContainer.style.display = "block";
                    } else {
                        resultsContainer.innerHTML =
                            '<div class="live-search-no-results">No products found</div>';
                        resultsContainer.style.display = "block";
                    }
                } catch (error) {
                    console.error("Search error:", error);
                }
            }, 300); // 300ms debounce
        });

        // Close on click outside
        document.addEventListener("click", function (e) {
            if (
                !searchInput.contains(e.target) &&
                !resultsContainer.contains(e.target)
            ) {
                resultsContainer.style.display = "none";
            }
        });
    }
});
