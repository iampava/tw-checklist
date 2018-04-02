<?php 
    class Components {
        static function createHead() {
            return '
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>TW Checklist</title>
                    <base href="/" />
                    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">
                    <link rel="stylesheet" type="text/css" href="/public/style.css" />
                </head>
            ';
        }

        static function createHeader($isLoggedIn = FALSE) {
            return '
                <header>
                    <h1>
                        <a href="/"> 
                            <span class="emoji">🚀</span>
                            TW Checklist
                            <span class="emoji">🚀</span>
                        </a>
                    </h1>
                ' .
                    ($isLoggedIn 
                        ? '
                            <form method="POST" action="/home">
                                <button type="submit" name="logout_submit" id="logoutBtn"> Logout </button>
                            </form>
                        ' 
                        : ''
                    )
                  .
                '
                </header>
            ';
        }
    }
?>