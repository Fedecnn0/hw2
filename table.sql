create database YourDogs;

create table users( 
    id integer PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255), 
    cognome varchar(255), 
    email varchar(255),  
    username varchar(255), 
    indirizzo varchar(255), 
    password varchar(255),
    updated_at datetime, 
    created_at datetime
);

create table likes(
    user_id integer,
    username varchar(255),
    razza varchar(255),     
    carica varchar(255),     
    name varchar(255),
    updated_at datetime,
    created_at datetime,     
    primary key(user_id, razza),      
    foreign key(user_id) references users(id) on delete cascade on update cascade
);

create table posts( 
    id integer PRIMARY KEY AUTO_INCREMENT,
    user_id integer,
    username varchar(255),
    carica varchar(255),     
    scritta varchar(255),
    n_like integer DEFAULT 0,
    updated_at datetime,
    created_at datetime,           
    foreign key(user_id) references users(id) on delete cascade on update cascade
);

create table hearts(
    id integer PRIMARY KEY AUTO_INCREMENT,
    user_id integer,
    username varchar(255),
    post_id integer,
    updated_at datetime,
    created_at datetime, 
    foreign key(user_id) references users(id) on delete cascade on update cascade,
    foreign key(post_id) references posts(id) on delete cascade on update cascade
);

DELIMITER //
CREATE TRIGGER likes_trigger
AFTER INSERT ON hearts
FOR EACH ROW
BEGIN
UPDATE posts 
SET n_like = n_like + 1
WHERE id = new.post_id;
END //
DELIMITER ;


DELIMITER //
CREATE TRIGGER unlikes_trigger
AFTER DELETE ON hearts
FOR EACH ROW
BEGIN
UPDATE posts 
SET n_like = n_like - 1
WHERE id = old.post_id;
END //
DELIMITER ;