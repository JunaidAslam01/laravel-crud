<head>
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #212529;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #343a40;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        h1 {
            margin: 0;
        }

        form {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #343a40;
            border: 1px solid #343a40;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        a:hover {
            background-color: #495057;
            color: #fff;
        }

        .user-table-container {
            width: 80%;
            margin: 20px auto;
            /* Center the table horizontally */
            border: 1px solid #495057;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-table th,
        .user-table td {
            border: 1px solid #495057;
            padding: 10px;
            text-align: left;
        }

        .user-actions button {
            background-color: #495057;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
            transition: background-color 0.3s;
        }

        .user-actions button:hover {
            background-color: #6c757d;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #fff;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #6c757d;
            border-radius: 5px;
            background-color: #495057;
            color: #fff;
        }

        button.btn-primary {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
        }

        #edit-form {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            /* Adjust the width as needed */
            max-width: 400px;
            /* Adjust the maximum width as needed */
        }

        .alert {
            padding: 10px;
            border: 1px solid;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .alert-success {
            background-color: #28a745;
            border-color: #218838;
            color: #fff;
        }

        .alert-danger {
            background-color: #dc3545;
            border-color: #c82333;
            color: #fff;
        }
    </style>
</head>