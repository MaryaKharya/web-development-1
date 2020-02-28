PROGRAM PaulRevere(INPUT, OUTPUT);
{Печать соответствующего сообщения ,зависящего от величины
 на входе:  '...by land'  для 1;  '...by sea'  для 2;
 иначе печать сообщения об ошибке}
USES
  GPC;
VAR
  Lant: STRING;
BEGIN {PaulRevere}
  {Read Lanterns}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Lant := GetEnv('QUERY_STRING');
  {Issue Paul Revere's message}
  IF Lant = 'lanterns=1'
  THEN
    WRITELN('The British are coming by land.')
  ELSE
    IF Lant = 'lanterns=2'
    THEN
      WRITELN('The British are coming by sea.')
    ELSE
      WRITELN('The North Church shows only ''', Lant, '''.')
END. {PaulRevere}
