document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('addButton').addEventListener('click', function() {
        const recipeSelect = document.getElementById('recipe');
        const quantityInput = document.getElementById('quantity');
        const tableBody = document.getElementById('tableBody');

        const recipeId = recipeSelect.value;
        const recipeName = recipeSelect.options[recipeSelect.selectedIndex].text;
        const recipeCost = parseFloat(recipeSelect.options[recipeSelect.selectedIndex].dataset.cost);
        const quantitySold = parseInt(quantityInput.value);

        if (recipeId && !isNaN(quantitySold) && quantitySold > 0) {
            let existingRow = null;
            for (const row of tableBody.rows) {
                if (row.cells[0].innerText === recipeName) {
                    existingRow = row;
                    break;
                }
            }

            if (existingRow) {
                const currentQuantity = parseInt(existingRow.cells[1].innerText);
                const newQuantity = currentQuantity + quantitySold;
                const newTotalCost = recipeCost * newQuantity;

                existingRow.cells[1].innerText = newQuantity;
                existingRow.cells[2].innerText = newTotalCost.toFixed(2);
            } else {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${recipeName}</td>
                    <td>${quantitySold}</td>
                    <td>${(recipeCost * quantitySold).toFixed(2)}</td>
                `;

                if (tableBody.querySelector('tr').cells.length === 1) {
                    tableBody.innerHTML = '';
                }

                tableBody.appendChild(newRow);
            }

            recipeSelect.value = '';
            quantityInput.value = '';
        } else {
            alert('Please select a recipe and enter a valid quantity sold.');
        }
    });

    document.getElementById('doneButton').addEventListener('click', function() {
        const tableData = [];
        const tableBody = document.getElementById('tableBody');
        for (const row of tableBody.rows) {
            const recipe = row.cells[0].innerText;
            const quantity = row.cells[1].innerText;
            const totalCost = row.cells[2].innerText;
            tableData.push({ recipe, quantity, totalCost });
        }

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("report") }}';

        const csrfToken = '{{ csrf_token() }}';
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = csrfToken;
        form.appendChild(csrfInput);

        const tableDataInput = document.createElement('input');
        tableDataInput.type = 'hidden';
        tableDataInput.name = 'tableData';
        tableDataInput.value = JSON.stringify(tableData);
        form.appendChild(tableDataInput);

        document.body.appendChild(form);
        form.submit();
    });
});