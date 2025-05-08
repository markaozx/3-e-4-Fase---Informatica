package funcionarios;
import java.util.Scanner;

public class cadastrar {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        principal principal = new principal();
        
        System.out.println("Escolha o tipo de ve�culo:");
        System.out.println("1. gerente");
        System.out.println("2. auxiliar");
        System.out.println("3. tecnico");
        System.out.print("Digite sua op��o: ");
        int opcao = scanner.nextInt();
        scanner.nextLine(); 
        
        // Vari�vel para armazenar o ve�culo escolhido
        funcionario funcionarioEscolhido = null;

        // Pedir informa��es do ve�culo (C�digo, Descri��o, Marca e Modelo)
        System.out.print("Digite o codigo do funcionario: ");
        String codigo = scanner.nextLine();
        System.out.print("Digite o nome do funcionario: ");
        String nome = scanner.nextLine();
        System.out.print("Digite io cargo do funcionario: ");
        String cargo = scanner.nextLine();
        System.out.print("Digite o telefone do funcionario: ");
        int telefone = scanner.nextInt();
        System.out.print("Digite o salario base do funcionario: ");
        float salario = scanner.nextFloat();
        
        // escolher tipo funcionario (filhos)
        if (opcao == 1) {
            System.out.println("\nVoc� escolheu um gerente.");
            System.out.println("Setor responsavel do gerente: ");
            String setor = scanner.nextLine();

            funcionarioEscolhido = new gerente(codigo,nome,cargo,telefone,salario,setor);

        } else if (opcao == 2) {
            System.out.println("\nVoc� escolheu uma auxiliar.");
            System.out.println("local de trabalho do auxiliar: ");
            String local = scanner.nextLine();

            funcionarioEscolhido = new auxiliar(codigo,nome,cargo,telefone,salario,local);

        } else if (opcao == 3) {
            System.out.println("\nVoc� escolheu um tecnico.");
            System.out.println("Formação do tecnico: ");
            String formacao = scanner.nextLine();

            funcionarioEscolhido = new gerente(codigo,nome,cargo,telefone,salario,formacao);
        
        } else {
            System.out.println("Op��o inv�lida! ");
        }              
        funcionarioEscolhido.dados();
        
        boolean continuar = true;
        while (continuar) {
            System.out.println("\nIniciando os servi�os para o ve�culo escolhido...");
            System.out.println("Escolha o tipo servi�o:");
            System.out.println("1. Revisao            ");
            System.out.println("2. Conserto/Manuten��o");
            System.out.println("3. Limpeza            ");
            System.out.println("0. Sair               ");
            System.out.print("Digite sua op��o (0, 1, 2 ou 3): ");
            int tipo = scanner.nextInt();
            scanner.nextLine(); 
            
            if (tipo == 1) {
                System.out.println("\nVoc� escolheu fazer revisao...");
                principal.fazerRevisao();
            } else if (tipo == 2) {
                System.out.println("\nVoc� escolheu fazer manuten��o...");
                principal.fazerManutencao();
            } else if (tipo == 3) {
                System.out.println("\nVoc� escolheu fazer limpeza...");
                principal.fazerLimpeza();
            } else if (tipo == 0) {
                System.out.println("Saindo dos servi�os...");
                continuar = false;
            } else {        	
                System.out.println("Op��o inv�lida! ");
            }
        }
        scanner.close();
    }
}