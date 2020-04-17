function calc(string) {
  const typenumber = 'number';
  let expression = [];
  function isNumber(n) { 
    return !isNaN(n); 
  }

  function createExpressionArray(string) {
    string = string.replace(/\(/g, ' ( ');
    string = string.replace(/\)/g, ' ) ');
    string = string.replace(/\s+/g, ' ').trim();
    expression = string.split(' ');
  }

  function main(expression) {
    let error = false;
    let newExpression = [];
    let isSymbol = null;
    let operation = null;
    let operand1 = null;
    let operand2 = null;
    let parenthesis = false;
    let count = 0;
    let i = 0;
    function isOperation(symbol) {
      if ((symbol === '*') || (symbol === '/') || (symbol === '-') || (symbol === '+')) {
        operation = symbol;
        isSymbol = 'operation';
      } else {
        error = true;
      }
    }

    function checkOperands(symbol) {
      if (symbol === '(') {
        if (parenthesis) {
          newExpression.push(symbol);
        } else {
          parenthesis = true;
        }
        if (operation != null) {
          newExpression.push(operation);
          operation = null;
        }
        if (operand1 != null) {
          newExpression.push(operand1);
          operand1 = null;
          count = 0;
        }
        isSymbol = 'open'; 
      } else if ((count === 0) && ( typeof(symbol) === typenumber)) {
        operand1 = symbol;
        count = 1;
      } else if ((count === 1) && ( typeof(symbol) === typenumber)) {
        operand2 = symbol;
        count = 0;
        isSymbol = 'close';
      } else {
        error = true;
      }
    }

    function calculateAndCopy(symbol) {
      function calculation(operation, a, b) {
        if (operation === '+') {
          newExpression.push(a + b);
        } else if (operation === '-') {
          newExpression.push(a - b);  
        } else if (operation === '*') {
          newExpression.push(a * b);  
        } else if (operation === '/') {
          newExpression.push(a / b);  
        }
      }

      if (parenthesis) {
        if (symbol != ')') {
          error = true;
        }
      }
      calculation(operation, operand1, operand2);
      parenthesis = false;
      operation = null;
      operand1 = null;
      operand2 = null;
      isSymbol = null;
      i += 1;
      for (i; i < expression.length; i++) {
        newExpression.push(expression[i]);
      }
    }

    isOperation(expression[i]);
    expression.shift();
    if (!error) {
      for (i; i < expression.length; i++) {
        if (isSymbol === 'operation') {
          checkOperands(expression[i]);
          if (isSymbol === 'close') {
            break;
          }
        } else if (isSymbol === 'open' ) {
            isOperation(expression[i]);
        } 
      }
      
      i += 1;
      if (isSymbol === 'close') {
        calculateAndCopy(expression[i]);
      } else {
        error = true;
      }

      if ((!error) && (newExpression.length > 1)) {
        result = main(newExpression);
      } else if (!error) {
          return newExpression[0];
      } else {
        return null;
      } 
      return result;
    }
  }

  if ( string.split('(').length != string.split(')').length ) {
    console.log('Число открывающих скобок не совпадает с числом закрывающих!');
  } else {
    createExpressionArray(string);
    for(i = 0; i < expression.length; i++) {
      if ( isNumber(expression[i]) ) {
        expression[i] = Number(expression[i]);
      }
    }
    
    let result = main(expression); 
    if (result != null) {
      console.log('Результат: ');
      console.log(result);
    } else {
      console.log('Проверьте правильность введённых данных');
    }
  }
}