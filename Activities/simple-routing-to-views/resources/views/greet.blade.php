<!DOCTYPE html>
<html>
<head>
    <title>Laravel Greeting</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #6e8efb, #4a6cf7);
            color: white;
        }

        .container {
            text-align: center;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 0.5em;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInDown 0.8s forwards;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 2em;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s forwards 0.3s;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1.1em;
            background-color: white;
            color: #4a6cf7;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        @keyframes fadeInDown {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .time {
            margin-top: 2em;
            font-size: 0.9em;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello from Laravel!</h1>
        <p>Welcome to this beautifully styled greeting page.</p>
        <button class="btn" onclick="showMessage()">Click Me!</button>
        <div class="time" id="currentTime"></div>
    </div>

    <script>
        function showMessage() {
            alert('Thank you for visiting our Laravel application!');
        }

        // Update time every second
        function updateTime() {
            const timeElement = document.getElementById('currentTime');
            const now = new Date();
            const timeString = now.toLocaleTimeString();
            timeElement.textContent = `Current Time: ${timeString}`;
        }

        // Initialize time and update every second
        updateTime();
        setInterval(updateTime, 1000);
    </script>
</body>
</html>