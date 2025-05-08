package funcionarios;

class auxiliar extends funcionario {

    private String local;

    public auxiliar(String codigo, String nome, String cargo, int telefone, float salario, String local) {
        super( codigo,nome,cargo,telefone,salario);
        this.local = local;
    }

    public void dadosAuxiliar() {
        super.dados();
        System.out.println("local de trabalho: " + local);
    }

}
