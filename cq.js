async function displayData(searchInput = "") {
 
    try {
      const response = await fetch("/src/psend.php");
      const data = await response.json();
      const dataContainer = document.getElementById("showhistory");
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
                        <div class="history" onclick="window.location.href = 'invoice/?id=${item.transition}'">
                        <div class="flex beet">
                            <div>
                                <span><b>${item.transition}</b></span><br>
                                <span>${item.methoads}</span><br>
                                <span>${item.accno}</span><br>
                                <span>${item.postdate}</span>
                            </div>
                            <div>
                                <span>BDT ${new Intl.NumberFormat('en-US').format(item.bdt)}</span><br>
                                <span>${item.currency} ${new Intl.NumberFormat('en-US').format(item.cpt)}</span><br>
                                <span style="float: right;padding: 3px;background-color: #${item.statuscolor};color: #fff;">${item.statust}</span>
                            </div> 
                        </div>
                    </div>
     
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
