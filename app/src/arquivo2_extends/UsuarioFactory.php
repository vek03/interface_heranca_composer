<?php 

    namespace App\src\arquivo2_extends;

    use App\src\arquivo2_extends\Usuario;
    use App\src\arquivo2_extends\Professor;
    use App\src\arquivo2_extends\Administrador;
    use App\src\arquivo2_extends\AdministradorSupremo;
    use Exception;

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