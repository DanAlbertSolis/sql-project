<!DOCTYPE html>
<html>
<head>
    <title>Create Survey</title>
    <?php include 'header.php'; ?>
</head>
<body>
<div class="container">
        <h1>Create Survey</h1>
        <form action="includes/createsurvey.inc.php" method="POST">
            <label for="survey_name">Survey Name:</label>
            <input type="text" name="survey_name" placeholder="..." required>
            <br>
            <label for="survey_description">Survey Description:</label>
            <input type="text" name="survey_description" placeholder="...">
            <br>
            <label for="start_date">Start Date:</label>
            <input type="datetime-local" name="start_date" required>
            <label for="end_date">End Date:</label>
            <input type="datetime-local"  name="end_date">
            <br>
            <h2>Questions:</ht>
            <div id="questions_container">
                <!-- Question inputs will be dynamically added here -->
            </div>
            <button type="button" onclick="addQuestion()" name="survey_Question">Add Question</button>
            <br>
        </form> 
    </div>

    <script src="jquery-3.2.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        function addQuestion() {
            var questionsContainer = document.getElementById("questions_container");

            var questionDiv = document.createElement("div");
            questionDiv.className = "question";

            var questionLabel = document.createElement("label");
            questionLabel.textContent = "Question:";
            questionDiv.appendChild(questionLabel);

            var questionInput = document.createElement("input");
            questionInput.type = "text";
            questionInput.name = "question[]";
            questionDiv.appendChild(questionInput);

            var br = document.createElement("br");
            questionDiv.appendChild(br);

            var descriptionLabel = document.createElement("label");
            descriptionLabel.textContent = "Description:";
            questionDiv.appendChild(descriptionLabel);

            var descriptionInput = document.createElement("input");
            descriptionInput.type = "text";
            descriptionInput.name = "description[]";
            questionDiv.appendChild(descriptionInput);

            var deleteButton = document.createElement("button");
            deleteButton.type = "button";
            deleteButton.textContent = "Delete";
            deleteButton.onclick = function() {
                questionsContainer.removeChild(questionDiv);
            };
            questionDiv.appendChild(deleteButton);

            questionsContainer.appendChild(questionDiv);
        }
    </script>
</body>
</html>
