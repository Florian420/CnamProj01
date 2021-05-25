CREATE DATABASE IF NOT EXISTS quiz
CHARACTER SET = 'utf8'
COLLATE = 'utf8_general_ci';

USE quiz;

CREATE TABLE IF NOT EXISTS user(
						user_id INT PRIMARY KEY AUTO_INCREMENT,
						user_firstname VARCHAR(32),
						user_name VARCHAR(32),
						user_login VARCHAR(16) NOT NULL UNIQUE,
						user_passwd VARCHAR(512) NOT NULL,
						user_rank INT
						) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS module(
						mod_id INT PRIMARY KEY AUTO_INCREMENT,
						mod_level INT,
						mod_title VARCHAR(32),
						mod_name VARCHAR(32),
						mod_desc VARCHAR(255)
						) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS question(
						q_id INT PRIMARY KEY AUTO_INCREMENT,
						mod_id INT,
						q_text VARCHAR(255),
						CONSTRAINT fk_question_mod FOREIGN KEY(mod_id) REFERENCES module(mod_id)
						) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS suggestion(
						sug_id INT PRIMARY KEY AUTO_INCREMENT,
						sug_text VARCHAR(255),
						q_id INT,
						CONSTRAINT fk_suggestion_q FOREIGN KEY(q_id) REFERENCES question(q_id)
						) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS answer(
						ans_id INT PRIMARY KEY AUTO_INCREMENT,
						q_id INT,
						sug_id INT,
						CONSTRAINT fk_answer_q FOREIGN KEY(q_id) REFERENCES question(q_id),
						CONSTRAINT fk_answer_sug FOREIGN KEY(sug_id) REFERENCES suggestion(sug_id)
						) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS progress(
						prog_id INT PRIMARY KEY AUTO_INCREMENT,
						prog_dt DATETIME,
						user_id INT,
						mod_id INT,
						q_id INT,
						prog_result INT,
						CONSTRAINT fk_progress_user FOREIGN KEY(user_id) REFERENCES user(user_id),
						CONSTRAINT fk_progress_mod FOREIGN KEY(mod_id) REFERENCES module(mod_id),
						CONSTRAINT fk_progress_q FOREIGN KEY(q_id) REFERENCES question(q_id)
						) ENGINE = InnoDB;
