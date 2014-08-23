<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
        .required :after{
            content: "*";
            color: red;
        }
    </style>
    <body>
        <section>
            <div class="reg-field-frame">
                <form method="post" action="register.php">
                    <label>
                        <span>
                            The username and password must have 
                            at least 3 and maximum 20 symbols.
                        </span>
                    </label>

                    <label for="user" class="required">  
                        <span>Username</span>
                    </label>
                    <input type="text" name="user" id="user">

                    <label for="pass" class="required">
                        <span>Password</span>
                    </label>
                    <input type="password" name="pass" id="pass">

                    <label for="repass" class="required">
                        <span>Repeat password</span>
                    </label>
                    <input type="password"  name="repass" id="repass">

                    <label for="first-name">
                        <span>First name</span>
                    </label>
                    <input type="text"  name="firstName" id="first-name">
                    
                    <label for="last-name">
                        <span>Last name</span>
                    </label>
                    <input type="text"  name="lastName" id="last-name">
                    
                    <input type="submit" value="Register"> 
                </form>
            </div>
        </section>
    </body>
</html>
