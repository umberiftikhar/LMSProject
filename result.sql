USE  project;
CREATE TABLE result(
resultid INT AUTO_INCREMENT PRIMARY KEY,
StudentID INT NOT NULL,
Course ENUM('oop','auto','dbstruct','os') NOT NULL,
papertype ENUM('short','obj','long','assign') NOT NULL,
pointsperquestion INT NOT NULL,
totalpoints INT NOT NULL,
obtainedmarks INT NOT NULL
);