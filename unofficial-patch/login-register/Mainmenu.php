<!DOCTYPE html>
<html>
    <head>
        <title>MagicSurvey-menu</title>
        <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
        <style>
			.main-menu {
			display: flex;
			justify-content: center;
			}

			.container {
			max-width: 200px;
			margin: 0 auto;
			padding: 20px;
			background-color: rgba(50, 50, 50, 0.5);
			box-shadow: 0 0 10px rgba(42, 42, 42, 0.2);
			display: flex;
			flex-direction: column;
			align-items: center;
			}
		.form-group{
		    margin-bottom:30px;
		}
		Form{
			margin-bottom: 10px
		}
		label {
		    display: block;
		    margin-bottom: 5px;
		    font-weight: bold;
		}
		input[type="submit"] {
		    background-color: blue;
		    color: white;
		    border: none;
		    padding: 10px 20px;
		    border-radius: 9px;
		    font-size: 20px;
		    cursor: pointer;
		    margin: 2 auto;
		}
		input[type="submit"]:hover {
		    background-color: darkblue;
		}
		button{

		}
        </style>
    </head>
    <body>
    <div class="main-menu">
            <h1 align="center">Magic Survey</h1>
        </div>
        <div class ="container">
        <form action = "Index.php">
                <input type="submit" value="Search Surveys" class="button">
            </form>
        </div>

    </body>
</html>
