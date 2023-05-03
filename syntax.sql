CREATE TABLE `books`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `isbn` VARCHAR(200) NOT NULL UNIQUE,
    `name` VARCHAR(200) NOT NULL,
    `author` VARCHAR(200) NOT NULL,
    `language` VARCHAR(200) NOT NULL,
    `genre` VARCHAR(200) NOT NULL,
    `published` VARCHAR(200) NOT NULL,
    `file` LONGBLOB NOT NULL,
    `imagename` VARCHAR(200) NOT NULL,
    `imagefile` LONGBLOB NOT NULL,
    PRIMARY KEY(`id`)
);


INSERT INTO `books` (`isbn`, `name`, `author`, `language`, `genre`, `published`, `file`, `imagename`, `imagefile`)
VALUES ('1234567890', 'Book Name', 'Author Name', 'English', 'Fiction', '2022', 'filedata', 'imagename', 'imagedata')
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`), `author` = VALUES(`author`), `language` = VALUES(`language`), `genre` = VALUES(`genre`), `published` = VALUES(`published`), `file` = VALUES(`file`), `imagename` = VALUES(`imagename`), `imagefile` = VALUES(`imagefile`);


CREATE TABLE `books`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `isbn` VARCHAR(200) NOT NULL UNIQUE,
    `name` VARCHAR(200) NOT NULL,
    `author` VARCHAR(200) NOT NULL,
    `language` VARCHAR(200) NOT NULL,
    `genre` VARCHAR(200) NOT NULL,
    `published` VARCHAR(200) NOT NULL,
    `file` LONGBLOB NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE `book_images`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `book_id` INT(11) NOT NULL,
    `imagename` VARCHAR(200) NOT NULL,
    `imagefile` LONGBLOB NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`book_id`) REFERENCES `books`(`id`)
);


