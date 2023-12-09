function performSearch() {
    var searchTerm = document.getElementById("searchInput").value.toLowerCase();

    // Iterate through each card and show/hide based on the search term
    var cardContainer = document.getElementById("card-container");
    var cards = cardContainer.getElementsByClassName("card");

    for (var i = 0; i < cards.length; i++) {
        var card = cards[i];
        var cardTitle = card.querySelector(".card-title").innerText.toLowerCase();

        if (cardTitle.includes(searchTerm)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    }
}

document.addEventListener("DOMContentLoaded", function () {
    // Fetch data from the PHP API
    var api_url = "http://asjfhldferuh98r43y2uiddhyuisht8rqhfuiwedhf.000.pe/api.php";

    fetch(api_url)
        .then(response => response.json())
        .then(data => {
            var cardContainer = document.getElementById("card-container");

            // Use forEach loop to ensure the correct order
            data.forEach(function (item) {
                var name = item.name;
                var age = item.age;

                var cardDiv = document.createElement("div");
                cardDiv.className = "col-md-4 mb-4";

                var card = document.createElement("div");
                card.className = "card";

                var cardBody = document.createElement("div");
                cardBody.className = "card-body";

                var cardTitle = document.createElement("h5");
                cardTitle.className = "card-title";
                cardTitle.innerText = name;

                var cardText = document.createElement("p");
                cardText.className = "card-text";
                cardText.innerText = "Age: " + age;

                cardBody.appendChild(cardTitle);
                cardBody.appendChild(cardText);
                card.appendChild(cardBody);
                cardDiv.appendChild(card);

                cardContainer.appendChild(cardDiv);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
