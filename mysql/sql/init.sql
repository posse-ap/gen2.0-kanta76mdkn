USE mysql;
CREATE user kanta@172.22.0.4 identified by 'posse';
CREATE user kanta@localhost identified by 'posse';
grant all on *.* to kanta@172.22.0.4;
grant all on *.* to kanta@localhost;
alter user kanta@172.22.0.4 identified with mysql_native_password by ’posse’;
alter user kanta@localhost identified with mysql_native_password by ’posse’;

-- データベースを作る
DROP SCHEMA IF EXISTS ph2_quizy;
CREATE SCHEMA ph2_quizy;
USE ph2_quizy;

DROP TABLE IF EXISTS big_questions;
CREATE TABLE big_questions(
`id` INT NOT NULL ,
`name` varchar(255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
);

INSERT INTO big_questions (`id`,`name`) VALUES
(1,'東京の難読地名クイズ'),
(2,'広島の難読地名クイズ');


-- カラムを作る
DROP TABLE IF EXISTS question;
CREATE TABLE question(
`id` INT NOT NULL ,
`big_question_id` INT NOT NULL,
`image` varchar(255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
);

INSERT INTO question(`id`,`big_question_id`,`image`)VALUES
(1,1,'takanawa.png'),
(2,1,'kameido.png'),
(3,2,'mukainada.png');

-- 二つ目のカラムを作る
DROP TABLE IF EXISTS choices;
CREATE TABLE choices(
`id` INT NOT NULL,
`question_id` INT NOT NULL,
`name` varchar(255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
`valid` INT NOT NULL
);

INSERT INTO choices(`id`,`question_id`,`name`,`valid`)VALUES
(1,1,'たかなわ',1),
(2,1,'たかわ',0),
(3,1,'こうわ',0),
(4,2,'かめど',0),
(5,2,'かめいど',0),
(6,2,'かめと',1),
(7,3,'むこうひら',0),
(8,3,'むきひら',0),
(9,3,'むかいなだ',1);

