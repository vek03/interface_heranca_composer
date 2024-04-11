<?php

    namespace App\src\arquivo2_extends;

    use App\src\arquivo2_extends\UsuarioFactory;

    class Login_Extends {
        public function executar($lo,$se) {
            $login = $lo;
            $senha = $se;

            $perfil = 'professor'; 

            $usuario = UsuarioFactory::criar($perfil);

            if ($usuario->autenticar($login, $senha)) {
                $autorizacoes = $usuario->autorizar();

                echo "\n<br>Bem-vindo, $login! Você tem acesso às seguintes funcionalidades: " . implode(', ', $autorizacoes);

            
                
            } else {
                echo '\n<br>Login ou senha incorretos.';
            }
        }
    }