async function displayData(searchInput = "") {
 
    try {
      const response = await fetch("/src/psend.php");
      const data = await response.json();
      const dataContainer = document.getElementById("app");
      if (!dataContainer) {
        throw new Error("Element with id 'app' not found.");
      }
  
      dataContainer.innerHTML = "";
  
  
      const filteredData = data.filter(
        (item) =>
          item.transition.toLowerCase().includes(searchInput.toLowerCase()) ||
          item.id.toLowerCase().includes(searchInput.toLowerCase()) 
      );
  
   
    
      filteredData.forEach((item) => {
        
        const itemElement = document.createElement("tr");
        itemElement.innerHTML = `
    <tr>
                            <td>${item.transition}</td>
                            <td><button
                                    style="border: none;background-color: #${item.statuscolor};color: #fff; border-radius: 4px;">${item.statust}</button>
                            </td>
                            <td>${item.methoads} <br> ${item.accno}</td>
                            <td>${new Intl.NumberFormat('en-US').format(item.cpt)} ${item.currency}</td>
                            <td>${new Intl.NumberFormat('en-US').format(item.bdt)} BDT</td>
                            <td>${item.postdate}</td>
                            <td>${item.price}</td>
                            <td><img style="height: 40px;width: 40px;border-radius: 100px;border: 1px solid #4680ff;"
                                    src="/img/${item.adminimg}"></td>
                        </tr>
     
              `;
  
        dataContainer.appendChild(itemElement);
      });
    } catch (error) {
      console.error("data error", error);
    }
  }
  

  function searchData() {
    const searchInput1 = document.querySelector("#search").value;
    displayData(searchInput1);
    window.location.href ="#" + searchInput1 ;
  }
 
  displayData();
