-----------TYPES-----------
--Create timing type--
CREATE TYPE timing AS (
    start_d DATE,
    end_d DATE
);

--Create Data point type--
CREATE TYPE data_p AS (
    title VARCHAR(255),
    description VARCHAR(255),
    data_d DATE,
    attach1 VARCHAR(255),
    attach2 VARCHAR(255),
    attach3 VARCHAR(255)
);
-----------TYPES-----------



-----------TABLES-----------
--Create Profiles table--
CREATE TABLE profiles (
    id SERIAL NOT NULL,
    user_name VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);

--Create Schedule table --
CREATE TABLE schedules (
    id SERIAL NOT NULL,
    user_name VARCHAR(255) NOT NULL REFERENCES profiles(user_name),
    schedule_id VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY
);

--Create Projects table--
CREATE TABLE projects (
    id SERIAL NOT NULL,
    user_name VARCHAR(255) NOT NULL REFERENCES profiles(user_name),
    schedule_id VARCHAR(255) NOT NULL REFERENCES schedules(schedule_id),
    project_id VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    timeline timing
);

--Create data points table --
CREATE TABLE data_points (
    id SERIAL NOT NULL,
    project_id VARCHAR(255) NOT NULL REFERENCES projects(project_id),
    user_name VARCHAR NOT NULL REFERENCES profiles(user_name),
    data_point data_p
);
-----------TABLES-----------