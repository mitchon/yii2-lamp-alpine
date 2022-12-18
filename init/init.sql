CREATE TABLE IF NOT EXISTS db.post (
                                    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                    name text NOT NULL,
                                    description text NOT NULL,
                                    image text NOT NULL,
                                    content text NOT NULL,
                                    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);