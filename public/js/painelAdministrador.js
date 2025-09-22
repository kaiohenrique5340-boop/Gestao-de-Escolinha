//teste de exbicao
let tabela = `
        <table>
            <thead>
                <tr>
                    <th>id_Aluno</th>
                    <th>Nome</th>
                    <th>Turma</th>
                    <th>Mas algo</th>
                </tr>
            </thead>
            <tbody>
                <td>22</td>
                <td>Oruam</td>
                <td>Do pagode</td>
                <td>Sim</td>
            </tbody>`;
    
document.addEventListener('DOMContentLoaded', function () {
    const main = document.querySelector('.main');

    function mostrarConteudo(tipo) {
        if (tipo === 'alunos') {
            main.innerHTML = `<h1>Alunos</h1><p>`+tabela+`.</p>`;
        } else if (tipo === 'turmas') {
            main.innerHTML = '<h1>Turmas</h1><p>Conteúdo de turmas aqui.</p>';
        } else if (tipo === 'financeiro') {
            main.innerHTML = '<h1>Financeiro</h1><p>Conteúdo financeiro aqui.</p>';
        }
    }

    document.querySelector('a[href="#alunos"]').addEventListener('click', function (e) {
        e.preventDefault();
        mostrarConteudo('alunos');
    });

    document.querySelector('a[href="#turmas"]').addEventListener('click', function (e) {
        e.preventDefault();
        mostrarConteudo('turmas');
    });

    document.querySelector('a[href="#financeiro"]').addEventListener('click', function (e) {
        e.preventDefault();
        mostrarConteudo('financeiro');
    });
});
