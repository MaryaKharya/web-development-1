function isPrimeNumber(variable) {
  function CheckNumber(num) {
    (num > 1)
    ? prime = true
    : prime = false;
    for (i = 2; (i < num) && (prime); i++) {
      if (num % i === 0) {
        prime = false;
        break;
      }
    }
    if (prime)
      return `Result: ${num} is prime number`;
    else
      return `Result: ${num} is not prime number`;
  }
  
  if (typeof(variable) == 'number')
    console.log( CheckNumber(variable) );  
  else if (typeof(variable) == 'object')
    if (variable.length > 0)
      for (let number of variable) {
        if (typeof(number) == 'number')
          console.log( CheckNumber(number) );
        else
          console.log(`"${number}" is not number`); 
      }
    else
      console.log('Input data is invalid or empty');
  else
    console.log('Input data is invalid or empty');
}