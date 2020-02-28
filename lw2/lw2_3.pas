PROGRAM HelloPerson(INPUT, OUTPUT);
USES
  GPC;
VAR
  W1, W2, W3, W4, W5, Search: CHAR;
  Pname: TEXT;
BEGIN {HelloPerson}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  REWRITE(Pname);
  WRITELN(Pname, GetEnv('QUERY_STRING'));
  RESET(Pname);
  {Инициализация}
  W1 := ' ';
  W2 := ' ';
  W3 := ' ';
  W4 := ' ';
  W5 := ' ';
  Search := '0';
  WHILE (NOT EOLN(Pname)) AND (Search = '0')
  DO
    BEGIN
      W1 := W2;
      W2 := W3;
      W3 := W4;
      W4 := W5;
      READ(Pname, W5);
      {Проверка на name}
      IF (W1 = 'n') AND (W2 = 'a') AND (W3 = 'm') AND (W4 = 'e') AND (W5 = '=')
      THEN
        Search := '1'
    END;
  IF Search = '1'
  THEN
    BEGIN
      WRITE('Hello Dear, ');
      WHILE (W5 <> '&') AND (NOT EOLN(Pname))
      DO
        BEGIN
          READ(Pname, W5);
          IF W5 <> '&'
          THEN
            WRITE(W5)
        END;
      WRITELN('!')
    END
  ELSE 
    WRITELN('Hello Anonymous!') 
END.
