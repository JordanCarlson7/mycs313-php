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
    user_name VARCHAR NOT NULL REFERENCES profiles(user_name),
    project_id VARCHAR(255) NOT NULL REFERENCES projects(project_id),
    data_point data_p
);
-----------TABLES-----------

-----------INSERT-----------

--Insert User--
INSERT INTO profiles (user_name, password) VALUES ('TEST_USER', 'TEST_PASSWORD');

--Insert Schedule--
INSERT INTO schedules (user_name, schedule_id) VALUES ('TEST_USER', 'TEST_SCHEDULE_1');

--Insert Project--
INSERT INTO projects (user_name, schedule_id, project_id, description, timeline) VALUES ('TEST_USER', 'TEST_SCHEDULE_1', 'TEST_PROJECT_1', 'TEST_DESCRIPTION_1', '(01-01-2020, 12-12-2021)');

--Insert Data Points (3)--
INSERT INTO data_points (user_name, project_id, data_point) VALUES 
    ('TEST_USER', 'TEST_PROJECT_1', '(TEST_DATA_POINT_1, POINT_1_DESC, 03-06-2020, TEST1.jpg, TEST2.jpg, TEST3.txt)'),
    ('TEST_USER', 'TEST_PROJECT_1', '(TEST_DATA_POINT_2, POINT_2_DESC, 06-06-2020, TEST1.jpg, TEST2.jpg, TEST3.txt)'),
    ('TEST_USER', 'TEST_PROJECT_1', '(TEST_DATA_POINT_3, POINT_3_DESC, 09-06-2020, TEST1.jpg, TEST2.jpg, TEST3.txt)');

    --test--
INSERT INTO data_points (user_name, project_id, data_point) VALUES 
    ('TEST_USER', 'TEST_PROJECT_1', '(TEST_DATA_POINT_X, POINT_X_DESC, 03-06-2020, TEST1.jpg, TEST2.jpg, TEST3.txt)');



-----------INSERT-----------
