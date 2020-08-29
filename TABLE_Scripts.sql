CREATE TABLE `users` (
 `Id` int(11)  NOT NULL,
 `Username` varchar(255) NOT NULL,
 `Password` varchar(255) NOT NULL,
 `Dob` date NOT NULL,
 `Email` varchar(255) DEFAULT NULL,
 `Gender` varchar(1) NOT NULL,
 `ContactNo` int(10) NOT NULL,
 `Place` varchar(255) NOT NULL
);


CREATE TABLE `user_data` (
 `User_ID` int(11) NOT NULL,
 `data` varchar(11) NOT NULL
) ;


