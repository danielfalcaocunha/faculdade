#include <stdio.h>
#include <stdlib.h>
#include <string.h>

// ---Constantes Globais---
#define MAX_LIVROS 50
#define TAM_STRING 100

// ---Definição da Estrutura de Dados---
struct Livro {
    char nome[TAM_STRING];
    char autor[TAM_STRING];
    char editora[TAM_STRING];
    int edicao;
};

// ---Função para limpar o buffer de entrada---
void limparBufferEntrada() {
    int c;
    while ((c = getchar()) != '\n' && c != EOF);
}

// ---Função Principal (main)---
int main() {
    struct Livro biblioteca[MAX_LIVROS];
    int totalLivros = 0;
    int opcao;

    // ---Laço Principal do Menu---
    do {

        // Exibe o menu de opções para o usuário
        printf("\n==================================");
        printf("\nMENU DE OPCOES\n");
        printf("==================================\n");
        printf("1. Adicionar Livro\n");
        printf("2. Listar Livros\n");
        printf("0. Sair\n");
        printf("==================================\n");
        printf("Escolha uma opcao: ");

        // Lê a opção escolhida pelo usuário
        scanf("%d", &opcao);
        limparBufferEntrada(); // Limpa o buffer após ler a opção

        switch (opcao) {
            case 1: // Adicionar um novo livro à biblioteca
                if (totalLivros < MAX_LIVROS) {
                    printf("Digite o nome do livro: ");
                    fgets(biblioteca[totalLivros].nome, TAM_STRING, stdin);
                    biblioteca[totalLivros].nome[strcspn(biblioteca[totalLivros].nome, "\n")] = '\0'; // Remove o newline

                    printf("Digite o autor do livro: ");
                    fgets(biblioteca[totalLivros].autor, TAM_STRING, stdin);
                    biblioteca[totalLivros].autor[strcspn(biblioteca[totalLivros].autor, "\n")] = '\0'; // Remove o newline

                    printf("Digite a editora do livro: ");
                    fgets(biblioteca[totalLivros].editora, TAM_STRING, stdin);
                    biblioteca[totalLivros].editora[strcspn(biblioteca[totalLivros  ].editora, "\n")] = '\0'; // Remove o newline

                    printf("Digite a edicao do livro: ");
                    scanf("%d", &biblioteca[totalLivros].edicao);
                    limparBufferEntrada(); // Limpa o buffer após ler a edição

                    totalLivros++;
                    printf("Livro adicionado com sucesso!\n");
                } else {
                    printf("Capacidade maxima de livros atingida!\n");
                }
                printf("\nPressione Enter para continuar...");
                getchar(); // Aguarda o usuário pressionar Enter
                break;

            case 2:
                if (totalLivros > 0) {
                        printf("\n==================================");
                        printf("\n       LISTA DE LIVROS\n");
                        printf("==================================\n");
                    for (int i = 0; i < totalLivros; i++) {
                        printf("Livro %d:\n", i + 1);
                        printf("Nome: %s\n", biblioteca[i].nome);
                        printf("Autor: %s\n", biblioteca[i].autor);
                        printf("Editora: %s\n", biblioteca[i].editora);
                        printf("Edicao: %d\n", biblioteca[i].edicao);
                        printf("----------------------------------\n");
                    }
                } else {
                    printf("Nenhum livro cadastrado.\n");
                }
                break;

            case 0:
                printf("Saindo...\n");
                break;

            default:
                printf("Opção invalida. Tente novamente.\n");
        }
    } while (opcao != 3);

    return 0;
}