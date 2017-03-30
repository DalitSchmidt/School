**What is the purpose of "lib" directory?**
<br>
It contains all the "utilities" of the project, the DB class and the rest of the schemas are stored here.
For instance, if you had more "helper" classes like for example a class that connect to another DB, or a class that contains some classes for validations. If we had class that called for example, "Validator.php" which was in charge of making validations like an email or phone number, i would locate it here in the lib directory.