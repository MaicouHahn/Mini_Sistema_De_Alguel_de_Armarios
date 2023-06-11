<?php
class ArmarioOBJ
{
    private $idArmario;
    private $valorArmario;
    private $localizacaoArmario;
    private $linha;
    private $coluna;
    private $vago;
    public function __construct($idArmario, $valorArmario, $localizacaoArmario, $linha, $coluna, $vago)
    {
        $this->idArmario = $idArmario;
        $this->valorArmario = $valorArmario;
        $this->localizacaoArmario = $localizacaoArmario;
        $this->linha = $linha;
        $this->coluna = $coluna;
        $this->vago = boolval($vago);
    }

    public function getIdArmario()
    {
        return $this->idArmario;
    }

    public function getValorArmario()
    {
        return $this->valorArmario;
    }

    public function getLocalizacaoArmario()
    {
        return $this->localizacaoArmario;
    }

    public function getLinha()
    {
        return $this->linha;
    }

    public function getColuna()
    {
        return $this->coluna;
    }

    public function isVago()
    {
        return $this->vago;
    }
}
?>