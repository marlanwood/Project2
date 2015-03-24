<?php

namespace Views;


class LoginForm extends View
{
    public function __construct()
    {
        $this->content = <<<LOGIN_FORM
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example Login Form</title>
    </head>
    <body>
        <div align="center">
            <form method="POST" action="/auth">
                <p>Username: <input type="text" name="username" size="15" /><br />
                <p>Password: <input type="password" name="password" size="15" /><br />
                <p>Authentication Method: <select name="ValidationOption">
                <option value="InMemoryAuth">From Memory</option>
                <option value="FileBasedAuth">From File</option><br />
                <option value="MySQLBasedAuth">From MySQL</option></select><br />
                <p>Hint:Chuck is valid user. Norris is valid pw.<br />
                <p><input type="submit" value="Login" /></p>
            </form>
        </div>
    </body>
</html>
LOGIN_FORM;
    }
}
