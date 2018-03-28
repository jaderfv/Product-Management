CREATE SCHEMA `productmanagement` ;

CREATE TABLE `productmanagement`.`supplier` (
  `supplierID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  `postCode` VARCHAR(45) NULL,
  `city` VARCHAR(20) NULL,
  PRIMARY KEY (`supplierID`));
  
 CREATE TABLE `productmanagement`.`product` (
  `idProduct` INT NOT NULL AUTO_INCREMENT,
  `productName` VARCHAR(40) NOT NULL,
  `category` VARCHAR(20) NULL,
  `supplierID` INT NULL,
  PRIMARY KEY (`idProduct`),
  INDEX `supplierID_idx` (`supplierID` ASC),
  CONSTRAINT `supplierID`
    FOREIGN KEY (`supplierID`)
    REFERENCES `productmanagement`.`supplier` (`supplierID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

