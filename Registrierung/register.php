<html>
    <head>
        <title>Registrierung</title>
        <link rel="stylesheet" type="text/css" href="register.css">
    </head>
    <body>
        
        <div class="main">
            <div class="wrapper">
                <img src="adashoplogo.png" width="250px"><br><br>
                <form action="register.php" method="post" html dont show username>
                    <table>
                        
                        <!-- EMAIL -->
                        
                        <tr>
                            <td>
                                <i class="fas fa-mail"></i> <!-- E-Mail Icon -->
                                <p style="display:inline;color:red">* </p>
                                <p style="display:inline;">E-Mail :</p>
                            </td>
                            <td>
                                <input type="text" name="email" autocomplete="on" required>
                            </td>
                        </tr>
                        
                        <!-- EMAIL -->
                        
                        
                        <!-- PASSWORD -->
                        
                        <tr>
                            <td>           
                                <i class="fas fa-lock"></i>                 
                                <p>Passwort :</p>
                            </td>
                            <td>
                                <input type="password" name="password_1" required>
                            </td>
                        </tr>
                        
                        <!-- PASSWORD -->
                        
                        <!-- PASSWORD WIEDERHOLEN -->
                        
                        <tr>
                            <td>           
                                <i class="fas fa-lock"></i>                 
                                <p>Passwort wiederholen:</p>
                            </td>
                            <td>
                                <input type="password" name="password_2" required>
                            </td>
                        </tr>
                        
                        <!-- PASSWORD WIEDERHOLEN -->
                        
                    </table>
                    <br>
                    <button type="submit" name="reg_user" value="register" style="width: 200px;height:50px">
                        registrieren
                    </button>
                </form>        
            </div>
        </div>
                
    </body>
</html>