const typenumber = 'number';
let expression = [];

function calc(string) {
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

function main(expression) {
  let error = false;
  let newExpression = [];
  let Symbol = null;
  let operation = null;
  let operand1 = null;
  let operand2 = null;
  let parenthesis = false;
  let count = 0;
  let i = 0;

  isOperation(expression[i]);
  expression.shift();
  if (!error) {
    goToMaximumNesting();
    completingPass();
    if ((!error) && (newExpression.length > 1)) {
      result = main(newExpression);
    } else if (!error) {
        return newExpression[0];
    } else {
      return null;
    } 
    return result;
  }

  function goToMaximumNesting() {
    for (i; i < expression.length; i++) {
      if (Symbol === 'operation') {
        searchOperands(expression[i]);
        if (Symbol === 'close') {
          break;
        }
      } else if (Symbol === 'open' ) {
          isOperation(expression[i]);
      } 
    }
  }

  function completingPass() {
    i += 1;
    if (Symbol === 'close') {
      chekingCloseParenthesis(expression[i]);
      calculation(operation, operand1, operand2);
      createNewExpression();
      resetVariable();
    } else {
      error = true;
    }
  }

  function isOperation(symbol) {
    if ((symbol === '*') || (symbol === '/') || (symbol === '-') || (symbol === '+')) {
      operation = symbol;
      Symbol = 'operation';
    } else {
      error = true;
    }
  }
  function pushingNewExpression(symbol) {
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
  }

  function searchOperands(symbol) {
    if (symbol === '(') {
      pushingNewExpression(symbol);
      Symbol = 'open'; 
    } else if ((count === 0) && ( typeof(symbol) === typenumber)) {
      operand1 = symbol;
      count = 1;
    } else if ((count === 1) && ( typeof(symbol) === typenumber)) {
      operand2 = symbol;
      count = 0;
      Symbol = 'close';
    } else {
      error = true;
    }
  }

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
  function resetVariable() {
    parenthesis = false;
    operation = null;
    operand1 = null;
    operand2 = null;
    Symbol = null;
  }

  function chekingCloseParenthesis(symbol) {
    if (parenthesis) {
      if (symbol != ')') {
        error = true;
      }
    }
  }

  function createNewExpression() {
    i += 1;
    for (i; i < expression.length; i++) {
      newExpression.push(expression[i]);
    }
  }
}

function isNumber(n) { 
  return !isNaN(n); 
}

function createExpressionArray(string) {
  string = string.replace(/\(/g, ' ( ');
  string = string.replace(/\)/g, ' ) ');
  string = string.replace(/\s+/g, ' ').trim();
  expression = string.split(' ');
}