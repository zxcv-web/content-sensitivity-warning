<!-- bootstrap -->
<div id="csw-container" class="csw-container" data-style="bootstrap">
  <div class="csw-wrapper">
    <p class="csw-primary-text text-danger">
      <?php echo get_option('csw_primary_text'); ?>
      <a id="csw-warning-link" href="<?php echo $_SERVER['PHP_SELF'] . "?csw=yes"; ?>">
        <?php echo get_option('csw_button_text'); ?>
      </a>
    </p>
    <p id="csw-secondary-text" class="csw-secondary-text"><small>
      <?php echo get_option('csw_secondary_text'); ?>
    </small></p>
    <button id="csw-warning-button" class="csw-warning-button btn btn-danger">
      <?php echo get_option('csw_button_text'); ?>
    </button>
  </div>
</div>
