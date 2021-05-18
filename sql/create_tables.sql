DROP TABLE IF EXISTS animal;
DROP TABLE IF EXISTS profil;
DROP TABLE IF EXISTS relationships;
DROP TABLE IF EXISTS reports;
DROP TABLE IF EXISTS postlikes;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS administrators;
DROP TABLE IF EXISTS users;

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
  pp_pic varchar(100) DEFAULT '',
  animal_id INT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (animal_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS profil (
  id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  description VARCHAR(200) DEFAULT '',
  profil_id INT(8) UNSIGNED NOT NULL,
  pp_pic varchar(100) DEFAULT '',
  PRIMARY KEY (id),
  FOREIGN KEY (profil_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS post(
  id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  publication varchar(200) NOT NULL,
  post_id INT(8) UNSIGNED NOT NULL,
  image_path VARCHAR(200) NOT NULL DEFAULT '',
  likescount INT(8) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  FOREIGN KEY (post_id) REFERENCES users (id)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS relationships(
  id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  follower_id INT(8) UNSIGNED NOT NULL,
  followed_id INT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (follower_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS postlikes(
  id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INT(8) UNSIGNED NOT NULL,
  publication_id INT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (publication_id) REFERENCES post (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS administrators(
  administrators_id INT(8) UNSIGNED NOT NULL,
  super BOOLEAN NOT NULL DEFAULT false,
  admin BOOLEAN NOT NULL DEFAULT false,
  PRIMARY KEY (administrators_id),
  FOREIGN KEY (administrators_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS reports(
  id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  reports_id INT(8) UNSIGNED NOT NULL,
  post_id INT(8) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (reports_id) REFERENCES users (id),
  FOREIGN KEY (post_id) REFERENCES post (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* il faudra mettre un superadmin après la création de l'un des comptes dans la base de donnée via cette requête

INSERT INTO administrators VALUES(administrators_id,1,1)

"administrators_id" étant l'"id" du compte dans la table users

Ensuite le superadmin pourra ajouter des administrateurs via leur page de profil */