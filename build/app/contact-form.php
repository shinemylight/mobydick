<html lang="ru">
    <head>
        <meta charset="utf-8">
        <style>
            .message {
                text-align: center;
                margin-top: 20%;
                font-size: 40px;
                font-style: italic;
            }
        </style>
    </head>

    <body>
        <div class="form-result">
            <?php
                $fields = require 'fields.php';
                $const = require 'const.php';
                
                $sendto = $const['recipient']; 
                $from = $const['from'];
                
                // Формирование заголовка письма
                $subject  = $const['subject'];
                $headers  = "From: " . $from . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
                
                // Формирование тела письма
                $msg  = '<html><body style="font-family:Arial,sans-serif;">';
                $msg .= '<h2 style="font-weight:normal;border-bottom:1px dotted #ccc;margin-left:10px;">' . $const['message'] . '</h2>';
                    
                foreach ($fields as $key => $value) {
                    if (isset($_REQUEST[$key])) {
                        $msg .= '<p style="font-size:13px;margin-left:10px;"><strong style="font-style:italic;">' . $value . ':</strong> ' . $_REQUEST[$key] . '</p>';
                    }
                } 
                                 
                $msg .= '</body></html>';
                
                // отправка сообщения
                if(mail($sendto, $subject, $msg, $headers)) {
                    echo '<div class="message">' . $const['fallback-message'] . '</div>';
                } else {
                    echo '<div class="message">' . $const['fallback-error'] . '</div>';
                }
            ?>
        </div>
        <script type="text/javascript">
            setTimeout(function(){location.href='/'} , 2000); 
        </script>
    </body>
</html>
