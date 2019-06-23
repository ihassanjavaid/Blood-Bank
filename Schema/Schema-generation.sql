-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bb` DEFAULT CHARACTER SET utf8 ;
USE `bb` ;

-- -----------------------------------------------------
-- Table `bb`.`Contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Contact` (
  `ContactID` INT NOT NULL,
  `address` VARCHAR(45) NULL,
  `phoneNo` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `country` VARCHAR(45) NULL,
  PRIMARY KEY (`ContactID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`Person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Person` (
  `CNIC` INT NOT NULL,
  `FirstName` VARCHAR(45) NULL,
  `LastName` VARCHAR(45) NULL,
  `DOB` DATE NULL,
  `Gender` ENUM("M", "F") NULL,
  `Age` INT NULL,
  `Contact_ContactID` INT NOT NULL,
  PRIMARY KEY (`CNIC`, `Contact_ContactID`),
  UNIQUE INDEX `CNIC_UNIQUE` (`CNIC` ASC)   ,
  INDEX `fk_Person_Contact1_idx` (`Contact_ContactID` ASC)   ,
  CONSTRAINT `fk_Person_Contact1`
    FOREIGN KEY (`Contact_ContactID`)
    REFERENCES `bb`.`Contact` (`ContactID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`BloodBank`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`BloodBank` (
  `BloodBankID` INT NOT NULL,
  `storageCapacity` INT NULL,
  `BloodBankcol` VARCHAR(45) NULL,
  PRIMARY KEY (`BloodBankID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`Branch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Branch` (
  `BranchID` INT NOT NULL,
  `branchName` VARCHAR(45) NULL,
  `branchCapacity` INT NULL,
  `Branchcol` VARCHAR(45) NULL,
  `BloodBank_BloodBankID` INT NOT NULL,
  `Contact_ContactID` INT NOT NULL,
  PRIMARY KEY (`BranchID`, `Contact_ContactID`),
  INDEX `fk_Branch_BloodBank1_idx` (`BloodBank_BloodBankID` ASC)   ,
  INDEX `fk_Branch_Contact1_idx` (`Contact_ContactID` ASC)   ,
  CONSTRAINT `fk_Branch_BloodBank1`
    FOREIGN KEY (`BloodBank_BloodBankID`)
    REFERENCES `bb`.`BloodBank` (`BloodBankID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Branch_Contact1`
    FOREIGN KEY (`Contact_ContactID`)
    REFERENCES `bb`.`Contact` (`ContactID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`Cost`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Cost` (
  `CostID` INT NOT NULL,
  `cost` INT NULL,
  PRIMARY KEY (`CostID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`BloodGroup`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`BloodGroup` (
  `GroupID` INT NOT NULL,
  `group` ENUM("O-positive", "A-positive", "B-positive", "O-negative", "A-negative", "B-negative", "AB-Positive", "AB-Negative") NULL,
  `Availability` ENUM("1", "2", "3") NULL,
  `Cost_CostID` INT NOT NULL,
  PRIMARY KEY (`GroupID`),
  INDEX `fk_BloodGroup_Cost1_idx` (`Cost_CostID` ASC)   ,
  CONSTRAINT `fk_BloodGroup_Cost1`
    FOREIGN KEY (`Cost_CostID`)
    REFERENCES `bb`.`Cost` (`CostID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`Donor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Donor` (
  `donorID` INT NOT NULL,
  `historyDescrption` VARCHAR(100) NULL,
  `Person_CNIC` INT NOT NULL,
  `Branch_BranchID` INT NOT NULL,
  `Branch_Contact_ContactID` INT NOT NULL,
  `BloodGroup_GroupID` INT NOT NULL,
  PRIMARY KEY (`donorID`, `Person_CNIC`, `Branch_BranchID`, `Branch_Contact_ContactID`),
  INDEX `fk_Donor_Person1_idx` (`Person_CNIC` ASC)   ,
  INDEX `fk_Donor_Branch1_idx` (`Branch_BranchID` ASC, `Branch_Contact_ContactID` ASC)   ,
  INDEX `fk_Donor_BloodGroup1_idx` (`BloodGroup_GroupID` ASC)   ,
  CONSTRAINT `fk_Donor_Person1`
    FOREIGN KEY (`Person_CNIC`)
    REFERENCES `bb`.`Person` (`CNIC`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Donor_Branch1`
    FOREIGN KEY (`Branch_BranchID` , `Branch_Contact_ContactID`)
    REFERENCES `bb`.`Branch` (`BranchID` , `Contact_ContactID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Donor_BloodGroup1`
    FOREIGN KEY (`BloodGroup_GroupID`)
    REFERENCES `bb`.`BloodGroup` (`GroupID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`Employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Employee` (
  `empID` INT NOT NULL,
  `Designation` VARCHAR(45) NULL,
  `Scale` VARCHAR(45) NULL,
  `JoiningDate` DATE NULL,
  `Manager_empID` INT NOT NULL,
  `Person_CNIC` INT NOT NULL,
  `Branch_BranchID` INT NOT NULL,
  `Branch_Contact_ContactID` INT NOT NULL,
  PRIMARY KEY (`empID`, `Manager_empID`, `Person_CNIC`),
  INDEX `fk_Employee_Employee_idx` (`Manager_empID` ASC)   ,
  INDEX `fk_Employee_Person1_idx` (`Person_CNIC` ASC)   ,
  INDEX `fk_Employee_Branch1_idx` (`Branch_BranchID` ASC, `Branch_Contact_ContactID` ASC)   ,
  CONSTRAINT `fk_Employee_Employee`
    FOREIGN KEY (`Manager_empID`)
    REFERENCES `bb`.`Employee` (`empID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employee_Person1`
    FOREIGN KEY (`Person_CNIC`)
    REFERENCES `bb`.`Person` (`CNIC`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employee_Branch1`
    FOREIGN KEY (`Branch_BranchID` , `Branch_Contact_ContactID`)
    REFERENCES `bb`.`Branch` (`BranchID` , `Contact_ContactID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`Hospital`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Hospital` (
  `HospitalID` INT NOT NULL,
  `Hospitalname` VARCHAR(45) NULL,
  `Contact_ContactID` INT NOT NULL,
  PRIMARY KEY (`HospitalID`),
  INDEX `fk_Hospital_Contact1_idx` (`Contact_ContactID` ASC)   ,
  CONSTRAINT `fk_Hospital_Contact1`
    FOREIGN KEY (`Contact_ContactID`)
    REFERENCES `bb`.`Contact` (`ContactID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`Patient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Patient` (
  `PatientID` INT NOT NULL,
  `historyDescription` VARCHAR(100) NULL,
  `Person_CNIC` INT NOT NULL,
  `BloodGroup_GroupID` INT NOT NULL,
  `Hospital_HospitalID` INT NOT NULL,
  PRIMARY KEY (`PatientID`, `Person_CNIC`),
  INDEX `fk_Patient_Person1_idx` (`Person_CNIC` ASC)   ,
  INDEX `fk_Patient_BloodGroup1_idx` (`BloodGroup_GroupID` ASC)   ,
  INDEX `fk_Patient_Hospital1_idx` (`Hospital_HospitalID` ASC)   ,
  CONSTRAINT `fk_Patient_Person1`
    FOREIGN KEY (`Person_CNIC`)
    REFERENCES `bb`.`Person` (`CNIC`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Patient_BloodGroup1`
    FOREIGN KEY (`BloodGroup_GroupID`)
    REFERENCES `bb`.`BloodGroup` (`GroupID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Patient_Hospital1`
    FOREIGN KEY (`Hospital_HospitalID`)
    REFERENCES `bb`.`Hospital` (`HospitalID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`BloodType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`BloodType` (
  `BloodTypeID` INT NOT NULL,
  `typeOfBlood` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `Cost_CostID` INT NOT NULL,
  PRIMARY KEY (`BloodTypeID`),
  INDEX `fk_BloodType_Cost1_idx` (`Cost_CostID` ASC)   ,
  CONSTRAINT `fk_BloodType_Cost1`
    FOREIGN KEY (`Cost_CostID`)
    REFERENCES `bb`.`Cost` (`CostID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`Blood`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Blood` (
  `BloodID` INT NOT NULL,
  `recievalDate` DATE NULL,
  `expiryDate` DATE NULL,
  `Bloodcol` VARCHAR(45) NULL,
  `BloodGroup_GroupID` INT NOT NULL,
  `BloodBank_BloodBankID` INT NOT NULL,
  `BloodType_BloodTypeID` INT NOT NULL,
  PRIMARY KEY (`BloodID`),
  INDEX `fk_Blood_BloodGroup1_idx` (`BloodGroup_GroupID` ASC)   ,
  INDEX `fk_Blood_BloodBank1_idx` (`BloodBank_BloodBankID` ASC)   ,
  INDEX `fk_Blood_BloodType1_idx` (`BloodType_BloodTypeID` ASC)   ,
  CONSTRAINT `fk_Blood_BloodGroup1`
    FOREIGN KEY (`BloodGroup_GroupID`)
    REFERENCES `bb`.`BloodGroup` (`GroupID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Blood_BloodBank1`
    FOREIGN KEY (`BloodBank_BloodBankID`)
    REFERENCES `bb`.`BloodBank` (`BloodBankID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Blood_BloodType1`
    FOREIGN KEY (`BloodType_BloodTypeID`)
    REFERENCES `bb`.`BloodType` (`BloodTypeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`Hospital_has_BloodBank`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Hospital_has_BloodBank` (
  `Hospital_HospitalID` INT NOT NULL,
  `BloodBank_BloodBankID` INT NOT NULL,
  PRIMARY KEY (`Hospital_HospitalID`, `BloodBank_BloodBankID`),
  INDEX `fk_Hospital_has_BloodBank_BloodBank1_idx` (`BloodBank_BloodBankID` ASC)   ,
  INDEX `fk_Hospital_has_BloodBank_Hospital1_idx` (`Hospital_HospitalID` ASC)   ,
  CONSTRAINT `fk_Hospital_has_BloodBank_Hospital1`
    FOREIGN KEY (`Hospital_HospitalID`)
    REFERENCES `bb`.`Hospital` (`HospitalID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hospital_has_BloodBank_BloodBank1`
    FOREIGN KEY (`BloodBank_BloodBankID`)
    REFERENCES `bb`.`BloodBank` (`BloodBankID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bb`.`Payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bb`.`Payment` (
  `PaymentID` INT NOT NULL,
  `payment` INT NULL,
  `Paymentcol` VARCHAR(45) NULL,
  `Patient_PatientID` INT NOT NULL,
  `Patient_Person_CNIC` INT NOT NULL,
  `Employee_empID` INT NOT NULL,
  `Employee_Manager_empID` INT NOT NULL,
  `Employee_Person_CNIC` INT NOT NULL,
  `Branch_BranchID` INT NOT NULL,
  `Branch_Contact_ContactID` INT NOT NULL,
  PRIMARY KEY (`PaymentID`),
  INDEX `fk_Payment_Patient1_idx` (`Patient_PatientID` ASC, `Patient_Person_CNIC` ASC)   ,
  INDEX `fk_Payment_Employee1_idx` (`Employee_empID` ASC, `Employee_Manager_empID` ASC, `Employee_Person_CNIC` ASC)   ,
  INDEX `fk_Payment_Branch1_idx` (`Branch_BranchID` ASC, `Branch_Contact_ContactID` ASC)   ,
  CONSTRAINT `fk_Payment_Patient1`
    FOREIGN KEY (`Patient_PatientID` , `Patient_Person_CNIC`)
    REFERENCES `bb`.`Patient` (`PatientID` , `Person_CNIC`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Payment_Employee1`
    FOREIGN KEY (`Employee_empID` , `Employee_Manager_empID` , `Employee_Person_CNIC`)
    REFERENCES `bb`.`Employee` (`empID` , `Manager_empID` , `Person_CNIC`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Payment_Branch1`
    FOREIGN KEY (`Branch_BranchID` , `Branch_Contact_ContactID`)
    REFERENCES `bb`.`Branch` (`BranchID` , `Contact_ContactID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
