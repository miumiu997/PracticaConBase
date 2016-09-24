    ##### #####   ##### ##  ## #####  ## ##   
      #   #       #   # # ## # #   #  ## ##
      #   #####   #   # #    # #   #  ## ##
      #   #       ##### #    # #   #  
      #   #####   #   # #    # #####  ## ##
      
      
      ##  ##  ##    ##### #   # #     ##### ##   # #####    ####     ### ### 
      # ## #        #     #   # #     #   # # #  # #   #   #    #   #   #   #
      #    #  ##    #     #   # #     #   # #  # # #   #  #    #    #       #
      #    #  ##    #     #   # #     #   # #   ## #####   #    #     #   #
      #    #  ##    ##### ##### ##### ##### #    # #   #    ####        #

# User/Admin table
CREATE TABLE IF NOT EXISTS `User/Admin` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `User` varchar(50),
  `Password` varchar(30),
  `Type` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) 

# Request table
CREATE TABLE `Request` (
`RequestNumber` int(8) NOT NULL AUTO_INCREMENT, 
`Name` varchar(30), 
`LastName` varchar(30), 
`Cellphone` varchar(30), 
`Email` varchar(50), 
`StartDate` DATE, 
`EndDate` DATE, 
`Company` varchar(50),
`TypeOfEvent` int(8),
`Posted` boolean,
`Logo` LONGBLOB,
`EventName` varchar(100),
`Seen` boolean, 
PRIMARY KEY (`RequestNumber`),
FOREIGN KEY (TypeOfEvent) REFERENCES `TypeOfEvent`(`ID`)
)

# RoomsXDate table
CREATE TABLE `RoomsXDate` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`RequestNumber` int(8), 
`Date` DATE,
`SingleRoom` INT(3),
`DoubleRoom` INT(3),
`Suite` INT(3),
PRIMARY KEY (`ID`),
FOREIGN KEY  (`RequestNumber`) REFERENCES `Request`(`RequestNumber`))

# AvAids table
CREATE TABLE `AvAids` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`Name` varchar(60), 
`Price` INT(5),
PRIMARY KEY (`ID`))

# TypeOfEvent table
CREATE TABLE `TypeOfEvent` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`NameOfEvent` varchar(50),
PRIMARY KEY (`ID`))

# MenuCategory table
CREATE TABLE `MenuCategory` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`Name` varchar(50),
`Image` LONGBLOB,
PRIMARY KEY (`ID`))

# CategoryOption table
CREATE TABLE `CategoryOptions` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`IDMenuCategory` int(8),
`Name` varchar(50),
`Price` int(8),
`Plates` varchar(512),
PRIMARY KEY (`ID`),
FOREIGN KEY (`IDMenuCategory`) REFERENCES `MenuCategory`(`ID`))

# Event table
CREATE TABLE `Event` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`RequestNumber` int(8),
`TypeOfEvent` int(8),
`RoomSetup` int(8),
`Date` DATE,
`StartTime` DATE,
`FinishTime` DATE,
`NumberOfGuests` int(4),
`Tablecloth` varchar(500),
`Amenities` varchar(500),
`CategoryOptions` int(8),
`OtherAvAids` varchar(200),
`Comments` varchar(500),
`Allergy` varchar(500),
PRIMARY KEY (`ID`),
FOREIGN KEY (`RequestNumber`) REFERENCES `Request`(`RequestNumber`),
FOREIGN KEY (`TypeOfEvent`) REFERENCES `TypeOfEvent`(`ID`),
FOREIGN KEY (`RoomSetup`) REFERENCES `RoomSetup`(`ID`),
FOREIGN KEY (`CategoryOptions`) REFERENCES `CategoryOptions`(`ID`))

# AvAidsXEvent table
CREATE TABLE IF NOT EXISTS `AvAidsXEvent` (
  `EventID` int(8) NOT NULL,
  `AvAidID` int(8) NOT NULL,
  PRIMARY KEY (`EventID`,`AvAidID`),
  FOREIGN KEY (`EventID`) REFERENCES `Event`(`ID`),
  FOREIGN KEY (`AvAidID`) REFERENCES `AvAids`(`ID`)
)


#===============================================
# Old

# User/Admin table
CREATE TABLE IF NOT EXISTS `User/Admin` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `User` varchar(50),
  `Password` varchar(30),
  `Type` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) 

# Request table
CREATE TABLE `Request` (
`RequestNumber` int(8) NOT NULL AUTO_INCREMENT, 
`Name` varchar(30), 
`LastName` varchar(30), 
`Cellphone` varchar(30), 
`Email` varchar(50), 
`StartDate` DATE, 
`EndDate` DATE, 
`Comments` varchar (500), 
`Seen` boolean, 
PRIMARY KEY (`RequestNumber`))

# RoomsXDate table
CREATE TABLE `RoomsXDate` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`RequestNumber` int(8), 
`Date` DATE,
`SingleRoom` INT(3),
`DoubleRoom` INT(3),
`Suite` INT(3),
PRIMARY KEY (`ID`),
FOREIGN KEY  (`RequestNumber`) REFERENCES `Request`(`RequestNumber`))

# AV Aids table
CREATE TABLE `AvAids` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`Name` varchar(60), 
`Price` INT(5),
PRIMARY KEY (`ID`))

# TypeOfEvent table
CREATE TABLE `TypeOfEvent` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`NombreDeTipo` varchar(50),
PRIMARY KEY (`ID`))

# Amenities table
CREATE TABLE `Amenities` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`Name` varchar(50),
`Image` LONGBLOB,
PRIMARY KEY (`ID`))

# EventRoom table
CREATE TABLE `EventRoom` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`Name` varchar(50),
`Description` varchar(1000),
`Surface` varchar(10),
`Height` varchar(10),
`Image` LONGBLOB,
`Price` INT (8),
PRIMARY KEY (`ID`))

# RoomSetup table
CREATE TABLE `RoomSetup` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`Name` varchar(50),
`Image` LONGBLOB,
PRIMARY KEY (`ID`))

# TableClothPackage table
CREATE TABLE `TableclothPackage` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`Name` varchar(50),
`Image` LONGBLOB,
PRIMARY KEY (`ID`))

# PackageItem table
CREATE TABLE `PackageItem` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`TableclothPackageId` int(8),
`Name` varchar(50),
`Image` LONGBLOB,
PRIMARY KEY (`ID`),
FOREIGN KEY (`TableclothPackageId`) REFERENCES `TableclothPackage`(`ID`))

# MenuCategory table
CREATE TABLE `MenuCategory` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`Name` varchar(50),
`Image` LONGBLOB,
PRIMARY KEY (`ID`))

# CategoryOption table
CREATE TABLE `CategoryOptions` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`IDMenuCategory` int(8),
`Name` varchar(50),
`Price` int(8),
PRIMARY KEY (`ID`),
FOREIGN KEY (`IDMenuCategory`) REFERENCES `MenuCategory`(`ID`))

# Plates table
CREATE TABLE `Plates` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`IDCategoryOptions` int(8),
`Name` varchar(50),
`Price` int(8),
PRIMARY KEY (`ID`),
FOREIGN KEY (`IDCategoryOptions`) REFERENCES `CategoryOptions`(`ID`))


# SetupXRoom table
CREATE TABLE IF NOT EXISTS `SetupXRoom` (
  `EventSetupID` int(8) NOT NULL,
  `RoomSetupID` int(8) NOT NULL,
  `NumberOfGuests` int(5),
  PRIMARY KEY (`EventSetupID`,`RoomSetupID`),
  FOREIGN KEY (`EventSetupID`) REFERENCES `EventRoom`(`ID`),
  FOREIGN KEY (`RoomSetupID`) REFERENCES `RoomSetup`(`ID`)
)

# Event table
CREATE TABLE `Event` (
`ID` int(8) NOT NULL AUTO_INCREMENT,
`RequestNumber` int(8),
`TypeOfEvent` int(8),
`Date` DATE,
`StartTime` DATE,
`FinishTime` DATE,
`NumberOfGuests` int(4),
`TableclothPackage` int(8),
`OtherTablecloth` varchar(200),
`OtherAmenities` varchar(200),
`CategoryOptions` int(8),
`OtherAvAids` varchar(200),
`Comments` varchar(200),
`Allergy` varchar(500),
PRIMARY KEY (`ID`),
FOREIGN KEY (`RequestNumber`) REFERENCES `Request`(`RequestNumber`),
FOREIGN KEY (`TypeOfEvent`) REFERENCES `TypeOfEvent`(`ID`),
FOREIGN KEY (`TableclothPackage`) REFERENCES `TableclothPackage`(`ID`),
FOREIGN KEY (`CategoryOptions`) REFERENCES `CategoryOptions`(`ID`))

# AvAidsXEvent table
CREATE TABLE IF NOT EXISTS `AvAidsXEvent` (
  `EventID` int(8) NOT NULL,
  `AvAidID` int(8) NOT NULL,
  PRIMARY KEY (`EventID`,`AvAidID`),
  FOREIGN KEY (`EventID`) REFERENCES `Event`(`ID`),
  FOREIGN KEY (`AvAidID`) REFERENCES `AvAids`(`ID`)
)

# AmenitiesXEvent table
CREATE TABLE IF NOT EXISTS `AmenitiesXEvent` (
  `IDEvent` int(8) NOT NULL,
  `IDAmenity` int(8) NOT NULL,
  PRIMARY KEY (`IDEvent`,`IDAmenity`),
  FOREIGN KEY (`IDEvent`) REFERENCES `Event`(`ID`),
  FOREIGN KEY (`IDAmenity`) REFERENCES `Amenities`(`ID`)
)

# EventRoomPerEvents table
CREATE TABLE IF NOT EXISTS `EventRoomPerEvents` (
  `EventID` int(8) NOT NULL,
  `EventRoomID` int(8) NOT NULL,
  `RoomSetupID` int(8) NOT NULL,
  PRIMARY KEY (`EventID`,`EventRoomID`, RoomSetupID),
  FOREIGN KEY (`EventID`) REFERENCES `Event`(`ID`),
  FOREIGN KEY (`EventRoomID`) REFERENCES `EventRoom`(`ID`),
  FOREIGN KEY (`RoomSetupID`) REFERENCES `RoomSetup`(`ID`)
)