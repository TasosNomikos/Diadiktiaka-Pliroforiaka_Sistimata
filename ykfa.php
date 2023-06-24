
<!DOCTYPE html>
<html>
<head>
  <title>Υπολογισμός Κόστους Κατανάλωσης Φυσικού Αερίου</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

  <style>
    input[type="number"] {
        display: block;
        margin-bottom: 10px;
        padding: 10px;
        width: 100%;
    }

    input[type="submit"] {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .ykfa-form {
        padding: 40px 0;
        margin-bottom: 60px;
    }
    form.form-inner {
        max-width: 300px;
        margin: auto;
    }
  </style>
</head>
<body>
  <?php include 'header.html'; ?>
  <h3 class="project-h3">Υπολογισμός Κόστους Κατανάλωσης Φυσικού Αερίου</h3>
  <div class="ykfa-form who-we-are">
    <form class="form-inner">
        <label class="ykfa-label" for="kwh">Κατανάλωση σε Κιλοβατώρες (kWh):</label>
        <input class="ykfa-input" type="number" id="kwh" name="kwh" required><br><br>

        <label class="ykfa-label" for="days">Πλήθος Ημερών:</label>
        <input class="ykfa-input" type="number" id="days" name="days" required><br><br>

        <label class="ykfa-label" for="area">Τετραγωνικά Μέτρα (τμ):</label>
        <input class="ykfa-input" type="number" id="area" name="area" required><br><br>

        <input class="submit-btn" type="submit" value="Υπολογισμός">
    </form>

    <h3 id="result"></h3>
  </div>


  <?php include 'footer.html'; ?>

  <script>
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      const kwh = parseFloat(document.querySelector('#kwh').value);
      const days = parseFloat(document.querySelector('#days').value);
      const area = parseFloat(document.querySelector('#area').value);

      const costMunicipality = calculateCostMunicipality(area, days);
      const costServices = calculateCostServices(kwh, days);
      const totalCost = calculateTotalCost(kwh);

      const finalCost = costMunicipality + costServices + totalCost;
      document.querySelector('#result').textContent = 'Τελικό Ποσό Χρέωσης: ' + finalCost.toFixed(2) + ' €';
    });

    function calculateCostMunicipality(area, days) {
      let cost = 0;
      if (area <= 50) {
        cost = 0.12;
      } else if (area > 50 && area <= 90) {
        cost = 0.20;
      } else {
        cost = 0.31;
      }
      return area * cost * (days / 365);
    }

    function calculateCostServices(kwh, days) {
      let cost = 0;
      if (kwh <= 1600) {
        cost = 0.01315;
      } else if (kwh > 1600 && kwh <= 2000) {
        cost = 0.01480;
      } else {
        cost = 0.01625;
      }
      return kwh * cost * (days / 365);
    }

    function calculateTotalCost(kwh) {
      let cost = 0;
      if (kwh <= 1600) {
        cost = 0.00623;
      } else if (kwh > 1600 && kwh <= 2000) {
        cost = 0.00768;
      } else {
        cost = 0.00915;
      }
      return kwh * cost;
    }
  </script>
</body>
</html>