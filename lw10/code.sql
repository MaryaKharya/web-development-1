CREATE DATABASE university;

USE university;

CREATE TABLE faculty
(
    id                  INT AUTO_INCREMENT NOT NULL,
    name                VARCHAR(255)       NOT NULL,
    numberOfGroups      INT                NOT NULL,
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE 'utf8mb4_unicode_ci'
  ENGINE = InnoDB;

insert into faculty (name, numberOfGroups) VALUES
    ('ФИиВТ', '3'),
    ('ФУП', '3'),
    ('ИСА', '3');

CREATE TABLE groups
(
    id                  INT AUTO_INCREMENT NOT NULL,
    name                VARCHAR(255)       NOT NULL,
    numberOfStudents    INT                NOT NULL,
    faculty             INT                NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (faculty) REFERENCES faculty (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE 'utf8mb4_unicode_ci'
  ENGINE = InnoDB;

insert into groups (name, numberOfStudents, faculty) VALUES
    ('ПС-11', '5', '1'),
    ('ПС-12', '5', '1'),
    ('ПС-13', '5', '1'),
    ('ЮД-11', '5', '2'),
    ('ЮД-12', '5', '2'),
    ('ЮД-13', '5', '2'),
    ('ССО-11', '5', '3'),
    ('ССО-12', '5', '3'),
    ('ССО-13', '5', '3');

CREATE TABLE students
(
    id                  INT AUTO_INCREMENT NOT NULL,
    first_name          VARCHAR(255)       NOT NULL,
    middle_name         VARCHAR(255)       NOT NULL,
    last_name           VARCHAR(255)       NOT NULL,
    age                 INT                NOT NULL,
    groupId             INT                NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (groupId) REFERENCES groups (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE 'utf8mb4_unicode_ci'
  ENGINE = InnoDB;

insert into students (first_name, middle_name, last_name, age, groupId) VALUES
    ('Денис', 'Алексеевич', 'Актуганов', '18', '1'),
    ('Даниил', 'Сергеевич', 'Алафузов', '21', '1'),
    ('Яков', 'Вадимович', 'Алгаев', '18', '3'),
    ('Эрнест', 'Эдуардович', 'Александров', '19', '1'),
    ('Андрей', 'Артурович', 'Арсибеков', '19', '2'),
    ('Руслан', 'Геннадьевич', 'Васильев', '18', '2'),
    ('Родион', 'Валерьевич', 'Вязов', '18', '3'),
    ('Рустам', 'Маратович', 'Гайнутдинов', '18', '2'),
    ('Даниил', 'Алексеевич', 'Герасимов', '19', '2'),
    ('Михаил', 'Олегович', 'Глушков', '18', '3'),
    ('Роман', 'Сергеевич', 'Казанцев', '18', '3'),
    ('Мария', 'Андреевна', 'Милкова', '18', '3'),
    ('Андрей', 'Юрьевич', 'Мошкин', '20', '2'),
    ('Эльдар', 'Тимурович', 'Мухаметханов', '18', '1'),
    ('Николай', 'Александрович', 'Никольский', '18', '1'),
    ('Дарья', 'Геннадьевна', 'Окунева', '19', '4'),
    ('Ирина', 'Вадимовна', 'Попова', '18', '4'),
    ('Елена', 'Аркидьевна', 'Садовина', '18', '4'),
    ('Анатолий', 'Петрович', 'Садовин', '19', '4'),
    ('Оксана', 'Владимирована', 'Садовина', '22', '5'),
    ('Николай', 'Палыч', 'Старков', '18', '6'),
    ('Елена', 'Петровна', 'Тарасенко', '18', '4'),
    ('Юлия', 'Анатольевна', 'Тимошенко', '18', '5'),
    ('Эдуард', 'Эдуардович', 'Тинькоф', '18', '5'),
    ('Павел', 'Сергеевич', 'Титкин', '19', '6'),
    ('Пётр', 'Николаевич', 'Тихий', '21', '6'),
    ('Сергей', 'Вадимович', 'Тихонов', '23', '5'),
    ('Наталья', 'Андреевна', 'Тишакова', '18', '5'),
    ('Генадий', 'Иванович', 'Токарев', '17', '6'),
    ('Вадим', 'Вадимович', 'Томин', '18', '7'),
    ('Иван', 'Сергеевич', 'Тренин', '18', '6'),
    ('Николай', 'Степанович', 'Угаров', '18', '7'),
    ('Пётр', 'Геннадьевич', 'Угримов', '18', '8'),
    ('Андрей', 'Юрьевич', 'Уймин', '19', '8'),
    ('Сергей', 'Вадимович', 'Уколов', '21', '9'),
    ('Ольга', 'Петровна', 'Фадеева',  '18', '7'),
    ('Эрнест', 'Эрнестович', 'Файбус', '17', '7'),
    ('Генадий', 'Яковлевич', 'Фатин',  '18', '9'),
    ('Иван', 'Анатольевич', 'Хмелев', '18', '7'),
    ('Петр', 'Иванович', 'Ховрин', '18', '8'),
    ('Надежда', 'Семёновна', 'Хортова',  '18', '9'),
    ('Рустам', 'Николаевич', 'Хотеев', '18', '8'),
    ('Елена', 'Павловна', 'Яблокова', '21', '8'),
    ('Семён', 'Олегович', 'Явдохин', '18', '9'),
    ('Владимир', 'Михайлович', 'Яковлев',  '18', '9');

SELECT
    *
FROM
    students
WHERE
    age > 18;


SELECT
    students.first_name AS 'Имя',
    students.middle_name AS 'Отчество',
    students.last_name AS 'Фамилия',
    groups.name AS 'Гуппа'
FROM
    students
    JOIN groups ON students.groupId = groups.id
WHERE
    groups.name = 'ПС-13';


SELECT
    students.first_name AS 'Имя',
    students.middle_name AS 'Отчество',
    students.last_name AS 'Фамилия',
    faculty.name AS 'Факультет'
FROM
    students
    JOIN groups ON students.groupId = groups.id
    JOIN faculty ON groups.faculty = faculty.id
WHERE
    faculty.name = 'ФИиВТ';


SELECT
    students.first_name AS 'Имя',
    students.middle_name AS 'Отчество',
    students.last_name AS 'Фамилия',
    groups.name AS 'Группа',
    faculty.name AS 'Факультет'
FROM
    students
    JOIN groups ON students.groupId = groups.id
    JOIN faculty ON groups.faculty = faculty.id
WHERE
    students.id = id_студента;