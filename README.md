![library logo](images/pdf/logo-color.png)

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
