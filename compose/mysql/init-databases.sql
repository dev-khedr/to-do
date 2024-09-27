-- init-databases.sql
CREATE DATABASE IF NOT EXISTS taxi_test;
GRANT ALL PRIVILEGES ON taxi_test.* TO 'user'@'%';
FLUSH PRIVILEGES;
