USE ph2_webapp;
CREATE user kanta@`%` identified by 'posse';
CREATE user kanta@localhost identified by 'posse';
grant all on *.* to kanta@`%`;
grant all on *.* to kanta@localhost;
alter user kanta@`%` identified with mysql_native_password by 'posse';
alter user kanta@localhost identified with mysql_native_password by 'posse';

-- データベースを作る
DROP DATABASE IF EXISTS ph2_webapp;
CREATE DATABASE ph2_webapp;
USE ph2_webapp;


-- 学習時間テーブルを作る
DROP TABLE IF EXISTS studyrecords;
CREATE TABLE studyrecords (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `studydate` DATETIME NOT NULL,
  `studytimes` INT NOT NULL,
  `language_id` INT NOT NULL,
  `content_id` INT NOT NULL
);

INSERT INTO studyrecords(studydate, studytimes, language_id, content_id)
VALUES
  ('2022-3-31', 2, 2, 2),
  ('2022-4-1', 1, 3, 1),
  ('2022-4-2', 2, 1, 2),
  ('2022-4-3', 1, 2, 2),
  ('2022-4-4', 1, 2, 2),
  ('2022-4-5', 4, 1, 1),
  ('2022-4-6', 2, 2, 2),
  ('2022-4-7', 3, 3, 2),
  ('2022-4-8', 2, 2, 3),
  ('2022-4-9', 3, 1, 2),
  ('2022-4-10', 2, 2, 1),
  ('2022-4-11', 2, 1, 2),
  ('2022-4-12', 1, 2, 2),
  ('2022-4-13', 2, 1, 3),
  ('2022-4-14',3, 2, 2),
  ('2022-4-15', 2, 3, 1),
  ('2022-4-16', 1, 1, 2),
  ('2022-4-17', 3, 2, 3);


-- 学習言語テーブルを作る
DROP TABLE IF EXISTS studylanguage;
CREATE TABLE studylanguage (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `language` VARCHAR(255) NOT NULL,
  `color` VARCHAR(255) NOT NULL
);

INSERT INTO studylanguage(`language`, color)
VALUES
  ('HTML', '#0445ec'),
  ('CSS', '#0f70bd'),
  ('SQL', '#20bdde'),
  ('SHELL', '#3ccefe'),
  ('Javascript', '#b29ef3'),
  ('PHP', '#4a17ef'),
  ('Laravel', '#3005c0'),
  ('その他', '#6c46eb');


-- 学習コンテンツテーブルを作る
DROP TABLE IF EXISTS studycontent;
CREATE TABLE studycontent (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `content` VARCHAR(255) NOT NULL,
  `color` VARCHAR(255) NOT NULL
);

INSERT INTO studycontent(content, color)
VALUES
  ('N予備校', '#0445ec'),
  ('課題', '#0f70bd'),
  ('ドットインストール', '#20bdde');


