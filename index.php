<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'util/Conexao.php';

$conn = Conexao::getConexao();

$sql = "SELECT * FROM personagens";
$stmt = $conn->prepare($sql);
$stmt->execute();
$personagens = $stmt->fetchAll();

if (isset($_POST['nome_completo'])) {
    $nomeCompleto = $_POST['nome_completo'];
    $casa = $_POST['casa'];
    $corSangue = $_POST['cor_sangue'];
    $habilidade = $_POST['habilidade'];
    $maiorAmbicao = $_POST['maior_ambicao'];
    $localDescobertaPoder = $_POST['local_descoberta_poder'];

    $sql = "INSERT INTO personagens (nome_completo, casa, cor_sangue, habilidade, maior_ambicao, local_descoberta_poder) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nomeCompleto, $casa, $corSangue, $habilidade, $maiorAmbicao, $localDescobertaPoder]);
    header("Location: index.php?success=true");
}


?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rainha Vermelha</title>
</head>

<body>
    <div>
        <h1>Registro de Ascensão</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Casa</th>
                <th>Sangue</th>
                <th>Habilidade</th>
                <th>Ambição</th>
                <th>Local da descoberta</th>
                <th>Excluir</th>
            </tr>
        </table>
        <h3>
            Preencha os dados do Sanguenovo/Sanguessuga para o arquivo de Norta.
        </h3>

        <form action="#" method="POST">
            <!-- Nome Completo -->
            <div>
                <label for="nome_completo">Nome Completo do Personagem:</label>
                <input type="text" id="nome_completo" name="nome_completo" placeholder="Ex: Mare Barrow">
            </div>

            <!-- Casa -->
            <div>
                <label for="casa">Casa à Qual Pertence:</label>
                <select id="casa" name="casa">
                    <option value="">Selecione uma Casa</option>
                    <option value="CA">Calore</option>
                    <option value="SA">Samos</option>
                    <option value="ME">Merandus</option>
                    <option value="PV">Provos</option>
                    <option value="TI">Titanos</option>
                    <option value="AR">Arven</option>
                    <option value="GU">Guarda Escarlate</option>
                    <option value="NN">Nenhum/Indefinido</option>
                    <!-- Adicione mais casas conforme necessário -->
                </select>
            </div>

            <!-- Cor do Sangue -->
            <div>
                <label for="cor_sangue">Cor do Sangue:</label>
                <select id="cor_sangue" name="cor_sangue">
                    <option value="">Selecione a Cor</option>
                    <option value="V">Vermelho</option>
                    <option value="P">Prata</option>
                </select>
            </div>

            <!-- Habilidade Principal -->
            <div>
                <label for="habilidade">Habilidade Principal (Poder):</label>
                <input type="text" id="habilidade" name="habilidade" placeholder="Ex: Eletrocinésia, Termocinese">
            </div>

            <!-- Maior Ambição -->
            <div>
                <label for="maior_ambicao">Qual a sua maior ambição no Reino de Norta (ou fora dele)?</label>
                <input type="text" id="maior_ambicao" name="maior_ambicao" placeholder="Ex: Tornar-se Rainha, Proteger a Família">
            </div>

            <!-- Local Descoberta Poder -->
            <div>
                <label for="local_descoberta_poder">Onde foi descoberto seu poder?</label>
                <input type="text" id="local_descoberta_poder" name="local_descoberta_poder" placeholder="Ex: Arenas, Vilarejo da Cova, Palácio">
            </div>

            <!-- Botão de Envio -->
            <div>
                <button type="submit">
                    Registrar Personagem
                </button>
                <?php if (isset($_GET['success'])): ?>
                    <script>
                        alert('cadastrado com sucesso!');
                    </script>
                <?php endif; ?>
            </div>
        </form>
    </div>

</body>

</html>