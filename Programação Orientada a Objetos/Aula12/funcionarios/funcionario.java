package funcionarios;

class funcionario {
    protected String codigo;
    protected String nome;
    protected String cargo;
    protected int telefone;
    protected float salario;

    public funcionario(String codigo, String nome, String cargo, int telefone, float salario) {
        this.codigo = codigo;
        this.nome = nome;
        this.cargo = cargo;
        this.telefone = telefone;
        this.salario = salario;
    }

    public String getCodigo() {
        return codigo;
    }
    public String getNome() {
        return nome;
    }
    public String getCargo() {
        return cargo;
    }
    public int getTelefone() {
        return telefone;
    }
    public float getSalario() {
        return salario;
    }

    public void dados() {
        System.out.println("C�digo: " + codigo);
        System.out.println("Nome: " + nome);
        System.out.println("cargo: " + cargo);
        System.out.println("telefone: " + telefone);
        System.out.println("salario: " + salario);
    }
    
}