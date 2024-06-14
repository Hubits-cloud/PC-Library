![library logo](images/png/logo-color.png)

Designed for Windows 10. *Should work on both Ubuntu and Windows 11 but i haven't tested it*



**Usage**
---

```
Lend out any pc, quickly and effiecently.
Developed by Tobias Madsen Belling -> (Github: Hubits-cloud)
```

**Installation Options**
---

1. Install [`XAMPP`](https://www.apachefriends.org/download.html)
    + `Ensure that you install the latest PHP release`


2. Run the installer
    + `For the program to work you need to select Apache and MySQL in the installer`


3. Provide the PHP path for VSCode
    + `Locate the PHP program in the XAMMP folder: "C:/xampp/php/php.exe"`
    + `In VSCode go to File, then preferences, then settings`
    + `Go to PHP and along the top there will be a link to a Json file`
    + `Paste the path under "php.validate.executablePath"`


4. Download the program
    + `In the Github repo, go under code and download the program as a zip`
    + `Go to the htdocs folder under XAMPP, and delete the files in there`
    + `Place the program zip file in the htdocs folder and extract it`



5. Launch it with localhost
    + `Run XAMPP and start both Apache and MySQL`
    + `Go to your browser of choice and type "localhost"`
    + `It should then launch a site that contains the folder, open it`


6. Make the database
    + `Go to your browser and type "http://localhost/phpmyadmin/"`
    + `Click 'new' to create a new database`
    + `Name the database 'library' for default, otherwise name it yourself and change the name in the 'dbh.inc.php' file`
    + `then click 'create' to create the database`

7. Make the table
    + `Run this code in the sql tab of the database, change it as it suits you`
    ```
    CREATE TABLE loan_pc (
        pc_number INT(11) NOT NULL,

        -- You may or may not want to include a cross reference number, in my case the crossreference number was also the insurance number
        -- cros_number INT(11),

        -- The last date which the pc was updated
        last_win_update DATE,

        user VARCHAR(30),

        loan_date DATE,

        -- Info about the pc, in my case we use it to log damages, for example a broken HDMI port
        pc_info VARCHAR(250),

        -- The pc's mac address
        mac VARCHAR(17),
        PRIMARY KEY (pc_number)
    );
    ```

8. Make sure to change the files according to your changes in the database
    + `all files are named after what part of the table it's related to`
**Configuration Options**
---


**How to Contribute**
---

1. Clone repo and create a new branch: `$ git checkout https://github.com/Hubits-cloud/PC-Library -b name_for_new_branch`.
2. Make changes and test
3. Submit Pull Request with comprehensive description of changes