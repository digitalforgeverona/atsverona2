<?php
  $full_path = __FILE__;
  $path = explode('wp-content', $full_path);
  require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
  <div class="input">
    <label>Style</label>
      <select name="style" id="style">
        <option value="accordion_without_icon">Accordion</option>
        <option value="toggle_without_icon">Toggle</option>
        <option value="accordion_with_icon">Accordion With Icon</option>
        <option value="toggle_with_icon">Toggle With Icon</option>
      </select>
  </div>
  <div class="input">
    <label>Title Color</label>
    <div class="colorSelector"><div style=""></div></div>
    <input name="title_color" id="title_color" value="" maxlength="12" size="12" />
  </div>
  <div class="input">
    <label>Icon</label>
    <select id="icon" name="icon">
      <option value=""></option>
      <?php
      $fa_icons = getFontAwesomeIconArray();
      foreach ($fa_icons as $key => $value) {
      ?>
        <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
      <?php
      }
      ?>
    </select>
  </div>
  <div class="input">
    <label>Icon Color</label>
    <div class="colorSelector"><div style=""></div></div>
    <input name="icon_color" id="icon_color" value="" maxlength="12" size="12" />
  </div>
  <div class="input">
    <label>Background Color</label>
    <div class="colorSelector"><div style=""></div></div>
    <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
  </div>
  <div class="input">
      <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
  </div>
</form>
</div>