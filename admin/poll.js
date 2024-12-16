async function displayData(searchInput = "") {
    try {
        const response = await fetch("/src/price.php");
        const data = await response.json();
        const dataContainer = document.getElementById("app");
        if (!dataContainer) {
            throw new Error("Element with id 'app' not found.");
        }
        dataContainer.innerHTML = "";
        const filteredData = data.filter((item) =>
            (item.id || "").toLowerCase().includes(searchInput.toLowerCase()) 
        );
        filteredData.forEach((item) => {
            const itemElement = document.createElement("tr");
            itemElement.innerHTML = `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.code}</td>
                                <td>${item.price}</td>
                                <td>${item.updatex}</td>
                                <td><a target='_blank' href="https://${item.code}.fxexchangerate.com/bdt/">Link</a></td>
                            </tr>
            `;
            dataContainer.appendChild(itemElement);
        });
    } catch (error) {
        console.error("Data error:", error);
    }
}

displayData();