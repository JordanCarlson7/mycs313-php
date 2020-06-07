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
    schedule_id VARCHAR(255) NOT NULL
);

--Create Projects table--
CREATE TABLE projects (
    id SERIAL NOT NULL,
    user_name VARCHAR(255) NOT NULL REFERENCES profiles(user_name),
    schedule_id VARCHAR(255) NOT NULL,
    project_id VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    start_d DATE NOT NULL,
    end_d DATE NOT NULL
);

--Create data points table --
CREATE TABLE data_points (
    id SERIAL NOT NULL,
    user_name VARCHAR NOT NULL REFERENCES profiles(user_name),
    project_id VARCHAR(255) NOT NULL REFERENCES projects(project_id),
    title VARCHAR(255),
    description VARCHAR(255),
    data_d DATE,
    attach1 VARCHAR(255),
    attach2 VARCHAR(255),
    attach3 VARCHAR(255)
);
-----------TABLES-----------

-----------INSERT-----------

--Insert User--
INSERT INTO profiles (user_name, password) VALUES ('TEST_USER', 'TEST_PASSWORD');

--Insert Schedule--
INSERT INTO schedules (user_name, schedule_id) VALUES ('TEST_USER', 'TEST_SCHEDULE_1');

--Insert Project--
INSERT INTO projects (user_name, schedule_id, project_id, description, start_d, end_d) VALUES ('TEST_USER', 'TEST_SCHEDULE_1', 'TEST_PROJECT_1', 'TEST_DESCRIPTION_1', '01-01-2020', '12-12-2021');

--Insert Data Points (3)--
INSERT INTO data_points (user_name, project_id, title, description, data_d, attach1, attach2, attach3) VALUES 
    ('TEST_USER', 'TEST_PROJECT_1', 'TEST_DATA_POINT_1', 'POINT_1_DESC', '03-06-2020', 'TEST1.jpg', 'TEST2.jpg', 'TEST3.txt'),
    ('TEST_USER', 'TEST_PROJECT_1', 'TEST_DATA_POINT_2', 'POINT_2_DESC', '06-06-2020', 'TEST1.jpg', 'TEST2.jpg', 'TEST3.txt'),
    ('TEST_USER', 'TEST_PROJECT_1', 'TEST_DATA_POINT_3', 'POINT_3_DESC', '09-06-2020', 'TEST1.jpg', 'TEST2.jpg', 'TEST3.txt');
-----------INSERT-----------


--JOIN--
SELECT * FROM data_points INNER JOIN projects ON data_points.user_name = projects.user_name;

--get all data points
SELECT * FROM data_points INNER JOIN projects ON data_points.user_name = projects.user_name WHERE projects.user_name = :username;

--get all data points for specific project--
SELECT * FROM data_points INNER JOIN projects ON data_points.project_id = projects.project_id WHERE projects.user_name = :username AND projects.project_id = :project_id;