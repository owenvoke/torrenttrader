# TorrentTrader Install Notes

### REQUIREMENTS:
- PHP 7+
- PDO driver for your required database

### INSTALLATION:
1) Copy ALL files to your web server
2) Import the database using the file [`/resources/database.sql`](../resources/database.sql)
3) Edit the file `backend/mysql.php` to suit your database connection
4) Edit the file `backend/config.php` to suit your needs
    - Special note should be taken for urls, emails, paths (use check.php if unsure)
5) Apply the following CHMOD's
    777 - cache/
    777 - cache/get_row_count/
    777 - cache/queries/
    777 - backups/
    777 - uploads/
    777 - uploads/images/
    777 - import/
    600 - censor.txt

Edit backup-database.php and change the path. Make sure it exists and is chmod 777

if you have any of those folders missing (eg: uploads/images/), please create them and chmod 777

6) Run check.php from your browser to check you have configured everything ok
   check.php is designed for UNIX systems, if you are using WINDOWS it may not report the paths correctly.

7) Now register as a new user on the site.  The first user registered will become administrator

8) If check.php still exists, please remove it or rename.
    - A warning will display on the site index until its removed