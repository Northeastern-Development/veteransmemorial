<?php

  // this is the include file to hold the HTML for the theme settings view

?>

<div class="wrap">
  <?php settings_errors(); ?>
  <h1>Northeastern Theme Settings</h1><br>

  <form action="options.php" method="post">
    <?php
      settings_fields( 'nutheme-settings' );
      do_settings_sections( 'nutheme_admin_page' );
    ?>
    <h3>Site Status</h3>
    <p>Will tell the site to turn on certain features such as debug, prevent analytics tracking, etc. on sites currently under development.</p>
    <select name="theme_settings_status">
      <option value="dev"<?=(get_option('theme_settings_status') == 'dev'?' selected="selected"':'')?>>Development / Testing</option>
      <option value="prod"<?=(get_option('theme_settings_status') == 'prod'?' selected="selected"':'')?>>Production</option>
    </select><br />
    <br />
    <hr />
    <h3>Site Logo</h3>
    <p>Copy, and then paste the SVG code for your site logo into this field.  Will appear in both the site header as well as smaller in the site footer.</p>
    <textarea rows="10" cols="100" placeholder="SVG Code" name="theme_settings_logosvg"><?=(get_option('theme_settings_logosvg') != ''?get_option('theme_settings_logosvg'):'')?></textarea><br />
    <br />
    <hr />
    <h3>Color Palette</h3>
    <p>Select which color option you would like your site to use: Dark (default) or light.</p>
    <select name="theme_settings_coloroption">
      <option value="dark">Dark (Default)</option>
      <!-- <option value="light">Light</option> -->
    </select><br />
    <br />
    <hr />
    <h3>GeoTag</h3>
    <p>Specifying the location (city, state, and zip) for this site can aid in improving the sites local search ranking.  If no values are entered or if one or more is missing, the site will use the location of the main Boston campus.</p>

    <table>
      <tr>
        <td><label for="theme_settings_geotag_city">City</label> </td>
        <td><input name="theme_settings_geotag_city" id="theme_settings_geotag_city" placeholder="Boston" value="<?=(get_option('theme_settings_geotag_city') != ''?get_option('theme_settings_geotag_city'):'')?>" /></td>
      </tr>
      <tr>
        <td><label for="theme_settings_geotag_state">State</label> </td>
        <td><input name="theme_settings_geotag_state" id="theme_settings_geotag_state" placeholder="MA" value="<?=(get_option('theme_settings_geotag_state') != ''?get_option('theme_settings_geotag_state'):'')?>" /> (2 letter state abbreviation)</td>
      </tr>
      <tr>
        <td><label for="theme_settings_geotag_zip">Zip Code</label> </td>
        <td><input name="theme_settings_geotag_zip" id="theme_settings_geotag_zip" placeholder="02115" value="<?=(get_option('theme_settings_geotag_zip') != ''?get_option('theme_settings_geotag_zip'):'')?>" /></td>
      </tr>
    </table>
    <br />
    <hr />
    <h3>Analytics</h3>
    <p><b>Google Analytics Tag Manager</b></p>
    <select name="theme_settings_analytics_tagmanager">
      <option value="inactive"<?=(get_option('theme_settings_analytics_tagmanager') == 'inactive'?' selected="selected"':'')?>>Inactive</option>
      <option value="active"<?=(get_option('theme_settings_analytics_tagmanager') == 'active'?' selected="selected"':'')?>>Active</option>
    </select><br />
    <br />
    <p><b>Custom Google Analytics tracking snippet.</b> NOTE: when using the tag manager above, it is NOT recommended to add a custom tracking snippet as well.</p>
    <textarea rows="10" cols="100" placeholder="Paste custom tracking snippet here" name="theme_settings_analytics_snippet"><?=(get_option('theme_settings_analytics_snippet') != ''?get_option('theme_settings_analytics_snippet'):'')?></textarea><br />
    <br />
    <p><b>Additional Snippets.</b> These additional snippets will be placed in the header area of the site, and on every page.  Additional snippets can be used in conjunection with either the tag manager or a custom tracking snippet, but should not duplicate either.</p>
    <textarea rows="10" cols="100" placeholder="Paste additional snippets here" name="theme_settings_analytics_snippet_additional"><?=(get_option('theme_settings_analytics_snippet_additional') != ''?get_option('theme_settings_analytics_snippet_additional'):'')?></textarea><br />
    <br />
    <hr />
    <p>Click the button below to save your changes.</p>
    <?php submit_button(); ?>
    <hr />
    <h2>Brand Guide</h2>
    <div id="nu_settings-help">
      For more information on the university brand system and it use, please visit the <a href="https://brand.northeastern.edu" title="Northeastern University Brand System" target="_blank">online brand site</a>.
    </div>
    <br />
    <h2>Need Help?</h2>
    <div id="nu_settings-help">
      If you need help or something isn't working please <a href="mailto:marketing@northeastern.edu?subject=NU Theme Help">contact us</a>.
    </div>
  </form>
</div>
