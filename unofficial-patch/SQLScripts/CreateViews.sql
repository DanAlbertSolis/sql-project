USE Survey;

DROP VIEW IF EXISTS FrequentResponder;
CREATE VIEW FrequentResponder AS
SELECT U.FirstName, U.LastName, U.Email, U.Phone
FROM Users AS U, Responses AS R
WHERE U.UserId = R.UserId
GROUP BY U.UserId
HAVING COUNT(*) >  10;

SELECT * FROM FrequentResponder;

DROP VIEW IF EXISTS FrequentlyRespondedSurveys;
CREATE VIEW FrequentlyRespondedSurveys AS
SELECT S.Name
FROM Surveys AS S, Questions AS Q
WHERE S.SurveyCode = Q.SurveyCode AND Q.SurveyCode IN (
	SELECT DISTINCT Q.SurveyCode
    FROM Questions AS Q, Responses As R
    WHERE Q.QuestionId = R.QuestionId)
GROUP BY S.SurveyCode
HAVING COUNT(*) > 10;

SELECT * FROM FrequentlyRespondedSurveys;

DROP VIEW IF EXISTS ManyQuestions;
CREATE VIEW ManyQuestions AS
SELECT S.Name, S.SurveyCode
FROM Surveys AS S, Questions AS Q
WHERE S.SurveyCode = Q.SurveyCode
GROUP BY S.SurveyCode
HAVING COUNT(*) >  10;

SELECT * FROM ManyQuestions;

DROP VIEW IF EXISTS RemovedSurveys;
CREATE VIEW RemovedSurveys AS
SELECT S.Name
FROM Surveys AS S, Statuses AS ST
WHERE S.StatusId = ST.StatusId AND ST.Name = 'Removed';