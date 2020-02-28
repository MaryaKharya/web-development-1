PROGRAM GetParametr(INPUT, OUTPUT);
USES
  GPC;
VAR
  Stringer: STRING;
FUNCTION GetQueryStringParameter(Key: STRING): STRING; 
VAR 
  Ch: CHAR;
  Indexer, Count: INTEGER;
  F1: TEXT;
BEGIN {GetQueryStringParameter}
  Indexer := Pos(Key, Stringer);   {Узнаем на каком месте находиться первый символ строки Key}
  IF Indexer <> 0
  THEN
    BEGIN
      Delete(Stringer, 1, Indexer);
      REWRITE(F1);
      WRITELN(F1, Stringer);
      RESET(F1);
      WHILE (Ch <> '=') AND (NOT EOLN(F1))
      DO
        READ(F1, Ch);
      Count := 0;
      WHILE (Ch <> '&') AND (NOT EOLN(F1))
      DO
        BEGIN
          READ(F1, Ch);
          IF Ch <> '&'
          THEN
            Count := Count + 1
        END;  
      GetQueryStringParameter := Copy(Stringer, Length(Key) + 1, Count)
    END
  ELSE
    GetQueryStringParameter := 'not found'
END; {GetQueryStringParameter}

BEGIN {GetParametr}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Stringer := GetEnv('QUERY_STRING');
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {GetParametr}

  
