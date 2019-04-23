// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");

for (var i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");

for (var i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  // var inputValue1 = document.getElementById("template").value;
  // var t = document.createTextNode(inputValue1);
  
  // var inputValue2 = document.getElementById("fld_Name").value;
  // var u = document.createTextNode(inputValue2);

  var inputValue3 = document.getElementById("dt_type").value;
  var v = document.createTextNode(inputValue3);
  // var inputValue4 = document.getElementById("idt_type").value;
  // var w = document.createTextNode(inputValue4);
  // var inputValue5 = document.getElementById("output").value;
  // var x = document.createTextNode(inputValue5);
  
  // li.appendChild(t);
  // li.appendChild(u);
  li.appendChild(v);
  // li.appendChild(w);
  // li.appendChild(x);
 
  if (inputValue3 === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }

  // document.getElementById("template").value = "";
  // document.getElementById("fld_Name").value = "";
  document.getElementById("dt_type").value = "";
  // document.getElementById("idt_type").value = "";
  // document.getElementById("output").value = "";


  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}