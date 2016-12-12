function addLetter(){
  var newLetter = document.getElementById("newLetter").value;
  document.getElementById("newLetter").value = "";
  document.getElementById("letterArea").value += newLetter + "\n";
};

function addNumber(){
  var newNumber = document.getElementById("newNumber").value;
  document.getElementById("newNumber").value = "";
  document.getElementById("numberArea").value += newNumber + "\n";
};

function addMember(){
  var newMember = document.getElementById("memberName").value;
  document.getElementById("memberName").value = "";
  document.getElementById("memberArea").value += newMember + "\n";
};
