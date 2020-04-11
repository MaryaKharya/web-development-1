function calc(string) {
  function isNumber(n) { 
    return !isNaN(n); 
  } 

  function main(expression) {
    let error = false;
    let new_expression = [];
    let isSymbol = null;
    let operation = null;
    let operand1 = null;
    let operand2 = null;
    let count = 0;
    if ((expression[0] === '*') || (expression[0] === '/') || (expression[0] === '-') || (expression[0] === '+')) {
      operation = expression.shift()
      isSymbol = 'operation';
    } else {
        error = true;
    }

    if (!error) {
      let parenthesis = false;
      i = 0;
      for (i; i < expression.length; i++) {
        if (isSymbol === 'operation') {
          if (expression[i] === '(') {
            if (parenthesis) {
              new_expression.push(expression[i]);
            } else {
              parenthesis = true;
            }
            if (operation != null) {
              new_expression.push(operation);
              operation = null;
            }
            if (operand1 != null) {
              new_expression.push(operand1);
              operand1 = null;
              count = 0;
            }
            isSymbol = 'open'; 
          } else if ((count === 0) && ( typeof(expression[i]) === 'number')) {
            operand1 = expression[i];
            count = 1;
          } else if ((count === 1) && ( typeof(expression[i]) === 'number')) {
            operand2 = expression[i];
            count = 0;
            isSymbol = 'close';
            break;
          } else {
            error = true;
          }
        } else if (isSymbol === 'open' ) {
            if ((expression[i] === '*') || (expression[i] === '/') || (expression[i] === '+') || (expression[i] === '-')) {
              operation = expression[i];
              isSymbol = 'operation';
            } else {
              error = true;
            }
        } 
      }
      
      i += 1;
      if (isSymbol === 'close') {
        if (parenthesis) {
          if (expression[i] != ')') {
            error = true;
          }
        }
        if (operation === '+') {
          new_expression.push(operand1 + operand2);
        } else if (operation === '-') {
          new_expression.push(operand1 - operand2);  
        } else if (operation === '*') {
          new_expression.push(operand1 * operand2);  
        } else if (operation === '/') {
          new_expression.push(operand1 / operand2);  
        }
        parenthesis = false;
        operation = null;
        operand1 = null;
        operand2 = null;
        isSymbol = null;
        i += 1;
        for (i; i < expression.length; i++) {
          new_expression.push(expression[i]);
        }
      } else if (!error) {
        error = true;
      }

      if ((!error) && (new_expression.length > 1)) {
        result = main(new_expression);
      } else if (!error) {
          return new_expression[0];
      } else {
        return null;
      } 
      return result;
    }
  }


  if ( string.split('(').length != string.split(')').length ) {
    console.log('Число открывающих скобок не совпадает с числом закрывающих!');
  } else {
    string = string.replace(/\(/g, ' ( ');
    string = string.replace(/\)/g, ' ) ');
    string = string.replace(/\s+/g, ' ').trim();
    let expression = string.split(' ');
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