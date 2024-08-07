<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .calendar {
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .calendar-header {
            background: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .calendar-body {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            border-top: 1px solid #ddd;
        }
        .calendar-body div {
            padding: 10px;
            text-align: center;
            border-right: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }
        .calendar-body div:last-child {
            border-right: none;
        }
        .calendar-header div {
            display: inline-block;
            width: 14%;
        }
        .day {
            font-weight: bold;
        }
        .date {
            cursor: pointer;
        }
        .date:hover {
            background: #f0f0f0;
        }
    </style>
</head>
<body>
    <?php
        // Get current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');
        
        // Get the first and last days of the month
        $firstDayOfMonth = "$currentYear-$currentMonth-01";
        $lastDayOfMonth = date('Y-m-t', strtotime($firstDayOfMonth));

        // Get the day of the week for the first day
        $firstDayOfWeek = date('w', strtotime($firstDayOfMonth));

        // Get the number of days in the month
        $daysInMonth = date('t', strtotime($firstDayOfMonth));

        // Calendar headers
        $weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    ?>

    <div class="calendar">
        <div class="calendar-header">
            <div><?php echo date('F Y'); ?></div>
        </div>
        <div class="calendar-body">
            <?php foreach ($weekDays as $day): ?>
                <div class="day"><?php echo $day; ?></div>
            <?php endforeach; ?>

            <?php 
                // Print empty cells for days before the start of the month
                for ($i = 0; $i < $firstDayOfWeek; $i++) {
                    echo '<div></div>';
                }

                // Print the days of the month
                for ($day = 1; $day <= $daysInMonth; $day++) {
                    echo '<div class="date">' . $day . '</div>';
                }
            ?>
        </div>
    </div>
</body>
</html>
