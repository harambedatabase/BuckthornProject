function addMember(){
  var newMember = document.getElementById("newMember").value;
  if(!newMember == ""){
    document.getElementById("memberArea").value += newMember + "\n";
    document.getElementById("newMember").value = "";
  }
};

function addLetter(){
  var newLetter = document.getElementById("newLetter").value;
  document.getElementById("letterArea").value += newLetter + "\n";
};

function addNumber(){
  var newNumber = document.getElementById("newNumber").value;
  document.getElementById("numberArea").value += newNumber + "\n";
};
