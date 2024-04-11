<?php
namespace App;

require 'vendor/autoload.php';

use App\src\arquivo1_implements\Login_Implements;
use App\src\arquivo2_extends\Login_Extends;

$login_implements = new Login_Implements();
$login_extends = new Login_Extends();


$login_implements->executar('Victor','123');
$login_extends->executar('Cardoso','321');