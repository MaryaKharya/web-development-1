PROGRAM GetParametr(INPUT, OUTPUT);
USES
  GPC;
VAR
  Stringer: STRING;
FUNCTION GetQueryStringParameter(Key: STRING): STRING; 
VAR 
  i, Indexer, Count: INTEGER;
BEGIN {GetQueryStringParameter}
  Indexer := Pos(Key, Stringer) + Length(Key) +1;   {find out where is first character 'Key'}
  IF Indexer <> Length(Key) + 1
  THEN
    BEGIN
      Count := 0;
      FOR i := Indexer to Length(Stringer)
      DO
        BEGIN
          IF Stringer[i] <> '&'
          THEN
            Count := Count + 1
          ELSE
            BREAK
        END;
      GetQueryStringParameter := Copy(Stringer, Indexer, Count)
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
