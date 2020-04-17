function calc(string) {
  function isNumber(n) { 
    return !isNaN; 
  } 
  let count = 0;
  let close = false;
  for (let value of string) {
    if ((value === '(') && ((!close) || (count === 0))) {
      count += 1;
      close = false;
    }
    else if (value === ')') {
      count -= 1;
      close = true; 
    }
  }

  if (count === 0) {
    string = string.replace(/\(/g, '');
    string = string.replace(/\)/g, '');
    string = string.replace(/\s+/g, ' ').trim();
    let expression = string.split(' ').reverse();
    console.log(expression);
    let stack = [];
    let result = 0;
    let error = false;
    for (let value of expression) {
      if ( isNumber(value) ) 
        stack.unshift( Number(value) );
      else if ((value === '+') || (value === '-') || (value === '*') || (value === '/')) {
        result = stack.shift();
        if (value === '+')
          result += stack.shift();
        else if (value === '-')
          result -= stack.shift();
        else if (value === '*')
          result *= stack.shift();
        else if (value === '/')
          result /= stack.shift();
        else
          error = true;
        stack.unshift(result);
      }
      else
        error = true;
    }
    if (!error)
      console.log(result);
    else
      console.log('Проверьте правильность введённых данных');
  }
  else 
    console.log('Проверьте правильность введённых данных')
}