<!-- basic -->
<div id="csw-container" class="csw-container">
  <div class="csw-wrapper">
    <p class="csw-primary-text">
      <?php echo get_option('csw_primary_text'); ?>
    </p>
    <p id="csw-secondary-text" class="csw-secondary-text">
      <?php echo get_option('csw_secondary_text'); ?>
    </p>
    <button id="csw-warning-button" class="csw-warning-button">
      <?php echo get_option('csw_button_text'); ?>
    </button>
    <a type="submit" href="<?php echo $_SERVER['PHP_SELF'] . "?csw=yes"; ?>">
      <?php echo get_option('csw_button_text'); ?>
    </a>
  </div>
</div>
