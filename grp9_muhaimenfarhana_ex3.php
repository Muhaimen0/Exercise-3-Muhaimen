<?php  
$filename = 'attendance_history.txt';  

$fileLines = [];  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $id = isset($_POST['id']) ? $_POST['id'] : '';  
    $name = isset($_POST['name']) ? $_POST['name'] : '';  
    $password = isset($_POST['password']) ? $_POST['password'] : '';  
    $time = isset($_POST['time']) ? $_POST['time'] : '';  

    $newRecord = "ID: $id | Name: $name | Password: $password | Time: $time\n";  

    if (file_exists($filename)) {  
        $fileContents = file_get_contents($filename);  
    } else {  
        $fileContents = '';  
    }  

    $fileContents .= $newRecord;  
    file_put_contents($filename, $fileContents);  

    $fileLines = file($filename);  
}  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Attendance Form</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            margin: 0;  
            padding: 0;  
            background-color: #4CAF50;  
        }  
        .container {  
            width: 100%;  
            max-width: 600px;  
            margin: 50px auto;  
            padding: 20px;  
            background-color: #fff;  
            border-radius: 8px;  
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
        }  
        h2 {  
            text-align: center;  
            color: #333;  
        }  
        form {  
            display: flex;  
            flex-direction: column;  
        }  
        label {  
            margin-bottom: 5px;  
            font-weight: bold;  
            color: #333;  
        }  
        input[type="text"], input[type="password"], input[type="submit"] {  
            padding: 10px;  
            margin-bottom: 20px;  
            border: 1px solid #ccc;  
            border-radius: 4px;  
            font-size: 16px;  
        }  
        input[type="submit"] {  
            background-color: #4CAF50;  
            color: white;  
            cursor: pointer;  
        }  
        input[type="submit"]:hover {  
            background-color: #45a049;  
        }  
        .file-lines {  
            margin-top: 20px;  
        }  
        table {  
            width: 100%;  
            border-collapse: collapse;  
            margin-top: 20px;  
        }  
        th, td {  
            border: 1px solid #ccc;  
            text-align: left;  
            padding: 8px;  
        }  
        th {  
            background-color: #4CAF50;  
            color: white;  
        }  
        tr:nth-child(even) {  
            background-color: #f2f2f2;  
        }  
    </style>  
</head>  
<body>  

    <div class="container">  
        <h2>Attendance Form</h2>  
        <form method="POST">  
            <label for="id">ID:</label>  
            <input type="text" id="id" name="id" required>  

            <label for="name">Name:</label>  
            <input type="text" id="name" name="name" required>  

            <label for="password">Password:</label>  
            <input type="password" id="password" name="password" required>  

            <label for="time">Time of Entry:</label>  
            <input type="text" id="time" name="time" required placeholder="HH:MM">  

            <input type="submit" value="Submit Attendance">  
        </form>  

        <?php if (!empty($fileLines)): ?>  
            <div class="file-lines">  
                <h3>File Lines:</h3>  
                <table>  
                    <thead>  
                        <tr>  
                            <th>Line Number</th>  
                            <th>Details</th>  
                        </tr>  
                    </thead>  
                    <tbody>  
                        <?php foreach ($fileLines as $lineNumber => $lineContent): ?>  
                            <tr>  
                                <td><?php echo $lineNumber + 1; ?></td>  
                                <td><?php echo htmlspecialchars($lineContent); ?></td>  
                            </tr>  
                        <?php endforeach; ?>  
                    </tbody>  
                </table>  
            </div>  
        <?php endif; ?>  
    </div>  

</body>  
</html> 
