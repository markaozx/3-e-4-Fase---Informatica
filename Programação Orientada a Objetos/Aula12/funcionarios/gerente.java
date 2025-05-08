package funcionarios;

class gerente extends funcionario {

    private String setor;

    public gerente(String codigo, String nome, String cargo, int telefone, float salario, String setor) {
        super( codigo,nome,cargo,telefone,salario);
        this.setor = setor;
    }

    public void dadosGerente() {
        super.dados();
        System.out.println("setor responsavel:: " + setor);
    }

}
