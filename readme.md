# Development Notes

## File Structure

There is some WP functionality we lose by altering the template structure. For instance:
header.php, footer.php, page.php, single.php only work as intended if they're in the top-level directory. Do we care? 

## Bower Components

These haven't been introduced into the project just yet

## SASS

Component Styles are pulled from their component directory manually after the styles.scss file. Anything added to /assets/scss/ must be added to styles.scss manually. The idea here is that these styles will mostly be global in nature and are relied upon by other Sass files. Examples include button styles, color variables, etc.

