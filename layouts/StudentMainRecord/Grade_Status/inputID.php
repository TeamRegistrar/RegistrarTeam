<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification of Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .search-section {
            background: white;
            padding: 40px 60px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }

        .label {
            display: block;
            font-size: 16px;
            margin-bottom: 10px;
            color: #333;
            text-align: 30%;
        }

        .student-id-input {
            width: 50%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }

        .proceed-button {
            background-color: #002855;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            width: 53%;
            transition: background-color 0.3s ease;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="search-section">
            <label for="student-id" class="label">Student ID</label>
            <input id="student-id" type="text" placeholder="Enter Student ID" class="student-id-input">
            <button class="proceed-button">Proceed</button>
        </div>
    </div>
</body>
</html>
