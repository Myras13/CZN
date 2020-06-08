function addField () {
    var myTable = document.getElementById("ingredients");
    var counter  = document.getElementById("counter").value;

    var currentIndex = myTable.rows.length;
    var currentRow = myTable.insertRow(-1);
    
    var componentsBox = document.createElement("input");
    componentsBox.setAttribute("type", "text");
    componentsBox.setAttribute("id", "components" + currentIndex);
    componentsBox.setAttribute("class", "inputComponents");

    var addRowBox = document.createElement("input");
    addRowBox.setAttribute("type", "button");
    addRowBox.setAttribute("value", "+");
    addRowBox.setAttribute("onclick", "addField();");
    addRowBox.setAttribute("id", "button" + currentIndex );
    addRowBox.setAttribute("class", "addButton");

    var currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(componentsBox);

    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(addRowBox);

    var myButton = document.getElementById("button"+ counter );
    myButton.remove();
    document.getElementById("counter").value = parseInt(counter) + 1;

}