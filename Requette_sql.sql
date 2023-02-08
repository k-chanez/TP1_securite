/*exécuter ces commandes sur votre terminal*/
/*1- $ sudo mysql */
/*2- $ source /le chemin ou ce trouve ce fichier/identifiat.sql*/

DROP DATABASE Db_user ;
CREATE DATABASE Db_user;
USE Db_user;

create user tuto2023 identified by 'Info2023secuTutotP1';
grant all privileges on Db_user.* to tuto2023;

drop table if exists Db_user.Users;
CREATE TABLE Users(
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  Password varchar(100) NOT NULL
);

