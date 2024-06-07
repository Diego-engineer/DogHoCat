<?php

class ComparadorUsuarios {
    public function sonIguales($usuario1, $usuario2) {
        return $usuario1->getDocumento() === $usuario2->getDocumento()
            && $usuario1->getNombres() === $usuario2->getNombres()
            && $usuario1->getApellidos() === $usuario2->getApellidos()
            && $usuario1->getCiudad() === $usuario2->getCiudad()
            && $usuario1->getDireccion() === $usuario2->getDireccion()
            && $usuario1->getCorreo() === $usuario2->getCorreo()
            && $usuario1->getTelefono() === $usuario2->getTelefono()
            && $usuario1->getRol() === $usuario2->getRol()
            && $usuario1->getContraseña() === $usuario2->getContraseña();
    }
}
?>