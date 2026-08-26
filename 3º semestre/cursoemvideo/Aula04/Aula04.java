package cursoemvideo.Aula04;
public class Aula04 {
    public static void main(String[] args) {
        Caneta c1 = new Caneta();
        c1.setModelo("BIC");
        c1.setPonta(0.5f);
        c1.status();
        System.out.println("TENHO UMA CANETA " + c1.getModelo() + " DE PONTA " + c1.getPonta());
        Caneta c2 = new Caneta();
        c2.status();
    }
}
