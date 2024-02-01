<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <?php include 'header.php'; ?>
    <style>
        .survey-card {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .survey-card h3 {
            font-size: 18px;
            margin-top: 0;
        }

        .survey-card p {
            margin-bottom: 10px;
        }

        .survey-card a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .survey-card a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h1>My Surveys</h1>

<?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="survey-card">
        <h3><?php echo $row['Name']; ?></h3>
        <p><?php echo $row['Description']; ?></p>
        <a href="survey.php?survey_code=<?php echo $row['SurveyCode']; ?>">Take Survey</a>
    </div>
<?php endwhile; ?>

    <script src="jquery-3.2.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>
