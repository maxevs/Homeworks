В мене не генерує "headers already sent" хоча я знаю що має генерувати, бо перед header є вивід даних.
В php.ini поставив output_buffering off все одно не помогло. В чому може бути причина?

jhgvjhvjhg

<?php
echo "Hello Word!!!";
header("Location: /Git_folder/include_require_cookies_ob_start_tasks/1/1.html");
echo "  ";

