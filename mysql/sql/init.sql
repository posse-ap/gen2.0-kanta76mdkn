-- データベースを作る
DROP SCHEMA IF EXISTS ph2_quizy;
CREATE SCHEMA ph2_quizy;
USE ph2_quizy;

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

