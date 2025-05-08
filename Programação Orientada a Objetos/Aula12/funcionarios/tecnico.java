package funcionarios;

class tecnico extends funcionario {

    private String formacao;

    public tecnico(String codigo, String nome, String cargo, int telefone, float salario, String formacao) {
        super( codigo,nome,cargo,telefone,salario);
        this.formacao = formacao;
    }

    public void dadosTecnico() {
        super.dados();
        System.out.println("formação de tecnico: " + formacao);
    }

}
