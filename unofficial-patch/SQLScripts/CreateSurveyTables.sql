DROP DATABASE IF EXISTS Survey;
CREATE DATABASE Survey;
USE Survey;

CREATE TABLE Users(
	UserId			INT NOT NULL UNIQUE AUTO_INCREMENT,
    Username		VARCHAR(30) NOT NULL UNIQUE,
    Password		VARCHAR(120) NOT NULL,
    Email			VARCHAR(30) NOT NULL UNIQUE,
    FirstName		VARCHAR(15) NOT NULL,
    LastName		VARCHAR(15) NOT NULL,
    Phone			INT NOT NULL,
    TimeStamp		TIMESTAMP DEFAULT(NOW()),
    PRIMARY KEY(UserId)
);

CREATE TABLE Statuses(
	StatusId		INT NOT NULL UNIQUE,
    Name			VARCHAR(15) NOT NULL,
    TimeStamp		timestamp DEFAULT(NOW()),
    PRIMARY KEY(StatusId)
);

CREATE TABLE Surveys(
	SurveyCode		INT NOT NULL UNIQUE AUTO_INCREMENT,
    Name			VARCHAR(15) NOT NULL,
    Description		VARCHAR(50),
    StartDateTime	TIMESTAMP NOT NULL,
    EndDateTime		TIMESTAMP DEFAULT(NOW()),
    UserId			INT NOT NULL,
    StatusId		INT NOT NULL,
    TimeStamp		TIMESTAMP DEFAULT(NOW()),
    PRIMARY KEY(SurveyCode),
    FOREIGN KEY(UserId) REFERENCES Users(UserId),
    FOREIGN KEY(StatusId) REFERENCES Statuses(StatusId)
);

CREATE TABLE QuestionTypes(
	QuestionTypeId	INT NOT NULL UNIQUE AUTO_INCREMENT,
    Name			VARCHAR(15) NOT NULL,
    Description		VARCHAR(50),
    TimeStamp		TIMESTAMP DEFAULT(NOW()),
    PRIMARY KEY(QuestionTypeId)
);

CREATE TABLE Questions(
	QuestionId		INT NOT NULL UNIQUE AUTO_INCREMENT,
    Name			VARCHAR(15) NOT NULL,
    Description		VARCHAR(50),
    SurveyCode		INT NOT NULL,
    QuestionTypeId	INT NOT NULL,
    TimeStamp		TIMESTAMP DEFAULT(NOW()),
    PRIMARY KEY(QuestionId),
    FOREIGN KEY(SurveyCode) REFERENCES Surveys(SurveyCode),
    FOREIGN KEY(QuestionTypeId) REFERENCES QuestionTypes(QuestionTypeId)
);

CREATE TABLE AnswerChoices(
	AnswerChoiceId	INT NOT NULL UNIQUE AUTO_INCREMENT,
    Answer			VARCHAR(30) NOT NULL,
    QuestionId		INT NOT NULL,
    TimeStamp		TIMESTAMP DEFAULT(NOW()),
    PRIMARY KEY(AnswerChoiceId),
    FOREIGN KEY(QuestionId) REFERENCES Questions(QuestionId)
);

CREATE TABLE Responses(
	QuestionId		INT NOT NULL,
    UserId			INT NOT NULL,
    AnswerOptionId	INT NOT NULL,
    Answer			VARCHAR(30),
    TimeStamp		TIMESTAMP DEFAULT(NOW()),
    PRIMARY KEY(QuestionId, UserId),
    FOREIGN KEY(QuestionId) REFERENCES Questions(QuestionId),
    FOREIGN KEY(UserId) REFERENCES Users(UserId),
    FOREIGN KEY(AnswerOptionId) REFERENCES AnswerChoices(AnswerChoiceId)
);