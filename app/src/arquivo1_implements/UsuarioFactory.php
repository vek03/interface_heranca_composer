<?php 

    namespace App\src\arquivo1_implements;

    use App\src\arquivo1_implements\UsuarioInterface;
    use App\src\arquivo1_implements\Professor;
    use App\src\arquivo1_implements\Administrador;
    use App\src\arquivo1_implements\AdministradorSupremo;
    use Exception;

    class UsuarioFactory {
        public static function criar(string $perfil): UsuarioInterface {
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