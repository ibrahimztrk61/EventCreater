<?php include('server2.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration of activity</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h3>ACTIVITY</h3>
</div>

<form method="post" action="activity.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Activity name</label>
        <input type="text" name="activityname" value="<?php echo $activityname; ?>">
    </div>
    <div class="input-group">
        <label>Count</label>
        <input type="number" name="count" value="<?php echo $count; ?>">
    </div>
    <div class="input-group">
        <label>Location</label>
        <input type="text" name="location" value="<?php echo $location; ?>">
    </div>
    <div class="input-group">
        <label>Date</label>
        <input type="date" name="date" value="<?php echo $date; ?>">
    </div>
    <div class="input-group">
        <label>Clock</label>
        <label>
            <select name="clock">
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option  value="18:00">18:00</option>
                <option  value="19:00">19:00</option>
                <option  value="20:00">20:00</option>
                <option  value="21:00">21:00</option>
                <option  value="22:00">22:00</option>
                <option  value="23:00">23:00</option>
                <option  value="00:00">23:00</option>
            </select>
        </label>
    </div>

    <div class="input-group">
        <button type="submit" class="btn"  name="create"> Create</button>

    <p class="input-group"> <a href="index.php?logout='1'" style="color:#0e84b5;">logout</a> </p>
    </div>
</form>

</body>
</html>