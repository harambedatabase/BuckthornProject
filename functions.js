//Appends letters from the input field to the text area
function addLetter(){
  var newLetter = document.getElementById("newLetter").value;
  document.getElementById("newLetter").value = "";
  document.getElementById("letterArea").value += newLetter + "\n";
};
//Appends Numbers from the input field to the text area
function addNumber(){
  var newNumber = document.getElementById("newNumber").value;
  document.getElementById("newNumber").value = "";
  document.getElementById("numberArea").value += newNumber + "\n";
};
//Appends members from the input field to the text area
function addMember(){
  var newMember = document.getElementById("memberName").value;
  document.getElementById("memberName").value = "";
  document.getElementById("memberArea").value += newMember + "\n";
};
