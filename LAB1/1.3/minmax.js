let numbers = [];

function getUserInput() {
  // Prompt the user to enter a comma-separated list of numbers
  const userInput = prompt("Enter a comma-separated list of numbers:");

  // Split the user input into an array of strings and convert them to numbers
  numbers = userInput.split(',').map(Number);
  // Check if the input is valid
  if (numbers.some(isNaN)) {
    alert("Invalid input. Please enter valid numbers separated by commas.");
    numbers = []; // Reset the array if input is invalid
  } else {
    displayNumbers(numbers,'numbers');
  }
}

function displayNumbers(numbers,id) {
  const numbersDiv = document.getElementById(id);
  numbersDiv.textContent = numbers.join(', ');
}

function showMax() {
  let max = numbers[0];
  for (let i = 1; i < numbers.length; i++) {
    if (numbers[i] > max) {
      max = numbers[i];
    }
  }
  displayNumbers([max], 'result');
}

function showMin() {
    let min = numbers[0];
    for (let i = 1; i < numbers.length; i++) {
      if (numbers[i] < min) {
        min = numbers[i];
      }
    }
    
    displayNumbers([min], 'result');
  }

  //QUICKSORT
function quickSort(arr, low, high) {
    if (low < high) {
      const pivotIndex = partition(arr, low, high);
      quickSort(arr, low, pivotIndex - 1);
      quickSort(arr, pivotIndex + 1, high);
    }
  }
  
function partition(arr, low, high) {
    const pivot = arr[high];
    let i = low - 1;
  
    for (let j = low; j < high; j++) {
      if (arr[j] < pivot) {
        i++;
        const temp = arr[i];
        arr[i] = arr[j];
        arr[j] = temp;
      }
    }
  
    const temp = arr[i + 1];
    arr[i + 1] = arr[high];
    arr[high] = temp;
  
    return i + 1;
  }

function sortMinToMax() {
    let minNumbers = numbers
    quickSort(minNumbers, 0, numbers.length - 1);
    displayNumbers(minNumbers, 'result');
  }
  
function sortMaxToMin() {
    let maxNumbers = numbers
    quickSort(maxNumbers, 0, numbers.length - 1);
    maxNumbers = maxNumbers.map((_, index, arr) => arr[arr.length - 1 - index]);;
    displayNumbers(maxNumbers, 'result');
  }

  



