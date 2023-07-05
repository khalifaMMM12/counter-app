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
