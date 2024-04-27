    <?php
// Verifica se o formulário de login foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST";)   {

    // Aqui você irá realizar a validação do login e cadastro
    // Supondo que a validação seja bem-sucedida, você pode redirecionar o usuário para a página de produtos
    header("Location: produtos.php");
    exit;
}
?>
