-- Team Assignment
CREATE DATABASE gc_notes;

-- Connect to DB (Local)
\c gc_notes

-- Create Users Table
CREATE TABLE users (
  id SERIAL NOT NULL PRIMARY KEY,
  display_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Create Speakers Table
CREATE TABLE speakers (
  id SERIAL NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);

-- Create Enum (Season)
CREATE TYPE season AS ENUM ('spring', 'fall');

-- Create Conferences Table
CREATE TABLE conferences (
  id SERIAL NOT NULL PRIMARY KEY,
  date date NOT NULL DEFAULT CURRENT_DATE
);

-- Create Notes Table
CREATE TABLE notes (
  id SERIAL NOT NULL PRIMARY KEY,
  label VARCHAR(255),
  body TEXT NOT NULL,
  user_id bigint NOT NULL REFERENCES users(id),
  speaker_id bigint NOT NULL REFERENCES speakers(id),
  conference_id bigint NOT NULL REFERENCES conferences(id)  
);

--Creat note--
INSERT INTO notes (label, body, user_id, speaker_id, conference_id) VALUES ('Note 1', 'Nelson is so powerful', 1, 1, 2);
INSERT INTO notes (label, body, user_id, speaker_id, conference_id) VALUES ('Note 1', 'Nelson is so powerful', 1, 1, 3);
INSERT INTO notes (label, body, user_id, speaker_id, conference_id) VALUES ('Note 1', 'Nelson is so powerful', 1, 1, 2);
INSERT INTO notes (label, body, user_id, speaker_id, conference_id) VALUES ('Note 1', 'Nelson is so powerful', 1, 1, 2);

-- Create Conference Speaker Ref. Table
CREATE TABLE conference_speaker (
  id SERIAL NOT NULL PRIMARY KEY,
  conference_id bigint NOT NULL REFERENCES conferences(id),
  speaker_id bigint NOT NULL REFERENCES speakers(id)
);


-- add user --
INSERT INTO users (display_name, email, password) VALUES ('Jordan', 'placeholder@gmail.com', 'password');

-- add speakers --
INSERT INTO speakers (name) VALUES ('Nelson');
INSERT INTO speakers (name) VALUES ('Uchtdorf');
INSERT INTO speakers (name) VALUES ('Eyering');
INSERT INTO speakers (name) VALUES ('Holland');

--add conferences--
INSERT INTO conferences (date) VALUES ('2020-04-06');
INSERT INTO conferences (date) VALUES ('2019-10-08');
INSERT INTO conferences (date) VALUES ('2019-04-06');
INSERT INTO conferences (date) VALUES ('2018-10-08');
INSERT INTO conferences (date) VALUES ('2018-04-06');
INSERT INTO conferences (date) VALUES ('2017-10-08');

INSERT INTO conferences (date, talk_session) VALUES ('2018-04-06', 'afternoon');
INSERT INTO conferences (date, talk_session) VALUES ('2017-10-08', 'afternoon');
INSERT INTO conferences (date, talk_session) VALUES ('2018-04-06', 'afternoon');
INSERT INTO conferences (date, talk_session) VALUES ('2017-10-08', 'afternoon');