create table users( 
    nome varchar(255), 
    cognome varchar(255), 
    email varchar(255),  
    username varchar(255) primary key, 
    indirizzo varchar(255), 
    password varchar(255)
);

create table preferiti(
    username varchar(255),
    razza varchar(255),     
    carica varchar(255),     
    name varchar(255),     
    primary key(username, razza),      
    foreign key(username) references users(username) on delete cascade on update cascade 
);

