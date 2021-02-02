var trTable = document.querySelectorAll('tr');
var tdTable = document.querySelectorAll('td');
var buttonTable = document.querySelectorAll('tr button');
var arrayButtonTable = Array.from(buttonTable);
var index = 0;
var Title = document.querySelector('h1');
var Table = document.querySelector('.table');
var tdQuantity = document.querySelectorAll('.forvalue');
var ButtonPlus = document.querySelectorAll('.plus');
var arrayButtonPlus = Array.from(ButtonPlus);
var ButtonMinus = document.querySelectorAll('.minus');
var arrayButtonMinus = Array.from(ButtonMinus);

var event = function(e){
    index = arrayButtonTable.indexOf(e.target);
    for(var i = 0; i < trTable.length; i++){
        if(index == i){
            var TdHtml = trTable[i+1].innerHTML;
            Index = TdHtml.slice(4,5);
            changeProduct(Index);
            trTable[index+1].style.display = 'none';
        }
    }
};

for(var i=0;i<buttonTable.length;i++){
    buttonTable[i].addEventListener('click', event);
}

function changeProduct() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        }
    };
    var data = "index=" + Index;
    xhttp.open("POST", "ajax.php", true); 
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhttp.send(data);
}

function changeProductQuantityPlus() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            tdQuantity[index].innerHTML = this.responseText;
        }
    };
    var data = "indexTruePlus=" + TrueIndexPlus;
    xhttp.open("POST", "ajax.php", true); 
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhttp.send(data);
}

function changeProductQuantityMinus() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            tdQuantity[index].innerHTML = this.responseText;
        }
    };
    var data = "indexTrueMinus=" + TrueIndexMinus;
    xhttp.open("POST", "ajax.php", true); 
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhttp.send(data);
}

var e = function(e){
    index = arrayButtonPlus.indexOf(e.target);
    for(var i = 0; i < trTable.length; i++){
        if(index == i){
            var TdHtml = trTable[i+1].innerHTML;
            TrueIndexPlus = TdHtml.slice(4,5);
            changeProductQuantityPlus(TrueIndexPlus);
        }
    }
};

var evt = function(e){
    index = arrayButtonMinus.indexOf(e.target);
    for(var i = 0; i < trTable.length; i++){
        if(index == i){
            var TdHtml = trTable[i+1].innerHTML;
            TrueIndexMinus = TdHtml.slice(4,5);
            changeProductQuantityMinus(TrueIndexMinus);
        }
    }
};


for(var g = 0; g < ButtonPlus.length; g++){
    ButtonPlus[g].addEventListener('click', e);
}

for(var d = 0; d < ButtonMinus.length; d++){
    ButtonMinus[d].addEventListener('click', evt);
}