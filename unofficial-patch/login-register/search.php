<!DOCTYPE html>
<html>
<head>
    <title>Survey Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <link rel="stylesheet" href="styles.css">
    <?php include 'header.php'; ?>
</head>
<body>
    

    <div class="container">
        <h1>Survey Dashboard</h1>
		
        <?php
        // Include the dbh.inc.php file
        require_once 'includes/dbh.inc.php';

        // Fetch all surveys from the database
        $sql = "SELECT * FROM Surveys";
        $result = mysqli_query($conn, $sql);

        // Check if any surveys exist
        if (mysqli_num_rows($result) > 0) {
            // Surveys exist, display them
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<h2>" . $row['Name'] . "</h2>";
                echo "<p>Description: " . $row['Description'] . "</p>";
                echo "<p>Start Date: " . $row['StartDateTime'] . "</p>";
                echo "<p>End Date: " . $row['EndDateTime'] . "</p>";

                // Fetch questions for the current survey
                $surveyCode = $row['SurveyCode'];
                $questionsSql = "SELECT * FROM Questions WHERE SurveyCode = $surveyCode";
                $questionsResult = mysqli_query($conn, $questionsSql);

                // Check if any questions exist for the survey
                if (mysqli_num_rows($questionsResult) > 0) {
                    echo "<h3>Questions:</h3>";
                    while ($questionRow = mysqli_fetch_assoc($questionsResult)) {
                        echo "<p>Question: " . $questionRow['Name'] . "</p>";

                        // Fetch responses for the current question
                        $questionId = $questionRow['QuestionId'];
                        $responsesSql = "SELECT * FROM Responses WHERE QuestionId = $questionId";
                        $responsesResult = mysqli_query($conn, $responsesSql);

                        // Check if any responses exist for the question
                        if (mysqli_num_rows($responsesResult) > 0) {
                            echo "<h4>Responses:</h4>";
                            while ($responseRow = mysqli_fetch_assoc($responsesResult)) {
                                echo "<p>User ID: " . $responseRow['UserId'] . "</p>";
                                echo "<p>Answer: " . $responseRow['Answer'] . "</p>";
                                // Add more details or formatting for responses if needed
                            }
                        } else {
                            echo "<p>No responses found for this question.</p>";
                        }
                    }
                } else {
                    echo "<p>No questions found for this survey.</p>";
                }

                echo "<hr>";
            }
        } else {
            // No surveys found
            echo "No surveys found.";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

    <script src="jquery-3.2.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>
