<?php

    namespace App\src\arquivo2_extends;

    abstract class Usuario {
        protected $nome;
        protected $login;
        protected $senha;
      
        public abstract function autenticar(string $login, string $senha): bool;
        public abstract function autorizar(): array;
    }