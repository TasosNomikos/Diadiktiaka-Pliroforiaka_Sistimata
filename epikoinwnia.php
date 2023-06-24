
<!DOCTYPE html>
<html>

<head>
    <title>Epikoinwnia</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <?php include 'header.html'; ?>

    <div class="container">
        
        <?php
        // Check if the success parameter is present in the URL
        if (isset($_GET["success"]) && $_GET["success"] == 1) {
            echo '<p class="success-message">Επιτυχής αποστολή μηνύματος</p>';}
        elseif (isset($_GET["success"]) && $_GET["success"] == 2) {
            echo '<p class="success-message">Επιτυχής εγγραφή στο Newsletter</p>';
        }
        ?>

        <h2>Φόρμα Επικοινωνίας</h2>

        

        <form method="POST" action="request_subscribe.php">
          <label for="name">Όνομα</label>
          <input type="text" name="name" id="name" required>
          
          <label for="phone_number">Τηλέφωνο</label>
          <input type="text" name="phone_number" id="phone_number" required>
          
          <label for="department">Τμήμα</label>
          <select name="department" id="department" required>
            <option value="">Διαλέχτε ένα από τα 4 τμήματα</option>
            <option value="Τμήμα Υποστήριξης">Τμήμα Υποστήριξης</option>
            <option value="Τμήμα Πωλήσεων">Τμήμα Πωλήσεων</option>
            <option value="Τμήμα Βλαβών">Τμήμα Βλαβών</option>
            <option value="Λογιστήριο">Λογιστήριο</option>
          </select>
      
          
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required>
          
          <label for="subject">Θέμα</label>
          <input type="text" name="subject" id="subject" required>
          
          <label for="message">Μήνυμα</label>
          <textarea name="message" id="message" required></textarea>
          
          <input type="submit" value="Send Message">
        </form>

        <h2>Εγγραφή στο Newsletter</h2>
        <form method="POST" action="request_subscribe.php">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" required>
          
          <label for="name">Όνομα</label>
          <input type="text" name="name" id="name" required>
          
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required>
          
          <input type="submit" value="Subscribe">
        </form>
    </div>

    <?php include 'footer.html'; ?>
</body>

</html>

