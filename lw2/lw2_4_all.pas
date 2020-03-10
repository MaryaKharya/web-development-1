PROGRAM GetParameters(INPUT, OUTPUT);
USES
  GPC;
VAR
  Copy, Stringer: STRING;
{Print parameters Querystring}
PROCEDURE GetQueryStringParameters(Text: STRING); 
VAR 
  i, Indexer, Count: INTEGER;
BEGIN {GetQueryStringParameters}
  Copy := 'key';
  FOR i := 1 to Length(Text)
  DO
    BEGIN
      {Print key}
      IF Copy = 'key'
      THEN
        IF Text[i] <> '='
        THEN
          WRITE(Text[i])
        ELSE
          BEGIN
            Copy := 'value';
            WRITE(': ');
            CONTINUE
          END;
      {Print value}
      IF Copy = 'value'
      THEN
        IF Text[i] <> '&'
        THEN
          WRITE(Text[i])
        ELSE
          BEGIN
            Copy := 'key';
            WRITELN;
            CONTINUE
          END
    END
END; {GetQueryStringParameters}

BEGIN {GetParameters}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Stringer := GetEnv('QUERY_STRING');
  WRITELN('All parametrs:');
  GetQueryStringParameters(Stringer);
END. {GetParameters}