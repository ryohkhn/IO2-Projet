DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS animal;
DROP TABLE IF EXISTS profil;
DROP TABLE IF EXISTS post;

CREATE TABLE IF NOT EXISTS users (
  id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  nickname VARCHAR(256) NOT NULL DEFAULT '',
  password CHAR(40) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS animal (
  id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  type CHAR(10) NOT NULL DEFAULT '',
  description VARCHAR(150) DEFAULT '',
  animal_id INT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (animal_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS profil (
  id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  description VARCHAR(200) DEFAULT '',
  profil_id INT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (profil_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS post(
  id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  publication varchar(200) NOT NULL,
  post_id INT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (post_id) REFERENCES users (id)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS relationships(
  id INT(8) UNSIGNER NOT NULL AUTO_INCREMENT,
  follower_id INT(8) UNSIGNED NOT NULL,
  followed_id INT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (follower_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;