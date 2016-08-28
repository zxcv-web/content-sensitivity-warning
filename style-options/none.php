<!-- none -->
<div id="csw-container" class="csw-container">
  <div class="csw-wrapper">
    <p class="csw-primary-text">
      <?php echo get_option('csw_primary_text'); ?>
      <a id="csw-warning-link" class="csw-warning-link" href="<?php echo $_SERVER['PHP_SELF'] . "?csw=yes"; ?>">
        <?php echo get_option('csw_button_text'); ?>
      </a>
    </p>
    <p id="csw-secondary-text" class="csw-secondary-text"><small>
      <?php echo get_option('csw_secondary_text'); ?>
    </small></p>
    <button id="csw-warning-button" class="csw-warning-button">
      <?php echo get_option('csw_button_text'); ?>
    </button>
  </div>
</div>
