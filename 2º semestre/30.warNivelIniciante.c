#include <stdio.h>
#include <stdlib.h>
#include <string.h>

//Constantes Globais
#define MAX_NOME 30
#define MAX_COR 10
#define MAX_ITENS 5

//função para limpar o buffer de entrada
void limparBufferEntrada() {
    int c;
    while ((c = getchar()) != '\n' && c != EOF);
}

struct Territorio {
    char nome[30];
    char cor[10];
    int tropas;
};

int main() {
    // Declara um vetor para armazenar 5 territórios
    struct Territorio territorios[MAX_ITENS];
    int i;

    printf("=== Cadastro de Territorios ===\n\n");

    // Laço para entrada dos dados dos 5 territórios
    for (i = 0; i < MAX_ITENS; i++) {
        printf("Territorio %d\n", i + 1);

        // Leitura do nome do território
        printf("Digite o nome do territorio: ");
        scanf("%s", territorios[i].nome);

        // Leitura da cor do exército
        printf("Digite a cor do exercito: ");
        scanf("%s", territorios[i].cor);

        // Leitura da quantidade de tropas
        printf("Digite a quantidade de tropas: ");
        scanf("%d", &territorios[i].tropas);

        printf("\n");
    }

    // Exibição dos dados cadastrados
    printf("=== Territorios Cadastrados ===\n\n");

    for (i = 0; i < MAX_ITENS; i++) {
        printf("Territorio %d\n", i + 1);
        printf("Nome: %s\n", territorios[i].nome);
        printf("Cor do exercito: %s\n", territorios[i].cor);
        printf("Quantidade de tropas: %d\n", territorios[i].tropas);
        printf("-----------------------------\n");
    }

    // Mensagem final para o usuário
    printf("\nPressione qualquer tecla para encerrar o programa...");
    
    // Mantém o CMD aberto até o usuário pressionar uma tecla
    system("pause");

    return 0;
}

