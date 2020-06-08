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

function addField_v2 () {
    var myTable = document.getElementById("add_ingredients");
    var counter  = document.getElementById("counter").value;

    var currentIndex = myTable.rows.length;
    var currentRow = myTable.insertRow(-1);
    
    var componentsBox = document.createElement("input");
    componentsBox.setAttribute("type", "text");
    componentsBox.setAttribute("name", "component-" + currentIndex);
    componentsBox.setAttribute("id", "component");
    componentsBox.setAttribute("class", "inputComponents");

    var quantityComponentsBox = document.createElement("input");
    quantityComponentsBox.setAttribute("type", "text");
    quantityComponentsBox.setAttribute("name", "quantity-" + currentIndex);
    quantityComponentsBox.setAttribute("id", "quantity");
    quantityComponentsBox.setAttribute("class", "inputQuantity");

    var measureTypeBox = document.createElement("input");
    measureTypeBox.setAttribute("type", "text");
    measureTypeBox.setAttribute("name", "measure-" + currentIndex);
    measureTypeBox.setAttribute("id", "measure");
    measureTypeBox.setAttribute("class", "inputMeasure");

    var addRowBox = document.createElement("input");
    addRowBox.setAttribute("type", "button");
    addRowBox.setAttribute("value", "+");
    addRowBox.setAttribute("onclick", "addField_v2();");
    addRowBox.setAttribute("id", "button" + currentIndex );
    addRowBox.setAttribute("class", "addButton");

    var currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(componentsBox);

    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(quantityComponentsBox);

    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(measureTypeBox);

    currentCell = currentRow.insertCell(-1);
    currentCell.appendChild(addRowBox);
    
    var myButton = document.getElementById("button" + counter );
    myButton.remove();
    document.getElementById("counter").value = parseInt(counter) + 1;
}