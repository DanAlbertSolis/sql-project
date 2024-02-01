-- Populating User table
INSERT INTO Survey.Users (UserId, Username, Password, Email, FirstName, Lastname, Phone, TimeStamp)
VALUES (1,'JohnDoe84','jdoe478&1', 'john.doe@example.com', 'John', 'Doe', 1234567890, null),
       (2, 'beel33', '12345678','bskaik1@csu.fullerton.edu', 'Belal', 'Skaik', 4638033233, null),
       (3, 'nutz', 'asdjhf6', 'jtalamayan@csu.fullerton.edu','Joel','Talamayan', 7497148186, null),
       (4, 'KornTortila', 'cjvnruibn@&', 'ragundez@csu.fullerton.edu','Ryan', 'Agundez', 6244176137, null),
       (5, 'dappy9', 'euhfsya3781', 'dansolis9@csu.fullerton.edu', 'Dan', 'Solis', 6557200651, null),
       (6, 'RoRunna', '48589371!!', 'rohankunchala123@gmail.com', 'Rohan', 'Kunchala', 4632914660, null);

-- Populating Statuses
INSERT INTO Survey.Statuses (StatusId, Name, TimeStamp)
VALUES (1, 'Active', null),
       (0, 'Closed', null),
       (2, 'Cancelled', null);

-- Populating Surveys
INSERT INTO Survey.Surveys (SurveyCode, Name, Description, StartDateTime, EndDateTime, UserId, StatusId)
VALUES (1, 'Customer Service', 'A survey about customer service', '2023-05-08 00:00:00', '2023-05-09 00:00:00', 1, 1),
       (2, 'Computer Usage', 'A survey about customer service', '2023-05-08 00:00:00', '2023-05-09 00:00:00', 1, 0),
       (3, 'Climate Change', 'A survey about climate change', '2023-05-08 00:00:00', '2023-05-09 00:00:00', 1, 2);

-- Populating QuestionTypes
INSERT INTO Survey.QuestionTypes (QuestionTypeId, Name, Description)
VALUES (1, 'Multiple Choice', 'Select one from a list of choices'),
       (2, 'Multiple Answers', 'Select one or more answers from the list of options.'),
       (3, 'Yes/No', 'Select Yes or No'),
       (4, 'Essay', 'Enter anything into the answer textbox');

-- Populating Questions
INSERT INTO Survey.Questions (QuestionId, Name, Description, SurveyCode, QuestionTypeId)
VALUES (1, 'Product Quality', 'How satisfied are you with the quality of our products?', 1, 1),
       (2, 'Computer Usage', 'How long do you spend a day on the computer?', 2, 1),
       (3, 'Climate Change', 'Do you believe in climate change?', 3, 3);

-- Populating AnswerChoices
INSERT INTO Survey.AnswerChoices (AnswerChoiceId, Answer, QuestionId)
VALUES (1, 'Very satisfied', 1),
       (2, 'Satisfied', 1),
       (3, 'Neutral', 1),
       (4, 'Dissatisfied', 1),
       (5, 'Very dissatisfied', 1),
       (6, '1-3 Hours', 2),
       (7, '4-6 Hours', 2),
       (8, '7+ Hours', 2),
       (9, 'Yes', 3),
       (10, 'No', 3);

-- Populating Responses
INSERT INTO Survey.Responses (QuestionId, UserId, AnswerOptionId, Answer)
VALUES (1, 1, 2, 'Satisfied'),
       (2, 5, 7, '4-6 Hours'),
       (2, 2, 6, '1-3 Hours'),
       (2, 3, 7, '4-6 Hours'),
       (2, 4, 6, '1-3 Hours'),
       (2, 6, 7, '4-6 Hours'),
       (3, 2, 9, 'Yes'),
       (3, 4, 10, 'No'),
       (3, 6, 9, 'Yes'),
       (3, 3, 10, 'No');
