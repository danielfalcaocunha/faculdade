package cursoemvideo.Aula04;

public class Caneta {
    public String modelo;
    private float ponta;
    private String cor;
    private boolean tampada;

    public Caneta(){ // Este é o método construtor
        this.tampar();
        this.cor = "Azul";
    }

    public String getModelo(){
        return this.modelo;
    }
    public void setModelo(String m){
        this.modelo = m;
    }

    public float getPonta(){
        return this.ponta;
    }
    public void setPonta(float p){
        this.ponta = p;
    }

    public void tampar(){
        this.tampada = true;
    }

    public void destampar(){
        this.tampada = false;
    }

    public void status(){
        System.out.println("SOBRE A CANETA");
        System.out.println("MODELO: " + this.modelo);
        System.out.println("PONTA: " + this.ponta);
        System.out.println("COR: " + this.cor);
        System.out.println("TAMPADA: " + this.tampada);
    }
}
