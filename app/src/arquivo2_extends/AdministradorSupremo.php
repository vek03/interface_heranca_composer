<?php 
    namespace App\src\arquivo2_extends;

    use App\src\arquivo2_extends\Administrador;
    
    class AdministradorSupremo extends Administrador {
        public function autorizar(): array {
            $autorizacoes = parent::autorizar();
            $autorizacoes[] = 'configurar_sistema';
            $autorizacoes[] = 'gerenciar_backups';
            return $autorizacoes;
        }
    }