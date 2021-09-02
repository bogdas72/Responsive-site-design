function showCustomer() {
    let form = document.getElementById("selcountry");
    let str = form.value;
    if (str == "") {
      document.getElementById("responseTable").innerHTML = "";
      return;
    }
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          displayTable(this.responseText);
      }
    }
    xhttp.open("GET", "https://localhost/responsivesitebootstrap/getcustomer.php?q=" + str);
    xhttp.send();
}
  
function displayTable(result) {
    let myArr = JSON.parse(result);
    let i=0;
    let table = `<table class="table table-sm table-striped table-bordered table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th>Customer ID</th>
                    <th>Company Name</th>
                    <th>Contact Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                </tr>
                </thead>`;
    for (i = 0; i < myArr.length; i++) {
        table += "<tr>" + 
        "<td>" + myArr[i][0] + "</td>" +
        "<td>" + myArr[i][1] + "</td>" +
        "<td id ='mod"+[i]+"' ondblclick='modCell(this)'>" + myArr[i][2] + "</td>" +
        "<td>" + myArr[i][3] + "</td>" +
        "<td>" + myArr[i][4] + "</td>" +
        "<td>" + myArr[i][5] + "</td>" + 
        "</tr>";
    }
    table +="</table>";
    document.getElementById("responseTable").innerHTML = table;    
}

function modCell(cell) {
    let cellVal = cell.innerHTML;
    let inp = document.createElement("INPUT");
    inp.setAttribute("type", "text");
    inp.setAttribute("id", "input");
    inp.setAttribute("onkeypress", "updateCell(event)");
    cell.innerHTML = "";
    inp.value = cellVal;
    cell.appendChild(inp);
}

function updateCell(event) {
    //alert(cellVal);
    if (event.which == 13 || event.keyCode == 13) {
    inpVal = document.getElementById("input").value;
    td = document.getElementById("input").parentElement;
    tr = td.parentElement;
    rowId = tr.getElementsByTagName("td")[0].innerHTML;

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

      let innerText="Authentication error";

      if (this.readyState == 4 && this.status == 200) {
        let myArr = JSON.parse(this.responseText);
        innerText = myArr[2];
        if (myArr[6]=="No")
        {
          alert ("You must log in!");
        }
      }
      tr.getElementsByTagName("td")[2].innerHTML = innerText;
    }

    xhttp.open("GET", "https://localhost/responsivesitebootstrap/setcustomer.php?q="+ rowId + "&val=" + inpVal);
    //xhttp.open("GET", "https://localhost/responsivesitebootstrap/setcustomer.php?q=cactu&val=Johhny");
    
    xhttp.send();

    /*console.log(rowId);
    console.log(inpVal);*/
    return false;
    }
    return true;
}
