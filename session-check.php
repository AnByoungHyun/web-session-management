<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>세션 확인</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .session-info {
            background-color: white;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .session-id {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 10px;
        }
        .session-data div {
            padding: 8px;
            border-bottom: 1px solid #eee;
        }
        .button-group {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .input-form {
            margin: 20px 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }
        .form-group input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>WAS SERVER: <?php echo gethostname(); ?></h1>

        <div class="session-info">
            <?php
                session_start();

                if(session_status() == PHP_SESSION_ACTIVE) {
                    echo "<div class='session-id'>세션 ID: " . session_id() . "</div>";
                    if(isset($_SESSION["id"])) {
                        echo "<div class='session-data'>";
                        echo "<div>아이디: " . $_SESSION["id"] . "</div>";
                        echo "<div>이름: " . $_SESSION["name"] . "</div>";
                        echo "<div>타입: " . $_SESSION["type"] . "</div>";
                        echo "</div>";
                    } else {
                        echo "<div class='input-form'>";
                        echo "<form action='session-create.php' method='post'>";
                        echo "<div class='form-group'>";
                        echo "<label for='username'>사용자 이름:</label>";
                        echo "<input type='text' id='username' name='username' required>";
                        echo "</div>";
                        echo "<button type='submit'>세션 생성</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                } else {
                    echo "<div>세션이 없습니다.</div>";
                }
            ?>
        </div>

        <div class="button-group">
            <?php if(isset($_SESSION["id"])) { ?>
                <form action="session-delete.php">
                    <button type="submit">세션 삭제</button>
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
