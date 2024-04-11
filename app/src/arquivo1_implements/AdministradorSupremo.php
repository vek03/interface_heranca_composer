<?php 
    namespace App\src\arquivo1_implements;

    use App\src\arquivo1_implements\Administrador;
    
    class AdministradorSupremo extends Administrador {
        public function autorizar(): array {
            $autorizacoes = parent::autorizar();
            $autorizacoes[] = 'configurar_sistema';
            $autorizacoes[] = 'gerenciar_backups';
            return $autorizacoes;
        }
    }