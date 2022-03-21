USE mysql;
CREATE user kanta@172.22.0.4 identified by 'posse';
CREATE user kanta@localhost identified by 'posse';
grant all on *.* to kanta@172.22.0.4;
grant all on *.* to kanta@localhost;
alter user kanta@172.22.0.4 identified with mysql_native_password by 'posse';
alter user kanta@localhost identified with mysql_native_password by 'posse';

-- データベースを作る
DROP TABLE IF EXISTS big_questions;
CREATE TABLE big_questions (
  id SMALLINT(4),
  name VARCHAR(255) NOT NULL
);

INSERT INTO big_questions
VALUES
  (1, '東京の難読地名クイズ'),
  (2, '広島県の難読地名クイズ');


DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
  id SMALLINT(4),
  big_question_id SMALLINT(4),
  image VARCHAR(255) NOT NULL
);

INSERT INTO questions
VALUES
  (1, 1, 'takanawa.png'),
  (2, 1, 'kameido.png'),
  (3, 2, 'mukainada.png');

DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
  id SMALLINT(4),
  question_id SMALLINT(4),
  name VARCHAR(255) NOT NULL,
  valid SMALLINT(4)
);

INSERT INTO choices
VALUES
  (1, 1, 'たかなわ', 1),
  (2, 1, 'たかわ', 0),
  (3, 1, 'こうわ', 0),
  (4, 2, 'かめと', 0),
  (5, 2, 'かめど', 0),
  (6, 2, 'かめいど', 1),
  (7, 3, 'むこうひら', 0),
  (8, 3, 'むきひら', 0),
  (9, 3, 'むかいなだ', 1);

