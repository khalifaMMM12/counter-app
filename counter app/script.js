let countEL = document.getElementById("Counter")

let count = 0
function increment(){
  count += 1
  countEL.innerText = count
  // console.log(count); 
}
// increment()

function decrement(){
  count -= 1 
  countEL.innerText = count
}

function reset(){
  countEL.innerText = 0
  count = 0
}

var savedEL = document.getElementById("saved-el")
function save(){
  var countStr = count + " - "
  savedEL.textContent += countStr
  countEL.innerText = 0
  count = 0
}

// to save count

function save() {
  document.getElementById('saveForm').style.display = 'block';
}

function submitSaveForm() {
  var count = document.getElementById('Counter').innerText;
  var countName = document.getElementById('countName').value;

  document.getElementById('savedCount').value = count;
  document.getElementById('savedCountName').value = countName;

  document.getElementById('saveFormSubmit').click();

  displaySaveMessage("Saving count...");

  document.getElementById('saveForm').style.display = 'none';
}

// Display success or error message
function displaySaveMessage(message) {
  var saveMessage = document.getElementById('saveMessage');
  saveMessage.innerHTML = "<p>" + message + "</p>";
  setTimeout(function() {
      saveMessage.innerHTML = "";
  }, 3000);  
}

displayMessageFromQuery();

