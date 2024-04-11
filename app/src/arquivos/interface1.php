<?php

namespace App\src\arquivos;

use Exception;

interface Usuario {
    public function autenticar(string $login, string $senha): bool;
    public function autorizar(): array;
}


class Professor implements Usuario {
    protected $nome;
    protected $login;
    protected $senha;

    public function autenticar(string $login, string $senha): bool {
        if ($login === '' || $senha === '') {
            return false;
        }
        return true;
    }

    public function autorizar(): array {
        return ['acessar_materiais', 'gerenciar_notas'];
    }
}

class Administrador implements Usuario {
    protected $nome;
    protected $login;
    protected $senha;

    public function autenticar(string $login, string $senha): bool {
        return true;
    }

    public function autorizar(): array {
        return ['gerenciar_usuarios', 'gerenciar_cursos'];
    }
}

class AdministradorSupremo extends Administrador {
    public function autorizar(): array {
        $autorizacoes = parent::autorizar();
        $autorizacoes[] = 'configurar_sistema';
        $autorizacoes[] = 'gerenciar_backups';
        return $autorizacoes;
    }
}

class UsuarioFactory {
    public static function criar(string $perfil): Usuario {
        switch ($perfil) {
            case 'professor':
                return new Professor();
            case 'administrador':
                return new Administrador();
            case 'administrador_supremo':
                return new AdministradorSupremo();
            default:
                throw new Exception('Perfil inválido');
        }
    }
}


class Login {
    public function executar($lo,$se) {
        $login = $lo;
        $senha = $se;

        $perfil = 'professor'; 

        $usuario = UsuarioFactory::criar($perfil);

        if ($usuario->autenticar($login, $senha)) {
            $autorizacoes = $usuario->autorizar();

            echo "Bem-vindo, $login! Você tem acesso às seguintes funcionalidades: " . implode(', ', $autorizacoes);

          
            
        } else {
            echo 'Login ou senha incorretos.';
        }
    }
}

$login = new Login();
$login->executar('professor', '123');