<?php
/***
 * Cheguei aqui Amandinha. Nesse projeto vamos ter criptografia?
 * 
 * Bjs Yurex
 
Este script foi gerado pelo chat gpt, precisamos:

1) Isolar estas linhas de BD em outro arquivo para facilitar a organização do código.
2) Ajustar as querys corretamente
3) Vamos organizar uma pasta para .css também?
4) Sugestão super válida do Yure: utilizar criptografia ao salvar os dados

 */



// Conexão segura com MySQL
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "avaliacao";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Inserção com segurança e prevenção de XSS
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function clean($str) {
        return htmlspecialchars(trim($str));
    }

    $fields = [];
    for ($i=1; $i<=10; $i++) {
        // Esse código abaixo não dá para ser usado em nosso servidor sistemas.msti.com.br ele usa um recurso muito bacana do PHP 7
        //$fields["p$i"] = clean($_POST["p$i"] ?? "");
        // Para php inferior ao 7 podemos usar o código (se shot-tags habilitado)
        // Código equivalente antes do PHP 7
        $fields["p$i"] = claean(isset($_POST["p$i"]) ? $_POST["p$i"] : '');
        // Em outras palavras o Operador '??' equivale ao uso do COALESCE() no MySQL
    }
    // Essa forma de trabalho,abaixo, é muito interessante e bem mais segura
    // Usando os comandos Prepare e Execute
    // Acho uma boa usarmos essa escrita neste código para pegarmos familiaridade
    // A idéia depois é ajustar o PGFW para trabalhar com essa escrita
    $sql = "INSERT INTO avaliacao (" . implode(",", array_keys($fields)) . ") VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", ...array_values($fields));
    $stmt->execute();
    $success = true;
    //Pergunta Amanda. Essa base de Dados já foi criada?
}*/

include 'includes/classes.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Avaliação de Desempenho</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/base.css">
</head>
<body>

<div class="container">
    <div class="container-box">
        <div class="text-center mb-4">
            <img src="https://www.msti.com.br/wp-content/uploads/2016/05/logo.png" alt="Logo" style="max-width:180px;margin-bottom:20px;">        
            <h1 class="mt-3">Avaliação de Desempenho</h1>
        </div>

        <?php if (!empty($success)){ ?>
            <div class="alert alert-success text-center">Avaliação enviada com sucesso!</div>
        <?php } else { ?>
        <?php } ?>
        <form method="POST" id="avaliacaoForm">

    <!-- Gestão -->
    <h4 class="mt-3 mb-3" style="color:var(--primary-color); font-weight:700;">Avaliação da Gestão</h4>

    <div class="mb-3">
        <label class="form-label">1. Como você avalia a comunicação da liderança com a equipe?</label>
        <?php echo $obj = MyList::satisfacao('p1');?>
    </div>

    <div class="mb-3">
        <label class="form-label">2. O gestor demonstra clareza nas expectativas e objetivos?</label>
        <?php echo MyList::frequencia('p2');?>
    </div>

    <div class="mb-3">
        <label class="form-label">3. O gestor está disponível quando você precisa de apoio ou orientação?</label>
        <?php echo MyList::frequencia('p3');?>
    </div>

    <div class="mb-3">
        <label class="form-label">4. O feedback recebido da liderança é útil e aplicável no dia a dia?</label>
        <?php echo MyList::utilidade('p4');?>
    </div>

    <div class="mb-3">
        <label class="form-label">5. Você se sente ouvido(a) pela gestão quando traz sugestões ou preocupações?</label>
        <?php echo MyList::frequencia('p5');?>
    </div>

    <br><br>

    <!-- Ambiente de trabalho -->
    <h4 class="mt-4 mb-3" style="color:var(--primary-color); font-weight:700;">Ambiente de Trabalho</h4>

    <div class="mb-3">
        <label class="form-label">6. Você considera seu ambiente de trabalho saudável e colaborativo?</label>
        <?php echo MyList::qualidade('p6');?>
    </div>

    <div class="mb-3">
        <label class="form-label">7. Você sente que seu trabalho é reconhecido e valorizado?</label>
        <?php echo MyList::frequencia('p7');?>
    </div>


    <br><br>

    <!-- Perguntas abertas -->
    <h4 class="mt-4 mb-3" style="color:var(--primary-color); font-weight:700;">Perguntas Abertas</h4>

    <div class="mb-3">
        <label class="form-label">8. O que você mais gosta na empresa?</label>
        <textarea class="form-control" name="p8" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">9. O que poderia ser melhorado para facilitar seu trabalho?</label>
        <textarea class="form-control" name="p9" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">10. Que sugestões você gostaria de deixar para a gestão?</label>
        <textarea class="form-control" name="p10" rows="3"></textarea>
    </div>

    <br><br>

    <button type="submit" class="btn btn-primary w-100">Enviar Avaliação</button>
</form>
    </div>

</div>

<script>
// Validação extra no front-end
const form = document.getElementById('avaliacaoForm');
form.addEventListener('submit', function(e){
    const selects = form.querySelectorAll('select');
    for (let s of selects) {
        if (s.value === '') {
            alert('Por favor, responda todas as notas.');
            e.preventDefault();
            return;
        }
    }
});
</script>

</body>
</html>