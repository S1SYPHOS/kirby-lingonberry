<?= $item->text()->kt() ?>

<fieldset>
  <legend>Legend</legend>
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui.</p>
  <form>
    <h2>Form</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui.</p>
    <p>
      <label for="text_field">Text:</label><br>
      <input type="text" id="text_field">
    </p>
    <p>
      <label for="text_area">Text:</label><br>
      <textarea id="text_area"></textarea>
    </p>
    <p>
    <label for="select_element">Select:</label><br>
    <select name="select_element">
      <optgroup label="Option Group 1">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
      </optgroup>
      <optgroup label="Option Group 2">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
      </optgroup>
    </select>
    </p>
    <p>
      <label for="radio_buttons">Radio:</label><br>
      <input type="radio" class="radio" name="radio_button" value="radio_1"> Radio 1<br>
      <input type="radio" class="radio" name="radio_button" value="radio_2"> Radio 2<br>
      <input type="radio" class="radio" name="radio_button" value="radio_3"> Radio 3
    </p>
    <p>
      <label for="checkboxes">Checkboxes:</label><br>
      <input type="checkbox" class="checkbox" name="checkboxes" value="check_1"> Radio 1<br>
      <input type="checkbox" class="checkbox" name="checkboxes" value="check_2"> Radio 2<br>
      <input type="checkbox" class="checkbox" name="checkboxes" value="check_3"> Radio 3
    </p>
    <p>
    <label for="password">Password:</label><br>
    <input type="password" class="password" name="password">
    </p>
    <p>
    <label for="file">File:</label><br>
    <input type="file" class="file" name="file">
    </p>
    <p>
    <input class="button" type="reset" value="Clear"> <input class="button" type="submit" value="Submit">
    </p>
  </form>
</fieldset>
