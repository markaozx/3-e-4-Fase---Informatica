import javax.swing.JOptionPane;

public class ex05 {
	public static void main(String[] args) {
		double soma = 0;
		int i = 1;
		while (i==1) {
			
			String nome, cargo;
			nome = JOptionPane.showInputDialog("Nome funcin�rio: ");
			cargo = JOptionPane.showInputDialog("Insira o cargo: ");
			double salin = Double.parseDouble(JOptionPane.showInputDialog("Salario inicial: "));
			double salfim = ((salin * 0.05) + salin);
			JOptionPane.showMessageDialog(null, "Salario final: " + salfim);
			soma = soma + salfim;
	        String deci = JOptionPane.showInputDialog("Quer continuar?");
	        if (deci.equals("n") || (deci.equals("n�o"))){
	        	JOptionPane.showMessageDialog(null, "Folha de pagamento: " + soma);
	        	i = 2;
	    	    System.exit(0);
	        }
			
		}
	}

}
