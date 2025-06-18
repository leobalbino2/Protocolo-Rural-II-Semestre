<?php
class Conexao
{
    private static $instancia;

    public static function conectar()
    {
        if (!isset(self::$instancia)) {
            $dsn = "mysql:host=localhost;dbname=protocolo_rural;charset=utf8";
            $usuario = "root";
            $senha = "";

            try {
                self::$instancia = new PDO($dsn, $usuario, $senha);
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco: " . $e->getMessage());
            }
        }

        return self::$instancia;
    }
}
?>