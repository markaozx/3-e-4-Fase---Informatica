import javax.swing.JOptionPane;
public class ex01 {
public static void main(String[] args) {
String nome, endereco, bairro, cidade, estado, fone;

nome     = JOptionPane.showInputDialog("Nome");
endereco = JOptionPane.showInputDialog("Endere�o");
bairro   = JOptionPane.showInputDialog("Bairro");
cidade   = JOptionPane.showInputDialog("Cidade");
estado   = JOptionPane.showInputDialog("Estado");
fone     = JOptionPane.showInputDialog("Fone");

JOptionPane.showMessageDialog(null, "Nome :" + nome +
                            "\nEndere�o " + endereco+
                            "\nBairro " + bairro +
                            "\nCidade " + cidade + 
                            "\nEstado " + estado +
                            "\nFone " + fone);
System.exit(0);
}
}
