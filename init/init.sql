CREATE TABLE IF NOT EXISTS db.post (
                                    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                    name text NOT NULL,
                                    description text NOT NULL,
                                    image text NOT NULL,
                                    content text NOT NULL,
                                    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO db.post (name, description, image, content) VALUES
                                                         ('123', '123', 'Screenshot from 2022-11-27 18-53-33.png', '<p>123123</p>\r\n'),
                                                         ('123', '123', 'Screenshot from 2022-11-27 18-52-30.png', '<p>123123</p>\r\n'),
                                                         ('123', '123', 'Screenshot from 2022-11-25 00-11-26.png', '<p>123123</p>\r\n');