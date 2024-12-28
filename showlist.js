// showlist.js

// Function to fetch data from data.json and display it in an HTML element
async function loadData() {
    try {
        const response = await fetch('/src/price.php');
        const data = await response.json();

        // Assuming you have a div with id 'data-container' in your HTML
        const container = document.getElementById('showlist');
        container.innerHTML = '';

        data.forEach(item => {
            const div = document.createElement('div');
            div.innerHTML = `
                                <div class="list"> <i style="font-size:10px">${item.updatex}</i>
                        <div class="flex beet">
                                <div class="flex">
                                    <img class='imgbr' src="${item.flag}" />
                                ${item.code} 
                            </div>
                            <div>&#2547; ${item.price}</div>
                        
                    </div>
                    </div>
            `;
            container.appendChild(div);
        });
    } catch (error) {
        console.error('Error loading data:', error);
    }
}

// Call the loadData function when the window loads
window.onload = loadData;