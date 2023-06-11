<?php
include('ArmarioOBJ.php');
class conexaoCRUD
{

    private $conexao;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $nomeDoBanco = "cadastrodearmarios";
    public function __construct()
    {
        $this->openConnection();
    }

    private function openConnection()
    {

        $this->conexao = mysqli_connect($this->host, $this->username, $this->password);
        if (!$this->conexao) {
            echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL.";
            exit;
        }
        if (!mysqli_select_db($this->conexao, $this->nomeDoBanco)) {
            echo "Não foi possível estabelecer uma conexão com o banco de dados.";
            exit;
        }
    }
    public function closeConection()
    {
        mysqli_close($this->conexao);
    }
    public function inserirNoBanco($nome, $sobrenome, $CPF, $telefone, $endereco, $email)
    {
        $sql = "Insert into cadastropessoa(nome,sobrenome,CPF,telefone,email,endereco) values('" . $nome . "','" . $sobrenome . "','" . $CPF . "','" . $telefone . "','" . $email . "','" . $endereco . "')";
        $res = mysqli_query($this->conexao, $sql);

    }

    public function buscarPorCpf($CPF)
    {
        $sql = "select * from cadastropessoa where CPF='" . $CPF . "'";
        $res = mysqli_query($this->conexao, $sql);

        if ($res && mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $nome = $row['nome'];
            $sobrenome = $row['sobrenome'];
            $CPF = $row['CPF'];
            $telefone = $row['telefone'];
            $email = $row['email'];
            $endereco = $row['endereco'];
            if ($nome != "" && $sobrenome != "" && $CPF != "" && $telefone != "" && $endereco != "" && $email != "") {
                return array(
                    'nome' => $nome,
                    'sobrenome' => $sobrenome,
                    'CPF' => $CPF,
                    'telefone' => $telefone,
                    'email' => $email,
                    'endereco' => $endereco
                );
            }

        }
    }
    public function updateComCpf($CPF, $novosdados)
    {
        $res = $this->buscarPorCpf($CPF);
        if ($res) {
            $nome = $novosdados['nome'];
            $sobrenome = $novosdados['sobrenome'];
            $telefone = $novosdados['telefone'];
            $email = $novosdados['email'];
            $endereco = $novosdados['endereco'];

            $sql = "UPDATE cadastropessoa SET nome = '$nome', sobrenome = '$sobrenome', telefone = '$telefone',email = '$email', endereco = '$endereco' WHERE CPF = '$CPF'";
            $res = mysqli_query($this->conexao, $sql);

            if ($res && mysqli_affected_rows($this->conexao) > 0) {
                return true; // Atualização bem-sucedida
            } else {
                return false; // Ocorreu algum problema na atualização
            }
        }
    }
    public function excluirComCpf($CPF)
    {
        $res = $this->buscarPorCpf($CPF);
        if ($res) {
            $sql = "delete from cadastropessoa where CPF='" . $CPF . "'";
            $res = mysqli_query($this->conexao, $sql);

            if ($res && mysqli_affected_rows($this->conexao) > 0) {
                return true; // Atualização bem-sucedida
            } else {
                return false; // Ocorreu algum problema na atualização
            }
        }
    }

    public function procurarTodosArmarios()
    {
        $sql = "SELECT * FROM armarios";
        $res = mysqli_query($this->conexao, $sql);
    
        $armarios = array(); // Inicializa o array vazio
    
        if ($res && mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $armario = new ArmarioOBJ($row['idArmario'], $row['valorArmario'], $row['localizacaoArmario'], $row['linha'], $row['coluna'], $row['vago']);
                $armarios[] = $armario; // Adiciona cada objeto ao array
            }
        }
    
        return $armarios;
    }
    public function procurarArmarioPorId($idArmario)
    {
        $sql = "SELECT * FROM armarios where idArmario=$idArmario";
        $res = mysqli_query($this->conexao, $sql);

        if ($res && mysqli_num_rows($res) > 0) {
            $row=mysqli_fetch_assoc($res);
                $armario = new ArmarioOBJ($row['idArmario'], $row['valorArmario'], $row['localizacaoArmario'], $row['linha'], $row['coluna'], $row['vago']); 
        }
        return $armario;
    }
}
?>