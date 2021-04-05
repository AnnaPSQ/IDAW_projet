
<form action="/action_page.php" id="carform">
  <label for="fname">Firstname:</label>
  <input type="text" id="fname" name="fname">
  <input type="submit">
</form>

<label for="cars">Choose a car:</label>
<select name="cars" id="cars" form="carform">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select>