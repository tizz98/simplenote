<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Please verify your email address</h2>

        <div>
            Thanks for creating an account with SimpleNote! Please verify your email
            address <a href="{{ URL::to('register/verify/' . $confirmation_code) }}"> here</a>.<br/>

            If you have problems, please paste the below URL into your web browser.
            <pre>
                {{ URL::to('register/verify/' . $confirmation_code) }}
            </pre>

        </div>

    </body>
</html>