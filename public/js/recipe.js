// Fetch available recipes from the database
fetch('/api/recipes')
    .then(response => response.json())
    .then(recipes => {
        const recipeSelect = document.getElementById('recipe');
        recipes.forEach(recipe => {
            const option = document.createElement('option');
            option.value = recipe.id;
            option.text = recipe.name;
            recipeSelect.appendChild(option);
        });
    });

// Handle "Calculate Profitability" button click
const calculateButton = document.getElementById('calculateButton');
calculateButton.addEventListener('click', () => {
    const selectedRecipeId = document.getElementById('recipe').value;
    const quantitySold = parseInt(document.getElementById('quantity').value);

    // Calculate profitability using selected recipe ID and quantity sold
    fetch('/api/profitability', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            recipeId: selectedRecipeId,
            quantitySold: quantitySold
        })
    })
    .then(response => response.json())
    .then(profitabilityData => {
        // Display profitability report in a new page or modal
        displayProfitabilityReport(profitabilityData);
    });
});


