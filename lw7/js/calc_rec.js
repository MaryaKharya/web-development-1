function calc(string) {
  function isNumber(n) { return /^-?[\d.]+(?:e-?\d+)?$/.test(n); } 
  string = string.replace(/\(/g, ' ( ');
  string = string.replace(/\)/g, ' ) ');
  string = string.replace(/\s+/g, ' ').trim();
  let expression = string.split(' ');
  console.log(`${expression} this expression`);
  function compute(i) {
    let result = 0;
    let operation;
    let begin = 1;
    for (i; i < expression.length; i++) {
      value = expression[i];
      if ((value === '+') || (value === '-') || (value === '*') || (value === '/'))
        operation = value; 
      else if (value === '(') {
        value = compute(i+1);
        while (expression[i] != ')') {
          i += 1;
        }
      }
      if (value === ')')
        break;
      if (isNumber(value)) {
        value = Number(value);
        if (operation === '+') 
          result += value
        else if (operation === '-') {
          if ((result === 0) && (begin === 1))
            result = value;
          else 
            result -= value;
        }
        else if (operation === '*') {
          if ((result === 0) && (begin === 1))
            result = value;
          else 
            result *= value;
        }
        else if (operation === '/') {
          if ((result === 0) && (begin === 1))
            result = value;
          else 
            result /= value;
        }
        else
          return "Ошибка в выражении";
        begin = 0;        
      }       
    }
    return result;
  }
  console.log( compute(0) );  
}
  /*function compute() {
    let operation = expression[0];
    expression.shift(); 
    let result = Number(expression[0]);
    expression.shift();
    for (let value of expression) {
      if (operation === "+")
        result += Number(value);
      else if (operation === "-")
        result -= Number(value);
      else if (operation === "*")
        result *= Number(value);
      else if (operation === "/")
        result /= Number(value);
      else {
        return "Not found operation";
      }
    }
    return result;
  }
  console.log( compute() );
*/
  //Number.isFinite()
