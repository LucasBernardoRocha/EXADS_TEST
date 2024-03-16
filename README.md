## SQL
```sql
CREATE DATABASE `tv_series_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */
       
INSERT INTO tv_series (title, channel, gender) VALUES
('The Mandalorian', 'Disney+', 'Sci-Fi'),
('Stranger Things', 'Netflix', 'Sci-Fi/Horror'),
('The Office', 'Peacock', 'Comedy'),
('Breaking Bad', 'Netflix', 'Crime/Drama'),
('Friends', 'HBO Max', 'Comedy'),
('Game of Thrones', 'HBO Max', 'Fantasy/Drama'),
('The Simpsons', 'Disney+', 'Animation/Comedy'),
('House M.D.', 'Hulu', 'Medical Drama'),
('The Good Place', 'Netflix', 'Comedy/Fantasy'),
('Sherlock', 'Netflix', 'Crime/Drama');


INSERT INTO tv_series_intervals (week_day, show_time, tv_series_id)
SELECT FLOOR(RAND() * 7), ADDTIME('20:00:00', SEC_TO_TIME(FLOOR(RAND() * 10800))), 4
FROM information_schema.tables
LIMIT 5;

INSERT INTO tv_series_intervals (week_day, show_time, tv_series_id)
SELECT FLOOR(RAND() * 7), ADDTIME('22:00:00', SEC_TO_TIME(FLOOR(RAND() * 10800))), 5
FROM information_schema.tables
LIMIT 5;

INSERT INTO tv_series_intervals (week_day, show_time, tv_series_id)
SELECT FLOOR(RAND() * 7), ADDTIME('19:00:00', SEC_TO_TIME(FLOOR(RAND() * 10800))), 6
FROM information_schema.tables
LIMIT 5;

INSERT INTO tv_series_intervals (week_day, show_time, tv_series_id)
SELECT FLOOR(RAND() * 7), ADDTIME('21:00:00', SEC_TO_TIME(FLOOR(RAND() * 10800))), 7
FROM information_schema.tables
LIMIT 5;

INSERT INTO tv_series_intervals (week_day, show_time, tv_series_id)
SELECT FLOOR(RAND() * 7), ADDTIME('18:00:00', SEC_TO_TIME(FLOOR(RAND() * 10800))), 8
FROM information_schema.tables
LIMIT 5;

INSERT INTO tv_series_intervals (week_day, show_time, tv_series_id)
SELECT FLOOR(RAND() * 7), ADDTIME('23:00:00', SEC_TO_TIME(FLOOR(RAND() * 10800))), 9
FROM information_schema.tables
LIMIT 5;

INSERT INTO tv_series_intervals (week_day, show_time, tv_series_id)
SELECT FLOOR(RAND() * 7), ADDTIME('17:00:00', SEC_TO_TIME(FLOOR(RAND() * 10800))), 10
FROM information_schema.tables
LIMIT 5;

INSERT INTO tv_series_intervals (week_day, show_time, tv_series_id)
SELECT FLOOR(RAND() * 7), ADDTIME('20:30:00', SEC_TO_TIME(FLOOR(RAND() * 10800))), 11
FROM information_schema.tables
LIMIT 5;

INSERT INTO tv_series_intervals (week_day, show_time, tv_series_id)
SELECT FLOOR(RAND() * 7), ADDTIME('19:30:00', SEC_TO_TIME(FLOOR(RAND() * 10800))), 12
FROM information_schema.tables
LIMIT 5;

INSERT INTO tv_series_intervals (week_day, show_time, tv_series_id)
SELECT FLOOR(RAND() * 7), ADDTIME('21:30:00', SEC_TO_TIME(FLOOR(RAND() * 10800))), 13
FROM information_schema.tables
LIMIT 5;

ALTER TABLE `tv_series` ADD INDEX `IDX_title` (`title`);

ALTER TABLE `tv_series_intervals` ADD INDEX `IDX_week_day_show_time` (`week_day`, `show_time`);
```