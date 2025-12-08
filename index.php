<?php
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
        $fields["p$i"] = clean($_POST["p$i"] ?? "");
    }

    $sql = "INSERT INTO avaliacao (" . implode(",", array_keys($fields)) . ") VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", ...array_values($fields));
    $stmt->execute();
    $success = true;
}*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Avaliação de Desempenho</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<style>
    :root {
        --primary-color: #fff;
        --primary-dark: #003f7a;
        --bg-light: #f4f8fb;
    }
    body {
        background: var(--bg-light);
    }
    .container-box {
        background: #002e5b;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-top: 40px;
    }
    h1 {
        color: var(--primary-color);
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .form-label {
        font-weight: 600;
        color: var(--primary-color);
    }
    .btn-primary {
        background: var(--primary-dark);
        border: none;
        font-size: 18px;
        padding: 12px;
        border-radius: 10px;
        font-weight: 600;
    }
    .btn-primary:hover {
        background: var(--primary-dark);
    }
</style>
</head>
<body>

<div class="container">
    <div class="container-box">
        <div class="text-center mb-4">
            <img src="https://www.msti.com.br/wp-content/uploads/2016/05/logo.png" alt="Logo" style="max-width:180px;margin-bottom:20px;">        
            <h1 class="mt-3">Avaliação de Desempenho</h1>
        </div>

        <?php if (!empty($success)): ?>
            <div class="alert alert-success text-center">Avaliação enviada com sucesso!</div>
        <?php endif; ?>

        <form method="POST" id="avaliacaoForm">

    <!-- Gestão -->
    <h4 class="mt-3 mb-3" style="color:var(--primary-color); font-weight:700;">Avaliação da Gestão</h4>

    <div class="mb-3">
        <label class="form-label">1. Como você avalia a comunicação da liderança com a equipe?</label>
        <select class="form-select" name="p1" required>
            <option value="">Selecione...</option>
            <option>1 - Muito insatisfatória</option>
            <option>2 - Insatisfatória</option>
            <option>3 - Regular</option>
            <option>4 - Satisfatória</option>
            <option>5 - Excelente</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">2. O gestor demonstra clareza nas expectativas e objetivos?</label>
        <select class="form-select" name="p2" required>
            <option value="">Selecione...</option>
            <option>1 - Nunca</option>
            <option>2 - Raramente</option>
            <option>3 - Às vezes</option>
            <option>4 - Frequentemente</option>
            <option>5 - Sempre</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">3. O gestor está disponível quando você precisa de apoio ou orientação?</label>
        <select class="form-select" name="p3" required>
            <option value="">Selecione...</option>
            <option>1 - Nunca</option>
            <option>2 - Raramente</option>
            <option>3 - Às vezes</option>
            <option>4 - Frequentemente</option>
            <option>5 - Sempre</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">4. O feedback recebido da liderança é útil e aplicável no dia a dia?</label>
        <select class="form-select" name="p4" required>
            <option value="">Selecione...</option>
            <option>1 - Nada útil</option>
            <option>2 - Pouco útil</option>
            <option>3 - Razoavelmente útil</option>
            <option>4 - Útil</option>
            <option>5 - Muito útil</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">5. Você se sente ouvido(a) pela gestão quando traz sugestões ou preocupações?</label>
        <select class="form-select" name="p5" required>
            <option value="">Selecione...</option>
            <option>1 - Nunca</option>
            <option>2 - Raramente</option>
            <option>3 - Às vezes</option>
            <option>4 - Frequentemente</option>
            <option>5 - Sempre</option>
        </select>
    </div>

	<br><br>

    <!-- Ambiente de trabalho -->
    <h4 class="mt-4 mb-3" style="color:var(--primary-color); font-weight:700;">Ambiente de Trabalho</h4>

    <div class="mb-3">
        <label class="form-label">6. Você considera seu ambiente de trabalho saudável e colaborativo?</label>
        <select class="form-select" name="p6" required>
            <option value="">Selecione...</option>
            <option>1 - Muito ruim</option>
            <option>2 - Ruim</option>
            <option>3 - Neutro</option>
            <option>4 - Bom</option>
            <option>5 - Excelente</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">7. Você sente que seu trabalho é reconhecido e valorizado?</label>
        <select class="form-select" name="p7" required>
            <option value="">Selecione...</option>
            <option>1 - Nunca</option>
            <option>2 - Raramente</option>
            <option>3 - Às vezes</option>
            <option>4 - Frequentemente</option>
            <option>5 - Sempre</option>
        </select>
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
