function showModal() {
    document.querySelector(".modal-form").style.display = "flex";
}

function deletar(idFuncionario) {
    //pede confirmação ao usuário
    let confirmacao = confirm("Deseja deletar o funcionário?");

    //se quer confirmar que quer apagar, redireciona para arquivo de ação
    //com o id como parâmetro
    if (confirmacao) {
        window.location = "acaoDeletar.php?id=" + idFuncionario;
    }
}

//Função de Editar

function editar(idFuncionario) {

    //Teste de recebimento
    //alert(idFuncionario);
    window.location = "editar.php?id=" + idFuncionario;

}




document.getElementById("btnAddFuncionario").addEventListener("click", showModal);