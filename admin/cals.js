async function displayData(searchInput = "") {
    try {
        const response = await fetch("/src/psend.php");
        const data = await response.json();
        const dataContainer = document.getElementById("app");
        if (!dataContainer) {
            throw new Error("Element with id 'app' not found.");
        }
        dataContainer.innerHTML = "";

        let totalfees = 0;
        let totalbdt = 0;
        let totaldeu = 0;
        let totalhaf = 0;

        const filteredData = data.filter((item) =>
            (item.adminpin || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.transition || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.methoads || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.postdate || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.sendaccno || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.statust || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.currency || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.id || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.accno || "").toLowerCase().includes(searchInput.toLowerCase()) ||
            (item.typex || "").toLowerCase().includes(searchInput.toLowerCase())
        );

        // Loop through the filtered data and create table rows
        filteredData.forEach((item) => {
            // Make sure each value is a valid number, defaulting to 0 if invalid
            const fee = parseFloat(item.fee) || 0;
            const bdt = parseFloat(item.bdt) || 0;
            const duebdt = parseFloat(item.duebdt) || 0;

            totalfees += fee;
            totalbdt += bdt;
            totaldeu += duebdt;
            totalhaf += fee * 0.5;

            const itemElement = document.createElement("tr");
            itemElement.innerHTML = `
                <td>${item.id}</td>
                <td>${item.transition}</td>
                <td>${item.postdate}</td>
                <td>${new Intl.NumberFormat('en-US').format(bdt)} BDT</td>
                <td>${new Intl.NumberFormat('en-US').format(fee)} BDT</td>
                <td>${new Intl.NumberFormat('en-US').format(duebdt)}</td>
                <td>${new Intl.NumberFormat('en-US').format(fee * 0.5)} BDT</td>  
            `;
            dataContainer.appendChild(itemElement);
        });

        // Add the total row to the table (footer)
        const totalRow = document.createElement("tr");
        totalRow.innerHTML = `
            <td colspan="3"><strong>Totals</strong></td>
            <td><strong>${new Intl.NumberFormat('en-US').format(totalbdt)} BDT</strong></td>
            <td><strong>${new Intl.NumberFormat('en-US').format(totalfees)} BDT</strong></td>
            <td><strong>${new Intl.NumberFormat('en-US').format(totaldeu)} BDT</strong></td>
            <td><strong>${new Intl.NumberFormat('en-US').format(totalhaf)} BDT</strong></td>
        `;
        const totalcomi = new Intl.NumberFormat('en-US').format(totalfees+totaldeu);
        const parsent50 = totalcomi/2;

        document.getElementById('logger').innerHTML = `
<div style="display: flex;" class="tabtag">
                    <div class="tabtag">Total Receved BDT : </div> <div style="text-align: center;" class="tabtag">${new Intl.NumberFormat('en-US').format(totalbdt)}</div>
                </div> 
               
                <div style="display: flex;" class="tabtag">
                    <div class="tabtag">Total commission : </div> <div class="tabtag">${totalcomi}</div>
                </div> 

                <div style="display: flex;" class="tabtag">
                    <div class="tabtag">50% you received commission : </div> <div class="tabtag">${parsent50}</div>
                </div> 

`;
        // Append the total row to the table
        dataContainer.appendChild(totalRow);

    } catch (error) {
        console.error("Data error:", error);
    }
}



function searchData() {
    const serachdata1 = document.getElementById('search').value;
    const serachdata2 = document.getElementById('search1').value;
    displayData(serachdata1 + serachdata2);
}
displayData();
function adminser() {
    const jsonFileUrl = '/src/admin.php';
    fetch(jsonFileUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(jsonData => {
            const selectElement = document.getElementById('search');
            jsonData.forEach(user => {
                const option = document.createElement('option');
                option.value = user.pin;
                option.textContent = user.name;
                selectElement.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error loading JSON:', error);
        });
} adminser();


