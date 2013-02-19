create table tbl_user_role(
      id INTEGER NOT NULL primary key AUTO_INCREMENT,
      user_id INTEGER NOT NULL,
      role VARCHAR(64) NOT NULL,
      foreign key (user_id) references tbl_user (id),
      foreign key (role) references AuthItem (name)
);
