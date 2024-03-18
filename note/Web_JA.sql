CREATE TABLE `Role` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(20)
);

CREATE TABLE `User` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `idRole` int,
  `fullname` varchar(50),
  `email` varchar(50),
  `phone` varchar(15),
  `address` varchar(50),
  `password` varchar(50),
  `createAt` datetime,
  `updateAt` datetime
);

CREATE TABLE `Favourite_Product` (
  `idUser` int,
  `idProduct` int,
  `createAt` datetime,
  `updateAt` datetime
);

CREATE TABLE `Feedbacks` (
  `idFeedback` int PRIMARY KEY AUTO_INCREMENT,
  `idUser` int,
  `idProduct` int,
  `rate` decimal(18,0),
  `content` varchar(255),
  `createAt` datetime,
  `updateAt` datetime
);

CREATE TABLE `Contact` (
  `idContact` int PRIMARY KEY AUTO_INCREMENT,
  `idUser` int,
  `topic` varchar(255),
  `content` varchar(255),
  `createAt` datetime,
  `updateAt` datetime
);

CREATE TABLE `Cart` (
  `idCart` int PRIMARY KEY AUTO_INCREMENT,
  `idUser` int,
  `status` varchar(255),
  `payments` varchar(120),
  `createAt` datetime,
  `updateAt` datetime
);

CREATE TABLE `Cart_Detail` (
  `idCart` int,
  `idProduct` int,
  `quanity` char(20),
  `createAt` datetime,
  `updateAt` datetime
);

CREATE TABLE `Category` (
  `idCategory` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50)
);

CREATE TABLE `Product` (
  `idProduct` int PRIMARY KEY AUTO_INCREMENT,
  `idCategory` int,
  `name` varchar(20),
  `image` varchar(255),
  `costPrice` varchar(50),
  `sellPrice` varchar(50),
  `describe` varchar(255),
  `analysis` varchar(255),
  `trandemark` varchar(50),
  `sellNumber` char,
  `createAt` datetime,
  `updateAt` datetime
);

CREATE TABLE `News` (
  `idNew` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `content` varchar(255),
  `image` varchar(255),
  `description` varchar(255),
  `createAt` datetime,
  `updateeAt` datetime
);

CREATE TABLE `Therapy` (
  `idTherapy` int PRIMARY KEY AUTO_INCREMENT,
  `content` varchar(255),
  `image` varchar(255),
  `description` varchar(255),
  `createAt` datetime,
  `updateAt` datetime
);

CREATE TABLE `Train` (
  `idTrain` int PRIMARY KEY AUTO_INCREMENT,
  `content` varchar(255),
  `description` varchar(255),
  `method` varchar(255),
  `createAt` datetime,
  `updateAt` datetime
);

ALTER TABLE `User` ADD FOREIGN KEY (`idRole`) REFERENCES `Role` (`id`);

ALTER TABLE `Favourite_Product` ADD FOREIGN KEY (`idUser`) REFERENCES `User` (`id`);

ALTER TABLE `Favourite_Product` ADD FOREIGN KEY (`idProduct`) REFERENCES `Product` (`idProduct`);

ALTER TABLE `Feedbacks` ADD FOREIGN KEY (`idUser`) REFERENCES `User` (`id`);

ALTER TABLE `Feedbacks` ADD FOREIGN KEY (`idProduct`) REFERENCES `Product` (`idProduct`);

ALTER TABLE `Cart` ADD FOREIGN KEY (`idUser`) REFERENCES `User` (`id`);

ALTER TABLE `Cart_Detail` ADD FOREIGN KEY (`idCart`) REFERENCES `Cart` (`idCart`);

ALTER TABLE `Cart_Detail` ADD FOREIGN KEY (`idProduct`) REFERENCES `Product` (`idProduct`);

ALTER TABLE `Product` ADD FOREIGN KEY (`idCategory`) REFERENCES `Category` (`idCategory`);

ALTER TABLE `Contact` ADD FOREIGN KEY (`idUser`) REFERENCES `User` (`id`);
