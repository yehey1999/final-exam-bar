const jeepCodesArr = {
  "01A": true,
  "02B": true,
  "03C": true,
  "04A": true,
  "06B": true,
  "06D": true,
  "10C": true,
  "10H": true,
  "11A": true,
  "11B": true,
  "20A": true,
  "20C": true,
  "42C": true,
  "42D": true,
};

const form  = document.getElementById('form');
const input = document.getElementById('codes');
const error = document.getElementById('error');

form.addEventListener('submit', (event) => {
  console.log(input.value);
  const arr = input.value.split(",");
  for(let i = 0; i < arr.length; i++){
    if (jeepCodesArr[arr[i]] == undefined){
      error.innerHTML = "Incorrect format: code example: 01B or 01B,02B,03B, or code non existing";
      event.preventDefault();
      console.log("Incorrect Input");
      // return;
    }
  }
});