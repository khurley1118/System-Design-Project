create table chat(
   time int(11) NOT NULL, 
   name varchar(30) NOT NULL, 
   ip varchar(15) NOT NULL, 
   message varchar(255) NOT NULL, 
   PRIMARY KEY (time)
)