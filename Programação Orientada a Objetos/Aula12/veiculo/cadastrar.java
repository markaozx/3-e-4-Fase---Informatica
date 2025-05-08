package veiculo;
import java.util.Scanner;

public class cadastrar {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Oficina oficina = new Oficina();
        
        System.out.println("Escolha o tipo de ve�culo:");
        System.out.println("1. Autom�vel");
        System.out.println("2. Bicicleta");
        System.out.println("3. Caminhão");
        System.out.println("4. Onibus");
        System.out.print("Digite sua op��o: ");
        int opcao = scanner.nextInt();
        scanner.nextLine(); 
        
        // Vari�vel para armazenar o ve�culo escolhido
        veiculo veiculoEscolhido = null;

        // Pedir informa��es do ve�culo (C�digo, Descri��o, Marca e Modelo)
        System.out.print("Digite o c�digo do ve�culo: ");
        String codigo = scanner.nextLine();
        System.out.print("Digite a descri��o do ve�culo: ");
        String descricao = scanner.nextLine();
        System.out.print("Digite a marca do ve�culo: ");
        String marca = scanner.nextLine();
        System.out.print("Digite o modelo do ve�culo: ");
        String modelo = scanner.nextLine();
        
        // escolher tipo veiculo (filhos)
        if (opcao == 1) {
            System.out.println("\nVoc� escolheu um Autom�vel.");
            System.out.println("Potencia do automovel em HP: ");
            int potencia = scanner.nextInt();

            veiculoEscolhido = new automovel(codigo, descricao, marca, modelo, potencia);

        } else if (opcao == 2) {
            System.out.println("\nVoc� escolheu uma Bicicleta.");
            System.out.println("Quantidade de marchas da bicicleta: ");
            int marchas = scanner.nextInt();

            veiculoEscolhido = new bicicleta(codigo, descricao, marca, modelo, marchas);

        } else if (opcao == 3) {
            System.out.println("\nVoc� escolheu um Caminhão.");
            System.out.println("Numero de eixos: ");
            int eixos = scanner.nextInt();

            veiculoEscolhido = new caminhao(codigo, descricao, marca, modelo, eixos);
        
        } else if (opcao == 4) {
            System.out.println("Você escolheu um Onibus. ");
            System.out.println("Quantidade de passageiros: ");
            int passageiros = scanner.nextInt();

            veiculoEscolhido = new onibus(codigo, descricao, marca, modelo, passageiros);
        } else {
            System.out.println("Op��o inv�lida! ");
        }              
        veiculoEscolhido.dados();
        
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
                oficina.fazerRevisao();
            } else if (tipo == 2) {
                System.out.println("\nVoc� escolheu fazer manuten��o...");
                oficina.fazerManutencao();
            } else if (tipo == 3) {
                System.out.println("\nVoc� escolheu fazer limpeza...");
                oficina.fazerLimpeza();
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